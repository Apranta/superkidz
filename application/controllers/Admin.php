<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['id_role'] = $this->session->userdata('id_role');
		$this->data['id_user'] = $this->session->userdata('username');
		if (!isset($this->data['id_role']))
		{
			redirect('logout');
			exit;
		}
		$this->load->model('Relawan_m');
		$this->load->model('User_m');
		$this->load->model('Blog_m');
		$this->load->model('Gender_m');
		$this->load->model('Kontributor_m');
		$this->load->model('Kategori_blog_m');
	}

	public function index()
	{
		$this->data['content'] 	= 'tes';
		$this->data['title'] = 'Dashboard Admin '.$this->title;
    $this->template($this->data,'admin');
	}

	public function relawan()
	{
		if ($this->POST('insert'))
		{
			$this->data['entry'] = [
				"username" => $this->POST("username"),
				"nama" => $this->POST("nama"),
				"tempat_lahir" => $this->POST("tempat_lahir"),
				"tanggal_lahir" => $this->POST("tanggal_lahir"),
				"alamat" => $this->POST("alamat"),
				"id_gender" => $this->POST("id_gender"),
				"pekerjaan" => $this->POST("pekerjaan"),
				"email" => $this->POST("email"),
				"telepon" => $this->POST("telepon"),
			];
			$this->User_m->insert(['username' => $this->POST("username"),'id_role'=> 2,'password' => md5('123456')]);
			$this->Relawan_m->insert($this->data['entry']);
			redirect('admin/relawan');
			exit;
		}

		if ($this->POST('delete') && $this->POST('username'))
		{
			$this->Relawan_m->delete($this->POST('username'));
			exit;
		}

		if ($this->POST('edit') && $this->POST('edit_username'))
		{
			$this->data['entry'] = [
				"username" => $this->POST("username"),
				"nama" => $this->POST("nama"),
				"tempat_lahir" => $this->POST("tempat_lahir"),
				"tanggal_lahir" => $this->POST("tanggal_lahir"),
				"alamat" => $this->POST("alamat"),
				"id_gender" => $this->POST("id_gender"),
				"pekerjaan" => $this->POST("pekerjaan"),
				"email" => $this->POST("email"),
				"telepon" => $this->POST("telepon"),
			];
			$this->Relawan_m->update($this->POST('edit_username'), $this->data['entry']);
			redirect('admin/relawan');
			exit;
		}

		if ($this->POST('get') && $this->POST('username'))
		{
			$this->data['relawan'] = $this->Relawan_m->get_row(['username' => $this->POST('username')]);
			echo json_encode($this->data['relawan']);
			exit;
		}

		$this->data['data']		= $this->Relawan_m->get();
		$this->data['columns']	= ["username","nama","tempat_lahir","tanggal_lahir","alamat","id_gender","pekerjaan","email","telepon",];
		$this->data['columnsa']	= ["username","nama","alamat","id_gender","email",];
		$this->data['title'] 	= 'Data Relawan';
		$this->data['content'] 	= 'admin/relawan_all';
		$this->template($this->data,'admin');
	}


	public function detail_relawan()
	{
		$this->data['username'] = $this->uri->segment(3);
		if (!isset($this->data['username']))
		{
			redirect('admin/relawan');
			exit;
		}

		$this->data['columns']	= ["username","nama","tempat_lahir","tanggal_lahir","alamat","id_gender","pekerjaan","email","telepon",];
		$this->data['data'] = $this->Relawan_m->get_row(['username' => $this->data['username']]);
		$this->data['title'] 	= 'Detail Relawan';
		$this->data['content'] 	= 'admin/relawan_detail';
		$this->template($this->data,'admin');
	}

	public function kontributor()
	{
		if ($this->POST('insert'))
		{
			$this->data['entry'] = [
				"username" => $this->POST("username"),
				"nama" => $this->POST("nama"),
				"tempat_lahir" => $this->POST("tempat_lahir"),
				"tanggal_lahir" => $this->POST("tanggal_lahir"),
				"alamat" => $this->POST("alamat"),
				"pekerjaan" => $this->POST("pekerjaan"),
				"email" => $this->POST("email"),
				"telepon" => $this->POST("telepon"),
				"id_gender" => $this->POST("id_gender"),
			];
			$this->User_m->insert(['username' => $this->POST("username"),'id_role'=> 3,'password' => md5('123456')]);
			$this->Kontributor_m->insert($this->data['entry']);
			redirect('admin/kontributor');
			exit;
		}

		if ($this->POST('delete') && $this->POST('username'))
		{
			$this->Kontributor_m->delete($this->POST('username'));
			exit;
		}

		if ($this->POST('edit') && $this->POST('edit_username'))
		{
			$this->data['entry'] = [
				"username" => $this->POST("username"),
				"nama" => $this->POST("nama"),
				"tempat_lahir" => $this->POST("tempat_lahir"),
				"tanggal_lahir" => $this->POST("tanggal_lahir"),
				"alamat" => $this->POST("alamat"),
				"pekerjaan" => $this->POST("pekerjaan"),
				"email" => $this->POST("email"),
				"telepon" => $this->POST("telepon"),
				"id_gender" => $this->POST("id_gender"),
			];
			$this->Kontributor_m->update($this->POST('edit_username'), $this->data['entry']);
			redirect('admin/kontributor');
			exit;
		}

		if ($this->POST('get') && $this->POST('username'))
		{
			$this->data['kontributor'] = $this->Kontributor_m->get_row(['username' => $this->POST('username')]);
			echo json_encode($this->data['kontributor']);
			exit;
		}

		$this->data['data']		= $this->Kontributor_m->get();
		$this->data['columns']	= ["username","nama","tempat_lahir","tanggal_lahir","alamat","pekerjaan","email","telepon","id_gender",];
		$this->data['columnsa']	= ["username","nama","pekerjaan","email","telepon","id_gender",];
		$this->data['title'] 	= 'Data Kontributor';
		$this->data['content'] 	= 'admin/kontributor_all';
		$this->template($this->data,'admin');
	}


	public function detail_kontributor()
	{
		$this->data['username'] = $this->uri->segment(3);
		if (!isset($this->data['username']))
		{
			redirect('admin/kontributor');
			exit;
		}

		$this->data['columns']	= ["username","nama","tempat_lahir","tanggal_lahir","alamat","pekerjaan","email","telepon","id_gender",];
		$this->data['data'] = $this->Kontributor_m->get_row(['username' => $this->data['username']]);
		$this->data['title'] 	= 'Detail Kontributor';
		$this->data['content'] 	= 'admin/kontributor_detail';
		$this->template($this->data,'admin');
	}

	public function kategori()
	{
		if ($this->POST('insert'))
		{
			$this->data['entry'] = [
				"nama" => $this->POST("nama"),
			];
			$this->Kategori_blog_m->insert($this->data['entry']);
			redirect('admin/kategori');
			exit;
		}

		if ($this->POST('delete') && $this->POST('id_kategori'))
		{
			$this->Kategori_blog_m->delete($this->POST('id_kategori'));
			exit;
		}

		if ($this->POST('edit') && $this->POST('id_kategori'))
		{
			$this->data['entry'] = [
				"nama" => $this->POST("nama"),
			];
			$this->Kategori_blog_m->update($this->POST('id_kategori'), $this->data['entry']);
			redirect('admin/kategori');
			exit;
		}

		if ($this->POST('get') && $this->POST('id_kategori'))
		{
			$this->data['kategori'] = $this->Kategori_blog_m->get_row(['id_kategori' => $this->POST('id_kategori')]);
			echo json_encode($this->data['kategori']);
			exit;
		}

		$this->data['data']		= $this->Kategori_blog_m->get();
		$this->data['columns']	= ["id_kategori","nama"];
		$this->data['title'] 	= 'Daftar Kategori';
		$this->data['content'] 	= 'admin/kategori_all';
		$this->template($this->data,'admin');
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
			redirect('admin/berita');
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
			redirect('admin/berita');
			exit;
		}

		if ($this->POST('get') && $this->POST('id_blog'))
		{
			$this->data['blog'] = $this->Blog_m->get_row(['id_blog' => $this->POST('id_blog')]);
			echo json_encode($this->data['blog']);
			exit;
		}

		$this->data['data']		= $this->Blog_m->get();
		$this->data['columns']	= ["id_blog","id_kategori","id_user","waktu","header"];
		$this->data['title'] 	= 'Daftar Berita';
		$this->data['content'] 	= 'admin/blog_all';
		$this->template($this->data,'admin');
	}

	public function add_berita()
	{
		$this->data['kategori'] = $this->Kategori_blog_m->get();
		$this->data['title'] 	= 'Tambah Berita';
		$this->data['content'] 	= 'admin/add-berita';
		$this->template($this->data,'admin');
	}

	public function edit_berita()
	{
		$idBlog = $this->uri->segment(3);
		if (!isset($idBlog)) {
			redirect('admin/berita');
			exit;
		}
		$this->data['berita'] = $this->Blog_m->get_row(['id_blog' => $idBlog]);
		if (!isset($this->data['berita'])) {
			redirect('admin/berita');
			exit;
		}
		$this->data['kategori'] = $this->Kategori_blog_m->get();
		$this->data['title'] 	= 'Edit Berita';
		$this->data['content'] 	= 'admin/edit-berita';
		$this->template($this->data,'admin');
	}
}
