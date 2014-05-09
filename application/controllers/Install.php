<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller
{
	public function migrate(){
		$this->load->library("migration");
		$result = $this->migration->current();
		if ($result)
		{
			echo "migrado";
		}else{
			show_error("fudeo");
		}
	}
	public function cria()
	{
		$this->load->dbforge();
		$fields = array(
			'id' => array(
					'type' => 'INT',
					'auto_increment' => TRUE
			),
			'username' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
			),
			'nickname' => array(
					'type' => 'VARCHAR',
					'constraint' => '50'
			),
			'user_email' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
			),
			'password' => array(
					'type' => 'VARCHAR',
					'constraint' => '255'
			),
			'data_nascimento' => array(
					'type' => 'DATE'
			),
			'data_crieated' => array(
					'type' => 'DATETIME'
			),
			'tp_user' => array(
					'type' => 'INT'
			)				
		);	
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id',TRUE);
		if ($this->dbforge->create_table('users'))
		{
			echo "table 'user' criaded";
		}
	}
		public function cria2()
		{
			$this->load->dbforge();
		$fields = array(
				'id' => array(
						'type' => 'INT',
						'auto_increment' => TRUE
				),
				'mov_id_user' => array(
						'type' => 'INT'
				),
				'mov_name' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
				),
				'mov_desc' => array(
						'type' => 'TEXT',
				),
				'mov_data' => array(
						'type' => 'DATETIME'
				),
				'mov_tp_mov' => array(
						'type' => 'INT'
				)
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field("mov_valor decimal(15,2)");
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->add_foreign_key(array(
			"field" 		=> "mov_id_user",
			"foreign_table" => "users",
			"foreign_field" => "id"
		));
		if ($this->dbforge->create_table('movimentacao'))
		{
			echo "table 'movimentacao' criaded.";
		}
		
	}
}