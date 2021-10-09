<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_semester extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']   	 = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  	 = $this->Mcrud->get_users();
			$data['judul_web'] = "Dashboard";

			$this->load->view('users/header', $data);
			$this->load->view('users/dashboard', $data);
			$this->load->view('users/footer');
		}
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
		}
		if ($aksi=='proses' or $aksi=='konfirmasi' or $aksi=='selesai') {
			$this->db->where('status',$aksi);
		}
		$this->db->order_by('id_laporan', 'DESC');
		$data['query'] = $this->db->get("tbl_laporan_smt");

		if ($aksi == 't') {
			if ($level!='obh') {
				redirect('404');
			}
			$p = "tambah";
			$data['judul_web'] 	  = "BUAT LAPORAN";
			
		}elseif ($aksi == 'd') {
			$p = "detail";
			$data['judul_web'] 	  = "RINCIAN LAPORAN";
			$data['query'] = $this->db->get_where("tbl_laporan_smt", array('id_laporan' => "$id"))->row();
			if ($data['query']->id_laporan=='') {redirect('404');}

			$data['cek_notif'] = $this->db->get_where("tbl_notif", array('penerima'=>"$id_user", 'id_for_link'=>"$id"))->row();

			$b_notif = $data['cek_notif']->baca_notif;
			if(!preg_match("/$id_user/i", $b_notif)) {
				$data_notif = array('baca_notif'=>"$id_user, $b_notif");
				$this->db->update('tbl_notif', $data_notif, array('penerima'=>$id_user, 'id_for_link'=>"$id"));
			}
		}
		elseif ($aksi == 'h') {
			$cek_data = $this->db->get_where("tbl_laporan_smt", array('id_laporan' => "$id"));
			if ($cek_data->num_rows() != 0) {
				if ($cek_data->row()->status!='proses') {
					redirect('404');
				}
				if ($cek_data->row()->lampiran != '') {
					unlink($cek_data->row()->lampiran);
				}

				$this->db->delete('tbl_laporan_smt', array('id_laporan' => $id));
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
				redirect("laporan_semester/v");
			}else {
				redirect('404_content');
			}
		}else{
			$p = "index";
			$data['judul_web'] 	  = "Laporan OBH";
		}
		

		$this->load->view('users/header', $data);
		$this->load->view("users/laporan_semester/$p", $data);
		$this->load->view('users/footer');

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d H:i:s');

		$lokasi = 'file/laporan_smt';
		$file_size = 1024 * 3; // 3 MB
		$this->upload->initialize(array(
			"upload_path"   => "./$lokasi",
			"allowed_types" => "*",
			"max_size" => "$file_size"
		));

		if (isset($_POST['btnsimpan'])) {
			$id_kategori_lap 		 = htmlentities(strip_tags($this->input->post('id_kategori_lap')));
			$periode_lap 	 = htmlentities(strip_tags($this->input->post('periode_lap')));
			
			if ( ! $this->upload->do_upload('lampiran'))
			{
				$simpan = 'n';
				$pesan  = htmlentities(strip_tags($this->upload->display_errors('<p>', '</p>')));
			}
			 else
			{
				$gbr = $this->upload->data();
				$filename = "$lokasi/".$gbr['file_name'];
				$lampiran = preg_replace('/ /', '_', $filename);
				$simpan = 'y';
			}

			if ($simpan=='y') {
				$data = array(
					'id_kategori_lap'	=> $id_kategori_lap,
					'lampiran'			=> $lampiran,
					'notaris'			=> $id_user,
					'periode_lap'   	=> $periode_lap,
					'status'			=> 'proses',
					'tgl_laporan'   	=> $tgl
				);
				$this->db->insert('tbl_laporan_smt',$data);

				$id_laporan = $this->db->insert_id();
				$this->Mcrud->kirim_notif($id_user,'superadmin',$id_laporan,'laporan_semester','notaris_kirim_laporan','');
				
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
			  redirect("laporan_semester/v/$aksi/".hashids_decrypt($id));
			}
			redirect("laporan_semester/v");
		}

		if (isset($_POST['btnkirim'])) {
			$id_laporan = htmlentities(strip_tags($this->input->post('id_laporan')));
			$data_lama = $this->db->get_where('tbl_laporan_smt',array('id_laporan'=>$id_laporan))->row();
			$simpan = 'y';
			$pesan = '';

			$pesan_petugas = htmlentities(strip_tags($this->input->post('pesan_petugas')));
			$status = htmlentities(strip_tags($this->input->post('status')));
			$file = $data_lama->file_petugas;
			$pesan = 'Berhasil disimpan';
			if ($_FILES['file']['error'] <> 4) {
				if ( ! $this->upload->do_upload('file'))
				{
					$simpan = 'n';
					$pesan  = htmlentities(strip_tags($this->upload->display_errors('<p>', '</p>')));
				} else {
					if ($file!='') {
						unlink("$file");
					}

					$gbr = $this->upload->data();
					$filename = "$lokasi/".$gbr['file_name'];
					$file = preg_replace('/ /', '_', $filename);
				}
			}
			$data = array(
				'pesan_petugas' => $pesan_petugas,
				'status'				=> $status,
				'file_petugas'  => $file,
				'tgl_selesai'   => $tgl
			);
			if ($status == 'konfirmasi') {
				$pesan_notif = 'superadmin_konfirmasi_laporan';
			} elseif ($status == 'selesai') {
				$pesan_notif = 'superadmin_selesai_laporan';
			}
			$this->Mcrud->kirim_notif('superadmin',$data_lama->notaris,$id_laporan,'laporan_semester',$pesan_notif,'');

			if ($simpan=='y') {
				$this->db->update('tbl_laporan_smt',$data, array('id_laporan'=>$id_laporan));
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
			redirect('laporan_semester/v');
		}
	}


	public function ajax()
	{
		if (isset($_POST['btnkirim'])) {
			$id = $this->input->post('id');
			$data = $this->db->get_where('tbl_laporan_smt',array('id_laporan'=>$id))->row();
			$pesan_petugas = $data->pesan_petugas;
			$status = $data->status;
			echo json_encode(array('pesan_petugas'=>$pesan_petugas,'status'=>$status));
		}else {
			redirect('404');
		}
	}

}
