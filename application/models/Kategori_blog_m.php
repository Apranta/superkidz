<?php defined('BASEPATH') || exit('No direct script allowed');

class Kategori_blog_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'kategori_blog';
		$this->data['primary_key'] = 'id_kategori';
	}
}

