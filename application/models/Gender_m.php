<?php defined('BASEPATH') || exit('No direct script allowed');

class Gender_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'gender';
		$this->data['primary_key'] = 'id_gender';
	}
}

