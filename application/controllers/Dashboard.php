<?php
include (APPPATH."controllers/Padre.php");
class Dashboard extends Padre
{
	public function __construct()
	{
		parent::__construct();
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
