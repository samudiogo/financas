<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Moviments_model extends CI_Model
{
	public function store($param)
	{
		foreach (array_keys($param) as $key)
		{	
			if (empty($param["{$key}"]))
			{
				unset($param["{$key}"]);
			}
			$this->db->set($key,$param["{$key}"]);
		}
		if(empty($param['id']) or (!$this->db->get_where("movimentacao",array("id"=>$param['id']))->num_rows() >0))
		{
			#insert:
			if($this->db->insert("movimentacao"))
			{
				$this->session->set_flashdata("success","registro adicionado");
				redirect("movimenta");
			}
		}
		else
		{
			#update:
			if ($this->db->get_where("movimentacao",array("id"=>$param['id']))->num_rows() >0)
			{
				$this->db->where('id',$param['id']);
				if ($this->db->update("movimentacao"))
				{
					$this->session->set_flashdata("success","registro atualizado");
					redirect("movimenta");
				}
			}
		}				
	}
	
	public function load($param = NULL)
	{ 
		#select all:
		if($param !== NULL)
		{
			if (isset($param['id']) and (!empty($param['id'])))
			{
				return $this->db->get_where("movimentacao",array("id"=>$param["id"]))->row_array();	
			}
			else 
			{
				foreach (array_keys($param) as $key)
				{
					$this->db->where($key,$param["{$key}"]);
				}
			}	
		}
		return $this->db->get("movimentacao")->result_array();
	}
}