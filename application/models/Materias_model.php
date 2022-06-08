<?php
class Materias_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function consultar_materias($mat_id = NULL)
    {
        $this->db->select("*");
        $this->db->from("MAT_MATERIA");
        if($mat_id != NULL){
            $this->db->where("MAT_ID",$mat_id);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function agregar_materias($data)
    {
        $this->db->insert("MAT_MATERIA", $data);
        return $this->db->insert_id();
    }
    public function modificar_materias($data, $where)
    {
        $this->db->update('MAT_MATERIA', $data, $where);
        return $this->db->affected_rows();
    }
    public function eliminar_materias($grd_id)
    {
        $this->db->delete('MAT_MATERIA', array('MAT_ID' => $grd_id));
        return $this->db->affected_rows();
    }
}
