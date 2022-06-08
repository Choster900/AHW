<?php
class Grados extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Grados_model");
        $this->load->model("Materias_model");
        $this->load->helper("url");
    }

    public function index()
    {
        $data["grados"] = $this->Grados_model->mostrar_grados();
        $data["materias"] = $this->Materias_model->consultar_materias();


        $data["title"] = "Gestion - Grados y Materias";
        $this->load->view("layout/head", $data);
        $this->load->view("layout/navbar");
        $this->load->view("layout/sidebar");
        $this->load->view("Escuela/Grados/grado_index", $data); //pasamos la variable data a la vista para que se encuentre
        $this->load->view("layout/footer");
        $this->load->view("Escuela/Grados/end_grado_index");
    }
    public function agregar_grados()
    {
        $data = array(
            "GRD_ID" => 0,
            "GRD_NOMBRE" => $this->input->post("txtNombreGrado"),
        );

        if(!empty($data)){
            $res = $this->Grados_model->agregar_grados($data);
        }
        echo $res;
    }
    public function consultar_alumno(){
		$grd_id = $this->input->post("codigo");//obtenemos el id del boton
		$grd_grado = $this->Grados_model->mostrar_grados($grd_id); //enviamos el codigo del boton 
		echo json_encode($grd_grado); //imprimimos la informacion en un json
	}
    public function editar_grado()
    {
        $data = array(
            "GRD_NOMBRE" => $this->input->post("txtNombreGrado"),
        );

        if(!empty($data)){
            $res = $this->Grados_model->modificar_grado($data,array("GRD_ID" => $this->input->post("txtCodigo")));
        }
        echo $res;
    }
    public function eliminar_materia()
    {
        $grd_id = $this->input->post("codigo");
		$res = $this->Grados_model->eliminar_grado($grd_id);
        echo $res;
    }
}
