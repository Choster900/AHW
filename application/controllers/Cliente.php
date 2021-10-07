<?php
defined("BASEPATH");
include(APPPATH . "controllers/Padre.php");

class Cliente extends Padre
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Cliente_m");
	}

	public function index()
	{
		$data["clientes"] = $this->Cliente_m->getAllClientes();
		$data["title"] = "Gestions - Clientes";
		$this->load->view("layout/head", $data);
		$this->load->view("layout/navbar");
		$this->load->view("layout/sidebar");

		$this->load->view("Cliente/cliente_index", $data);

		$this->load->view("layout/footer");
		$this->load->view("Cliente/end_cliente");

	}

	public function save_cliente()
	{
		$data = array("id" => 0,
			"nombres" => $this->input->post("nombre"),
			"apellidos" => $this->input->post("Apellido"),
			"direccion" => $this->input->post("Direccion"),
			"telefono" => $this->input->post("Telefonoo"),
			"email" => $this->input->post("email"),
			"estado" => 1
		);
		$res = $this->Cliente_m->save_cliente_m($data);
		if ($res > 0) {
			header("Location: " . site_url("cliente"));
		}
	}

	public function jalar_info()
	{
		$idCliente = $this->input->post("id");
		$cliente = $this->Cliente_m->getAllClientes($idCliente);
		echo json_encode($cliente);
	}

	public function eliminar()
	{
		$idCliente = $this->input->post("id");
		$res = $cliente = $this->Cliente_m->delete($idCliente);

		if ($res > 0) {
			header("Location: " . site_url("cliente"));
		}
	}

	public function update_cliente()
	{
		$data = array(
			"nombres" => $this->input->post("nombre"),
			"apellidos" => $this->input->post("Apellido"),
			"direccion" => $this->input->post("Direccion"),
			"telefono" => $this->input->post("Telefono"),
			"email" => $this->input->post("email"),
		);
		$res = $this->Cliente_m->update_cliente_m(array("id" => $this->input->post("idCLiente")), $data);

		if ($res > 0) {
			header("Location: " . site_url("cliente"));
		}
	}


}
