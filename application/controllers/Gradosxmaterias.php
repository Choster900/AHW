<?php
class Gradosxmaterias extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Gradosxmaterias_model");
        $this->load->model("Alumno_model");
        $this->load->model("Materias_model");

        $this->load->helper("url");
    }
    public function index()
    {
        $data["mxg_materiasxgrado"] = $this->Gradosxmaterias_model->consultar_gradosxmaterias();
        $data["grado"] = $this->Alumno_model->consultar_grado();
        $data["materias"] = $this->Materias_model->consultar_materias();

        $data["title"] = "Gestions - Grados y Materias";
        $this->load->view("layout/head", $data);
        $this->load->view("layout/navbar");
        $this->load->view("layout/sidebar");
        $this->load->view("Escuela/materias_grados_index", $data); //pasamos la variable data a la vista para que se encuentre
        $this->load->view("layout/footer");
        $this->load->view("Escuela/end_materias_grados");
    }
    public function agregar_mxg_materiasxgrado()
    {
        //recolecta los datos enviamos. tomamos la materia y hacemos un recorrido en la tabla de mxg_materias
        //si la materia enviada ya existe retornamos true (es decir ya existe) en caso contrario retornamos false
        $existe = false;
        $data = array(
            "MXG_ID" => 0,
            "MXG_ID_GRD" => $this->input->post("slcGrado"),
            "MXG_ID_MAT" => $this->input->post("sclMaterias"),
        );
        $codigoMateria = $this->input->post("sclMaterias");
        $alumno = $this->Gradosxmaterias_model->validacion($this->input->post("slcGrado"), $this->input->post("sclMaterias")); //ENVIAMOS EL CODIGO AL METODO CON EL PARAMETRO QUE BUSCAMOS
        //recorriendo la tabla para validar fila por fila
        foreach ($alumno as  $value) {
            if ($value->MXG_ID_MAT == $codigoMateria) {
                $existe = true;
                break;
            } else {
                $existe = false;
            }
        }
        if ($existe) {
            echo true;
        } else {
            $res = $alumno = $this->Gradosxmaterias_model->guardar_materiaxgrado($data);
            echo false;
        }
    }
    public function consultar_materias_de_grado()
    {
        $mxg_id = $this->input->post("codigo");
        $materiasxgrado = $this->Gradosxmaterias_model->consultar_materias_de_grados($mxg_id);
        $tr = '';
        foreach ($materiasxgrado as $value) {
            $tr .= '<tr>
                    <td class="text-center">' . $value->MXG_ID . '</td>
                    <td class="text-center">' . $value->MAT_NOMBRE . '</td>
                    <td class="text-center">
                        <div class="btn btn-danger eliminarMateria" id=' . $value->MXG_ID . '>X</div>
                    </td>
                </tr>
                ';
        }
        echo $tr;
    }

    public function eliminar_materia()
    {
        $mxg_id = $this->input->post("codigo");
        $materiasxgrado = $this->Gradosxmaterias_model->eliminar_materia_de_grado($mxg_id);
    }
}
