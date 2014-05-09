<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimenta extends CI_Controller
{
	private $data = array();
	//carrega a lista de movimentação
	public function index()
	{
		$this->load->library('table');
		$this->load->model("moviments_model");
		$this->load->helper("aritimetric_helper");
		$movs = array("moviments" => $this->moviments_model->load());
		$this->data = $movs;
		$this->load->parse_template("movimenta/index",$this->data);
	}
	
	public function on_edit($param = NULL)
	{
		//primeiro checo que so array está vazio ou não
		if (empty($param))
		{
			$this->load->view("movimenta/formulario");
		}
		else
		{ 
			$this->load->model("moviments_model");
			$movs = array("moviments" => $this->moviments_model->load(array("id"=>$param)));
			$this->data = $movs;
			$this->load->view("movimenta/formulario",$movs);
		}
		
		//$this->load->parse_template("movimenta/formulario");
	}
	public function store()
	{
		$data 				= $this->input->post();
		$data["mov_data"]	= dateBrToEn($data["mov_data"]);
		$this->load->model("moviments_model");
		$this->moviments_model->store($data);
	}
}
?>