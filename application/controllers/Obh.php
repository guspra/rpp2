<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obh extends CI_Controller {

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

	public function v($aksi='', $id='')
	{
		$id = hashids_decrypt($id);
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);

			if ($level != 'superadmin') {
					redirect('404_content');
			}

			$this->db->join('tbl_user','tbl_user.id_user=tbl_data_obh.id_user');
			$this->db->order_by('id_data_notaris', 'DESC');
			$data['query'] = $this->db->get("tbl_data_obh");

				if ($aksi == 'd') {
					$p = "detail";
					$data['judul_web'] 	  = "Detail OBH";
					$this->db->join('tbl_user','tbl_user.id_user=tbl_data_obh.id_user');
					$data['query'] = $this->db->get_where("tbl_data_obh", array('tbl_user.id_user' => "$id"))->row();
					if ($data['query']->id_user=='') {redirect('404');}
				}
				elseif ($aksi == 'h') {
					$cek_data = $this->db->get_where("tbl_data_obh", array('id_user' => "$id"));
					if ($cek_data->num_rows() != 0) {
							$cek_foto = $cek_data->row()->foto;
							if ($cek_foto!='') {
								unlink($cek_foto);
							}
							$this->db->delete('tbl_laporan', array('obh' => $id));
							$this->db->delete('tbl_data_obh', array('id_user' => $id));
							$this->db->delete('tbl_user', array('id_user' => $id));
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
							redirect("users/v");
					}else {
						redirect('404');
					}
				}else{
					$p = "index";
					$data['judul_web'] 	  = "OBH";
				}

				if ($aksi=='cetak') {
					$this->load->view("users/obh/cetak", $data);
				}else {
					$this->load->view('users/header', $data);
					$this->load->view("users/obh/$p", $data);
					$this->load->view('users/footer');
				}
	}

}
