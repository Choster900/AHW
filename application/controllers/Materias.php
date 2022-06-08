<?php
class Materias extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Grados_model");
        $this->load->model("Materias_model");
        $this->load->helper("url");
    }

    public function agregar_materias()
    {
        $data = array(
            "MAT_ID" => 0,
            "MAT_NOMBRE" => $this->input->post("txtNombreMateria"),
        );
        $res = $this->Materias_model->agregar_materias($data);
        echo $res;
    }
    public function consultar_materias(){
		$mat_id = $this->input->post("codigo");//obtenemos el id del boton
		$mat_materias = $this->Materias_model->consultar_materias($mat_id); //enviamos el codigo del boton 
		echo json_encode($mat_materias); //imprimimos la informacion en un json
	}
    public function editar_materia()
    {
        $data = array(
            "MAT_NOMBRE" => $this->input->post("txtNombreMat"),
        );
        $res = $this->Materias_model->modificar_materias($data,array("MAT_ID" => $this->input->post("txtCodigoMat")));
        echo $res;
    }
    public function eliminar_materia()
    {
        $grd_id = $this->input->post("codigo");
		$res = $this->Materias_model->eliminar_materias($grd_id);
        echo $res;
    }
    
}
