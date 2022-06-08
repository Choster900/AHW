<?php
class Alumno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Alumno_model");
        $this->load->helper("url");
    }

    public function index()
    {
        $data["alm_alumno"] = $this->Alumno_model->consultar_alumno_tabla(); //mostrar todas los alumnos en la tabla
        $data["grd_grado"] = $this->Alumno_model->consultar_grado(); //mostrar todas las materias en el select de agregar y eliminar

        $data["title"] = "Gestions - Alumnos";
        $this->load->view("layout/head", $data);
        $this->load->view("layout/navbar");
        $this->load->view("layout/sidebar");
        $this->load->view("Alumno/alumno_index", $data); //pasamos la variable data a la vista para que se encuentre
        $this->load->view("layout/footer");
        $this->load->view("Alumno/end_alumno");
    }
    public function agregar_alumno()
    {
        //enviando los datos en un arreglo
        $existe_codigo = false;
        if (!empty($this->input->post("txtObservacionesAlumno"))) {
            $data = array(
                "ALM_ID" => 0,
                "ALM_CODIGO" => $this->input->post("txtCodeAlumno"),
                "ALM_NOMBRE" => $this->input->post("txtNombreAlumno"),
                "ALM_EDAD" => $this->input->post("txtEdadAlumno"),
                "ALM_SEXO" => $this->input->post("rdbSexo"),
                "ALM_ID_GRD" => $this->input->post("sGrado"),
                "ALM_OBSERVACION" => $this->input->post("txtObservacionesAlumno"),
            );
        } else {
            $data = array(
                "ALM_ID" => 0,
                "ALM_CODIGO" => $this->input->post("txtCodeAlumno"),
                "ALM_NOMBRE" => $this->input->post("txtNombreAlumno"),
                "ALM_EDAD" => $this->input->post("txtEdadAlumno"),
                "ALM_SEXO" => $this->input->post("rdbSexo"),
                "ALM_ID_GRD" => $this->input->post("sGrado"),
                "ALM_OBSERVACION" => "SIN OBSERVACIONES", //si viene vacio la caja de observaciones nosotros introducimos por defecto algo
            );
        }
        $validacion = $this->Alumno_model->validar_codigo($this->input->post("txtCodeAlumno"));
        if (empty($validacion)) {
            $existe_codigo = true;
        } else {
            $existe_codigo = false;
        }

        if ($existe_codigo) {
            $res = $this->Alumno_model->guardar_alumno($data);
            if ($res > 0) {
                header("Location: " . site_url("Alumno"));
            }
            echo true;
        } else {
            echo false;
        }
    }
    public function consultar_alumno()
    {
        $alm_id = $this->input->post("id"); //obtenemos el id del boton
        $alumno = $this->Alumno_model->obtener_alumno($alm_id); //enviamos el codigo del boton 
        echo json_encode($alumno); //imprimimos la informacion en un json
    }
    public function actualizar_alumno()
    {
        if (!empty($this->input->post("txtObservacionesAlumno"))) {
            $data = array(
                "ALM_CODIGO" => $this->input->post("txtCodeAlumno"),
                "ALM_NOMBRE" => $this->input->post("txtNombreAlumno"),
                "ALM_EDAD" => $this->input->post("txtEdadAlumno"),
                "ALM_SEXO" => $this->input->post("rdbSexo"),
                "ALM_ID_GRD" => $this->input->post("sGradoE"),
                "ALM_OBSERVACION" => $this->input->post("txtObservacionesAlumno"),
            );
        } else {
            $data = array(
                "ALM_CODIGO" => $this->input->post("txtCodeAlumno"),
                "ALM_NOMBRE" => $this->input->post("txtNombreAlumno"),
                "ALM_EDAD" => $this->input->post("txtEdadAlumno"),
                "ALM_SEXO" => $this->input->post("rdbSexo"),
                "ALM_ID_GRD" => $this->input->post("sGradoE"),
                "ALM_OBSERVACION" => "SIN OBSERVACIONES",
            );
        }
        $res = $this->Alumno_model->validar_id_al_editar($this->input->post("ALM_ID"));
        $existe = false;
        foreach ($res as  $value) {

            //validamos si el codigo que enviamose es el mismo del registro si no es el mismo
            //vamos a verificar que el codigo que envio sea diferente
            if ($this->input->post("txtCodeAlumno") == $value->ALM_CODIGO) {
                //echo "SE PUEDE EDITAR";
                $res = $this->Alumno_model->editar_alumno($data, array("ALM_ID" => $this->input->post("ALM_ID")));

                echo true;
            } else {
                //echo "EL CODIGO NO ES IGUAL PERO VAMOS A VALIDAR SI YA EXISTE<br>";
                $existe = true;
            }
        }
        //verificamos si es diferente a los que ya existe, en caso de que exista vamos a marcar error
        //si no existe vamos a guardar perfectamente el formulario
        if ($existe) {
            $ex = $this->Alumno_model->validar_codigo($this->input->post("txtCodeAlumno"));
            if (empty($ex)) {
                //echo "EL codigo NO existe podemos editar";
                $res = $this->Alumno_model->editar_alumno($data, array("ALM_ID" => $this->input->post("ALM_ID")));
                echo true;
            } else {
                //echo "El codigo exite no se puede editar";
                echo false;
            }
        }
    }
    //dibuja los alumnos en una tabla buscados por codigo del alumno
    public function consultar_alumno_select()
    {
        $alm_id = $this->input->post("ALM_ID"); // TOMAMOS EL CODIGO QUE LE ENVIAMOS AL AJAX
        if ($alm_id != 0) {
            $alumno = $this->Alumno_model->consultar_alumno_tabla($alm_id); //ENVIAMOS EL CODIGO AL METODO CON EL PARAMETRO QUE BUSCAMOS
            $tr = "";
            foreach ($alumno as $value) {
                $tr .= '
				<tr>
					<td>' . $value->ALM_ID . '.</td>
					<td>' . $value->ALM_NOMBRE . '.</td>
					<td>' . $value->GRD_NOMBRE . '.</td>
					<td>' . $value->MATERIAS . '.</td>
					<td>
						<div class="btn btn-primary editarAlumno" id=' . $value->ALM_ID . '>Ver</div>
						<div class="btn btn-danger borrarAlumno" id=' . $value->ALM_ID . '>Borrar</div>
					</td>
				</tr>';
            }
            echo $tr;
        } else {
            $alumno = $this->Alumno_model->consultar_alumno_tabla(); //AL SELECIONAR TODOS EN EL SELECT NO EVIAMOS NADA EN AL PARAMETRO ASI QUE NOS TRAE TODO
            $tr = "";
            foreach ($alumno as $value) {
                $tr .= '
				<tr>
					<td>' . $value->ALM_ID . '.</td>
					<td>' . $value->ALM_NOMBRE . '.</td>
					<td>' . $value->GRD_NOMBRE . '.</td>
					<td>' . $value->MATERIAS . '.</td>
					<td>
						<div class="btn btn-primary editarAlumno" id=' . $value->ALM_ID . '>Ver</div>
						<div class="btn btn-danger borrarAlumno" id=' . $value->ALM_ID . '>Borrar</div>
					</td>
				</tr>';
            }
            echo $tr;
        }
    }
    public function eliminar_alumno()
    {
        $alm_id = $this->input->post("id");
        $res = $this->Alumno_model->eliminar_alumno($alm_id);
    }
}
