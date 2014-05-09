<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***
 * verifico se o usuario está logado, caso não esteja, volta para a página de login
 * @return void*/
function auth_check()
{	//pego a instancia do codeigniter :)
	$ci = get_instance();
	$user_logged = $ci->session->userdata("user_logged");
	if(!$user_logged)
	{	//$this->session->unset_userdata("user_logged");
		$ci->session->set_flashdata("danger","Faça Login para acessar o sistema");
		//redirect("usuarios/autentica");
		//return FALSE;
	}
	return $user_logged;
	
}