<?php

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['id_role'] = $this->session->userdata('id_role');
		if (!isset($this->data['id_role']))
		{
			redirect('logout');
			exit;
		}
		$this->load->model('Relawan_m');
		$this->load->model('User_m');
		$this->load->model('Gender_m');
		$this->load->model('Kontributor_m');
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
}
