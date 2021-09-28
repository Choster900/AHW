<?php

class Cliente_m extends CI_Model
{
	private $table = "cliente";
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllClientes(){
		$this->db->select("*");
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result();
	}
}
