<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontributor extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['id_role'] = $this->session->userdata('id_role');
		$this->data['id_user'] = $this->session->userdata('username');
		if (!isset($this->data['id_role']) || $this->data['id_role'] != 3)
		{
			redirect('logout');
			exit;
		}
		$this->load->model('User_m');
		$this->load->model('Blog_m');
		$this->load->model('Gender_m');
		$this->load->model('Kontributor_m');
		$this->load->model('Kategori_blog_m');
		$this->data['profil'] = $this->Kontributor_m->get_row(['username' => $this->data['id_user']]);
	}

  public function index()
  {
		$this->data['content'] 	= 'kontributor/dashboard';
		$this->data['title'] = 'Dashboard '.$this->title;
    $this->template($this->data,'kontributor');
  }

	public function sunting_profil()
  {
		if ($this->POST('edit'))
		{
			$this->data['entry'] = [
				"nama" => $this->POST("nama"),
				"tempat_lahir" => $this->POST("tempat_lahir"),
				"tanggal_lahir" => $this->POST("tanggal_lahir"),
				"alamat" => $this->POST("alamat"),
				"pekerjaan" => $this->POST("pekerjaan"),
				"email" => $this->POST("email"),
				"telepon" => $this->POST("telepon"),
				"id_gender" => $this->POST("id_gender"),
			];
			$this->Kontributor_m->update($this->data['id_user'], $this->data['entry']);
			redirect('kontributor/sunting-profil');
			exit;
		}
		$this->data['kelamin'] = $this->Gender_m->get();
		$this->data['content'] 	= 'kontributor/profil';
		$this->data['title'] = 'Profil '.$this->title;
    $this->template($this->data,'kontributor');
  }
}
