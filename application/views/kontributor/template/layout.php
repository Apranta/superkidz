<?php

	$this->load->view('kontributor/template/header', array('title' => $title));
	$this->load->view('kontributor/template/navbar');
	$this->load->view('kontributor/template/sidebar');
	$this->load->view($content);
	$this->load->view('kontributor/template/footer');
?>
