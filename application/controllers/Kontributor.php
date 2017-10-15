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

	public function berita()
	{
		if ($this->POST('insert'))
		{
			$this->data['entry'] = [
				"header" => $this->POST("header"),
				"waktu" => date('Y-m-d h:m:s'),
				"isi" => $this->POST("isi"),
				"id_user" => $this->data['id_user'],
				"id_kategori" => $this->POST("id_kategori"),
			];
			$this->Blog_m->insert($this->data['entry']);
			redirect('kontributor/berita');
			exit;
		}

		if ($this->POST('delete') && $this->POST('id_blog'))
		{
			$this->Blog_m->delete($this->POST('id_blog'));
			exit;
		}

		if ($this->POST('edit') && $this->POST('id_blog'))
		{
			$this->data['entry'] = [
				"header" => $this->POST("header"),
				"isi" => $this->POST("isi"),
				"id_kategori" => $this->POST("id_kategori"),
			];
			$this->Blog_m->update($this->POST('id_blog'), $this->data['entry']);
			redirect('kontributor/berita');
			exit;
		}

		if ($this->POST('get') && $this->POST('id_blog'))
		{
			$this->data['blog'] = $this->Blog_m->get_row(['id_blog' => $this->POST('id_blog')]);
			echo json_encode($this->data['blog']);
			exit;
		}

		$this->data['data']		= $this->Blog_m->get(['id_user' => $this->data['profil']->username]);
		$this->data['columns']	= ["id_blog","id_kategori","id_user","waktu","header"];
		$this->data['title'] 	= 'Daftar Berita';
		$this->data['content'] 	= 'kontributor/blog_all';
		$this->template($this->data,'kontributor');
	}

	public function add_berita()
	{
		$this->data['kategori'] = $this->Kategori_blog_m->get();
		$this->data['title'] 	= 'Tambah Berita';
		$this->data['content'] 	= 'kontributor/add-berita';
		$this->template($this->data,'kontributor');
	}

	public function edit_berita()
	{
		$idBlog = $this->uri->segment(3);
		if (!isset($idBlog)) {
			redirect('kontributor/berita');
			exit;
		}
		$this->data['berita'] = $this->Blog_m->get_row(['id_blog' => $idBlog]);
		if (!isset($this->data['berita'])) {
			redirect('kontributor/berita');
			exit;
		}
		$this->data['kategori'] = $this->Kategori_blog_m->get();
		$this->data['title'] 	= 'Edit Berita';
		$this->data['content'] 	= 'kontributor/edit-berita';
		$this->template($this->data,'kontributor');
	}
}
