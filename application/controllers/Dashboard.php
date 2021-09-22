<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
	}
	public  function  index(){
		$data["title"] = "Dashboard";
		$this->load->view("layout/head", $data);
		$this->load->view("layout/navbar");
		$this->load->view("layout/sidebar");

		$this->load->view("dashboard/index_dashboard");

		$this->load->view("layout/footer");
	}
}
