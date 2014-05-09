<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
	var $name;
	var $useremail;
	var $nickname;
	var $password;
	
	public function index()
	{
		$this->load->parse_template("usuarios/autentica");
	}
	public function autentica()
	{
		$this->load->model("users_model");
		$this->nickname = $this->input->post("nickname");
		$this->password = md5($this->input->post("password"));
		
		if($user = $this->users_model->autentica($this->nickname,$this->password))
		{
			$this->session->set_userdata(array(
				"user_logged" => $user
			));
			$this->session->set_flashdata("success", "user logged");
			echo "logado";
			redirect("movimenta");
		}
		else
		{echo "logado";
			$this->session->set_flashdata("danger", "erro ao logar, tente novamente ou vá passear um pouco :)");
			redirect("/");
		}
		
	}
	public function logout()
	{
		$this->session->unset_userdata("user_logged");
		$this->session->set_flashdata("success","deslogado com sucesso");
		$this->load->parse_template("usuarios/autentica");
	}
}