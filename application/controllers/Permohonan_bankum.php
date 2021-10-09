<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_bankum extends CI_Controller {

	public function index()
	{
		$data['judul_web'] = "Permohonan Bantuan Hukum";
		
		$this->load->view('web/header', $data);
		$this->load->view('web/permohonan_bankum', $data);
		$this->load->view('web/footer', $data);

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d H:i:s');

		$lokasi = 'file/permohonan_bankum';
		$file_size = 1024 * 3; // 3 MB
		$this->upload->initialize(array(
			"upload_path"   => "./$lokasi",
			"allowed_types" => "*",
			"max_size" => "$file_size"
		));

		if (isset($_POST['btnsimpan'])) {
			$nama_client 		 = htmlentities(strip_tags($this->input->post('nama_client')));
			$nik_client = htmlentities(strip_tags($this->input->post('nik_client')));
			$alamat_client = htmlentities(strip_tags($this->input->post('alamat_client')));
			$kontak_client = htmlentities(strip_tags($this->input->post('kontak_client')));
			$isi_laporan 	 = htmlentities(strip_tags($this->input->post('isi_laporan')));
			$notaris 	 = htmlentities(strip_tags($this->input->post('notaris')));

			if ( ! $this->upload->do_upload('bukti'))
			{
				$simpan = 'n';
				$pesan  = htmlentities(strip_tags($this->upload->display_errors('<p>', '</p>')));
			}
			else
			{
				$gbr = $this->upload->data();
				$filename = "$lokasi/".$gbr['file_name'];
				$bukti = preg_replace('/ /', '_', $filename);
				$simpan = 'y';
			}

			if ($simpan=='y') {
				$data = array(
					'nama_client'		=> $nama_client,
					'nik_client'		=> $nik_client,
					'alamat_client'	=> $alamat_client,
					'kontak_client'	=> $kontak_client,
					'isi_laporan'   => $isi_laporan,
					'bukti'				=> $bukti,
					'notaris'		=> $notaris,
					'status'				=> 'proses',
					'tgl_pengaduan'   => $tgl
				);

				$this->db->insert('tbl_permohonan_bankum',$data);

				$id_pengaduan = $this->db->insert_id();
				$this->Mcrud->kirim_notif($nik_client,$notaris,$id_pengaduan,'permohonan','user_kirim_permohonan',$nama_client);

				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
						 <strong>Sukses!</strong> Berhasil disimpan.
					</div>
					
				 <br>'
				);
				
			 }else {
					 $this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
							  <strong>Gagal!</strong> '.$pesan.'.
						 </div>
					  <br>'
					 );
					redirect("permohonan_bankum");
			 }
			 redirect("permohonan_bankum");
		}
		
		
	}

	public function cek($nik_client='')
	{
		$data['judul_web'] = "Permohonan Bantuan Hukum";
		if ($nik_client!='') {
			$this->db->order_by('id_permohonan', 'DESC');
			$data['query'] = $this->db->get_where("tbl_permohonan_bankum", array('nik_client'=>"$nik_client"));
		}
		$data['nik_client'] = $nik_client;
		$this->load->view('web/header', $data);
		$this->load->view('web/cek_permohonan', $data);
		$this->load->view('web/footer', $data);
	}

	public function v($aksi='',$id='')
	{
		$id = hashids_decrypt($id);
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}

			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);

			if ($level=='obh') {
				$this->db->where('notaris',$id_user);
			} else {
				redirect('404_content');
			}
			if ($aksi=='proses' or $aksi=='konfirmasi' or $aksi=='selesai') {
				$this->db->where('status',$aksi);
			}
			$this->db->order_by('id_permohonan', 'DESC');
			$data['query'] = $this->db->get("tbl_permohonan_bankum");

			if ($aksi == 'd') {
				$p = "detail";
				$data['judul_web'] 	  = "Detail Permohonan Bantuan Hukum";
				$data['query'] = $this->db->get_where("tbl_permohonan_bankum", array('id_permohonan' => "$id"))->row();
				if ($data['query']->id_permohonan=='') {redirect('404');}

				$data['cek_notif'] = $this->db->get_where("tbl_notif", array('penerima'=>"$id_user", 'id_for_link'=>"$id"))->row();

				$b_notif = $data['cek_notif']->baca_notif;
				if(!preg_match("/$id_user/i", $b_notif)) {
					$data_notif = array('baca_notif'=>"$id_user, $b_notif");
					$this->db->update('tbl_notif', $data_notif, array('penerima'=>$id_user, 'id_for_link'=>"$id"));
				}
				
			}
			elseif ($aksi == 'h') {
				$cek_data = $this->db->get_where("tbl_permohonan_bankum", array('id_permohonan' => "$id"));
				if ($cek_data->num_rows() != 0) {
						if ($cek_data->row()->status!='proses') {
							redirect('404');
						}
						if ($cek_data->row()->bukti != '') {
							unlink($cek_data->row()->bukti);
						}
						$this->db->delete('tbl_notif', array('pengirim'=>$id_user,'id_pengaduan'=>$id));
						$this->db->delete('tbl_pengaduan', array('id_pengaduan' => $id));
						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>
							<br>'
						);
						redirect("pengaduan/v");
				}else {
					redirect('404_content');
				}
			}else{
				$p = "index";
				$data['judul_web'] 	  = "Permohonan Bantuan Hukum";
			}

				$this->load->view('users/header', $data);
				$this->load->view("users/permohonan_bankum/$p", $data);
				$this->load->view('users/footer');

				date_default_timezone_set('Asia/Jakarta');
				$tgl = date('Y-m-d H:i:s');

				$lokasi = 'file/permohonan_bankum';
				$file_size = 1024 * 3; // 3 MB
				$this->upload->initialize(array(
					"upload_path"   => "./$lokasi",
					"allowed_types" => "*",
					"max_size" => "$file_size"
				));

				if (isset($_POST['btnkirim'])) {
					$id_permohonan = htmlentities(strip_tags($this->input->post('id_permohonan')));
					$data_lama = $this->db->get_where('tbl_permohonan_bankum',array('id_permohonan'=>$id_permohonan))->row();
					$simpan = 'y';
					$pesan = '';
					
						
						$pesan_petugas = htmlentities(strip_tags($this->input->post('pesan_petugas')));
						$status = htmlentities(strip_tags($this->input->post('status')));
						$pesan = 'Berhasil disimpan';

						$data = array(
							'pesan_petugas' => $pesan_petugas,
							'status'				=> $status,
							'tgl_selesai'   => $tgl
						);

					if ($simpan=='y') {
						$this->db->update('tbl_permohonan_bankum',$data, array('id_permohonan'=>$id_permohonan));
						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
								 </button>
								 <strong>Sukses!</strong> '.$pesan.'.
							</div>
						 <br>'
						);
					}else {
						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
								 </button>
								 <strong>Gagal!</strong> '.$pesan.'.
							</div>
						 <br>'
						);
					}
					redirect('permohonan_bankum/v');
				}

	}


	public function ajax()
	{
		if (isset($_POST['btnkirim'])) {
			$id = $this->input->post('id');
			$data = $this->db->get_where('tbl_permohonan_bankum',array('id_permohonan'=>$id))->row();
			$pesan_petugas = $data->pesan_petugas;
			$status = $data->status;
			echo json_encode(array('pesan_petugas'=>$pesan_petugas,'status'=>$status));
		}else {
			redirect('404');
		}
	}

}
