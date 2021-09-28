<?php

class Padre extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->driver("cache",array("adapter"=>"apc","backup"=>"file"));
		if ($this->session){
			$logged = $this->session->has_userdata("logged_in");
			if ($logged==false){
				header("Location: " . site_url("login"));

			}
		}else{
			header("Location: " . site_url("login"));

		}
	}
}
