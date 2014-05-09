<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_loader extends CI_Loader
{
	public function parse_template($path, $data="")
	{
		$ci= get_instance();
		$ci->load->view("theme_default/header");
		$ci->load->view($path,$data);
		$ci->load->view("theme_default/footer");
	}
}