<?php defined('BASEPATH') || exit('No direct script allowed');

class Blog_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'blog';
		$this->data['primary_key'] = 'id_blog';
	}
}

