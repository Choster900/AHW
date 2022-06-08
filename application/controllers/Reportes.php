<?php
class Reportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("Alumno_model");
		$this->load->helper("url");
    }
    public function index()
	{
       	$data["cant_h_m"] = $this->Alumno_model->cantidad_h_m();
    	$data["cant_generos_grados"] = $this->Alumno_model->cant_genero_grado();

		$data["cant_mayor_edad"] = $this->Alumno_model->cant_mayoredad_grado();
    	$data["tot_mayor_edad"] = $this->Alumno_model->tot_mayor_edad();


		$data["title"] = "Reportes - Alumnos";
		$this->load->view("layout/head", $data);
		$this->load->view("layout/navbar");
		$this->load->view("layout/sidebar");
		$this->load->view("Reportes/reportes_index", $data); //pasamos la variable data a la vista para que se encuentre
		$this->load->view("layout/footer");
		$this->load->view("Reportes/end_reportes");

	}

}
