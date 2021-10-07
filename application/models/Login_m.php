<?php

class Login_m extends CI_Model
{
	private $table = "Login";

	public function __construct()
	{

		parent::__construct();
	}

	public function getLogin($user, $pass)
	{
		$newPass = sha1($pass);
		$this->db->select("COUNT(u.id) as login, u.id,u.username,r.nombre");
		$this->db->from("usuario u");
		$this->db->join("rol r", "u.rol_id =r.id");
		$this->db->where("u.username", $user);
		$this->db->where("u.password", $newPass);
		$this->db->group_by(array("u.id"));

		$query = $this->db->get();
		return $query->row();
	}

	public function array_session($objquery)
	{
		$datasession = array(
			"id" => $objquery->id,
			"username" => $objquery->username,
			"rol" => $objquery->nombre,
			"logged_in" => TRUE
		);
		return $datasession;
	}

	public function login($user, $pass)
	{
		$datos = new stdClass();
		$datos->estado = false;

		$objquery = $this->getLogin($user, $pass);

		if ($objquery != null) {
			if ($objquery->login == 1) {
				$datos->estado = true;
				$datos->mensaje = "Login correcto";
				echo "datos correctos";
			}
		} else {
			$datos->estado = false;
			$datos->mensaje = "Login incorrecto";
			$datos->mensaje = "Login incorrecto";
			echo "datos incorrectos";

		}

		if ($datos->estado == true) {
			$arraySession = $this->array_session($objquery);
			$this->session->set_userdata($arraySession);
		}
		return $datos;
	}
}
