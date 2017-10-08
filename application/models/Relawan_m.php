<?php defined('BASEPATH') || exit('No direct script allowed');

class Relawan_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'relawan';
		$this->data['primary_key'] = 'username';
	}
}

