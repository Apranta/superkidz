<?php defined('BASEPATH') || exit('No direct script allowed');

class Kontributor_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'kontributor';
		$this->data['primary_key'] = 'username';
	}
}

