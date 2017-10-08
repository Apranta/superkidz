<?php

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->data['content'] 	= 'tes';
		$this->data['title'] = 'Home'.$this->title;
        $this->template($this->data,'home');
	}
}
