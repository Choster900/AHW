<?php
class Grados_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();   
    }
    public function mostrar_grados($grd_id = NULL)
    {
        $this->db->select("*");
        $this->db->from("GRD_GRADO");
        if($grd_id != NULL){
            $this->db->where("GRD_ID",$grd_id);
        }
        $query = $this->db->get();
		return $query->result();
    }
    public function agregar_grados($data)
    {
        $this->db->insert("GRD_GRADO",$data);
		return $this->db->insert_id();
    }
    public function modificar_grado($data,$where)
    {
        $this->db->update('GRD_GRADO',$data,$where);
		return $this->db->affected_rows();
    }
    public function eliminar_grado($grd_id)
    {
        $this->db->delete('GRD_GRADO', array('GRD_ID' => $grd_id));
        return $this->db->affected_rows();

    }
}