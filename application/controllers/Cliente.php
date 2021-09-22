<?php

class Cliente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
	}
	public 	function  index(){
		$data["title"] = "Gestions - Clientes";
		$this->load->view("layout/head", $data);
		$this->load->view("layout/navbar");
		$this->load->view("layout/sidebar");

		$this->load->view("Cliente/cliente_index");

		$this->load->view("layout/footer");
	}


}
