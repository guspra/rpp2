<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peraturan_terkait extends CI_Controller {

   public function index()
	{
		$data['judul_web'] = "Peraturan Terkait";

		$data['query'] = $this->db->get_where("tbl_file_manager", array('page' => "Peraturan Terkait"));

		$this->load->view('web/header', $data);
		$this->load->view('web/peraturan_terkait', $data);
		$this->load->view('web/footer', $data);
	}

	public function d($id='')
	{
		$id = hashids_decrypt($id);
		$this->db->join('tbl_user','tbl_user.id_user=tbl_data_obh.id_user');
		$data['query'] = $this->db->get_where("tbl_data_obh", array('tbl_user.id_user' => "$id"))->row();
		if ($data['query']->id_user=='') {redirect('404');}

		$this->load->view('web/header', $data);
		$this->load->view('web/detail_obh', $data);
		$this->load->view('web/footer', $data);
	}

}