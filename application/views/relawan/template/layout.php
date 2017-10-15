<?php

	$this->load->view('relawan/template/header', array('title' => $title));
	$this->load->view('relawan/template/navbar');
	$this->load->view('relawan/template/sidebar');
	$this->load->view($content);
	$this->load->view('relawan/template/footer');
?>
