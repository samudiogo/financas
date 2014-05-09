<?php

#namespace controllers;

class Teste extends \CI_Controller
{
	public function index()
	{
		$this->load->dbutil();
		var_dump($this->dbutil->list_databases());
		
	}
}

?>