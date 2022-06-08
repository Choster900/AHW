<?php
class Alumno_model extends CI_Model
{
	private $table_alumno = "alm_alumno";

	public function __construct()
	{
		parent::__construct();
	}

	public function consultar_grado()
	{
		$this->db->select('*');
		$this->db->from('GRD_GRADO');
		
		$query = $this->db->get();
		return $query->result();
	}
	public function validar_codigo($alm_codigo)
	{
		$this->db->select('ALM_CODIGO');
		$this->db->from('ALM_ALUMNO');
		$this->db->where("ALM_CODIGO", $alm_codigo);

		$query = $this->db->get();
		return $query->result();
	}
	public function validar_id_al_editar($alm_codigo)//<--------------------------------------WORKING
	{
		$this->db->select('ALM_CODIGO');
		$this->db->from('ALM_ALUMNO');
		$this->db->where("ALM_ID", $alm_codigo);

		$query = $this->db->get();
		return $query->result();

	}

	//OBTENIENDO LOS ALUMNOS PARA MOSTRALO EN LA TABLA
	public function consultar_alumno_tabla($alm_id = NULL)
	{
		$this->db->select("
			ALM_ID,
			ALM_NOMBRE,
			GRD_NOMBRE,
			INSERT(
				(SELECT GROUP_CONCAT(MAT_NOMBRE SEPARATOR ', ')
					FROM MAT_MATERIA
					LEFT JOIN MXG_MATERIASXGRADO ON MXG_ID_MAT = MAT_ID
					WHERE MXG_ID_GRD = GRD_ID),
					0,0, ''
					)AS MATERIAS");
		$this->db->from('ALM_ALUMNO');
		$this->db->join('grd_grado', 'GRD_ID = ALM_ID_GRD','LEFT');
		$this->db->join('mxg_materiasxgrado', 'MXG_ID_GRD = GRD_ID','LEFT');
		if ($alm_id != NULL) {
			$this->db->where("ALM_ID", $alm_id);
		}
		$this->db->group_by('ALM_ID');
		$this->db->order_by('ALM_ID', 'ASC');

		$query = $this->db->get();
		return $query->result();
	}
	public function guardar_alumno($data)
	{
		$this->db->insert($this->table_alumno, $data);
		return $this->db->insert_id();
	}
	//OBTENIENDO ALUMNO SOLO PARA MOSTRARLO EN EL FORMULARIO PARA EDITAR
	public function obtener_alumno($alm_id)
	{
		$this->db->select('*');
		$this->db->from('ALM_ALUMNO');
		$this->db->where('ALM_ID', $alm_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function editar_alumno($data, $where)
	{
		$this->db->update('ALM_ALUMNO', $data, $where);
		return $this->db->affected_rows();
	}
	public function eliminar_alumno($alm_id)
	{
		$this->db->delete('ALM_ALUMNO', array('ALM_ID' => $alm_id));
	}
	//contabiliza la cantidad de alumnos
	public function cant_genero_grado()
	{
		$this->db->select("
			GRD_NOMBRE,
			COUNT(CASE WHEN ALM_SEXO = 'Femenino' then 1 end ) AS FEMENINO,
			COUNT(CASE WHEN ALM_SEXO = 'Masculino' then 1 end ) AS MASCULINO
		");
		$this->db->from('ALM_ALUMNO');
		$this->db->join("GRD_GRADO","GRD_ID = ALM_ID_GRD");
		$this->db->group_by("GRD_ID");

		$query = $this->db->get();
		return $query->result();
	}
	//totaliza la cantidad de mujeres y hombres en los registros
	public function cantidad_h_m()
	{
		$this->db->select("
			COUNT(CASE WHEN ALM_SEXO = 'Femenino' then 1 end ) AS FEMENINO,
			COUNT(CASE WHEN ALM_SEXO = 'Masculino' then 1 end ) AS MASCULINO
		");
		$this->db->from('ALM_ALUMNO');
		$query = $this->db->get();
		return $query->result();
	}
	public function cant_mayoredad_grado()
	{
		$this->db->select("
			GRD_NOMBRE,
			COUNT(CASE WHEN ALM_EDAD >= 18 then 1 end ) AS Mayores_edad,
			COUNT(CASE WHEN ALM_EDAD < 18 then 1 end ) AS Menores_edad
		");
		$this->db->from('ALM_ALUMNO');
		$this->db->join("GRD_GRADO","GRD_ID = ALM_ID_GRD");
		$this->db->group_by("GRD_ID");

		$query = $this->db->get();
		return $query->result();
	}
	//totaliza la cantidad de alumnos menores y mayores de edad
	public function tot_mayor_edad()
	{
		$this->db->select("
			COUNT(CASE WHEN ALM_EDAD >= 18 then 1 end ) AS Mayores_edad,
			COUNT(CASE WHEN ALM_EDAD < 18 then 1 end ) AS Menores_edad
		");
		$this->db->from('ALM_ALUMNO');
		$query = $this->db->get();
		return $query->result();
	}
	
}
