<?php

class Cliente_m extends CI_Model
{
	private $table = "cliente";
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllClientes($idcliente = null){
		$this->db->select("*");
		$this->db->from($this->table);
		if ($idcliente!= null){
			$this->db->where("id",$idcliente);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function save_cliente_m($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	public function update_cliente_m($where, $data){
		$this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}
}
