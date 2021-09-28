<?php
defined("BASEPATH");
include (APPPATH."controllers/Padre.php");
class Cliente extends Padre
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Cliente_m");
	}
	public 	function  index(){
		$data["clientes"]=$this->Cliente_m->getAllClientes();
		$data["title"] = "Gestions - Clientes";
		$this->load->view("layout/head", $data);
		$this->load->view("layout/navbar");
		$this->load->view("layout/sidebar");

		$this->load->view("Cliente/cliente_index",$data);

		$this->load->view("layout/footer");
		$this->load->view("Cliente/end_cliente");

	}


}
