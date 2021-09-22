<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Login_m");
	}
	public 	function  index(){
		$logged = $this->session->has_userdata("logged_in");
		if ($logged){
			header("Location: ".site_url("dashboard"));
			echo $logged;
		}else{
			$this->load->view("login/index_login");
		}

	}
	public function login(){
		if (!empty($_POST))
		{
			$user = $_POST["user"];
			$pass = $this->input->post("password");

			$res = $this->Login_m->login($user,$pass);

			if ($res->estado){
				header("Location: ".site_url("dashboard"));
			}else{
				header("Location: ".site_url("login"));

			}
		}
		else{
			echo "todo mal";
		}

	}
}
