<?php
class Users_model extends CI_Model
{
	public function autentica($nickname, $password)
	{
		$fields = array(
			"nickname" => $nickname,
			"password" => $password
		);
		$user =  $this->db->get_where("users",$fields)->row_array();
		return $user;
	}
}

?>