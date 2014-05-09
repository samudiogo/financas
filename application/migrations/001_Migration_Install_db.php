<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_db extends CI_Migration
{
	public function up()
	{
		/*
		 * criando a tabela movimentacao:
		 * @mov_id auto_increment e primary key
		 * @mov_nome varchar(100)
		 * @descricao text descrição do movimento
		 * @data_movimento datetime
		 * @tp_movimento int ou smallint (entrada ou saida)
		 * @valor decimal com duas casa no máximo 100
		 * tp_valor in
		 */
		$fields = array(
			'mov_id' => array(
					'type' => 'INT',
					'auto_increment' => TRUE
			),
			'mov_nome' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
			),
			'descricao' => array(
					'type' => 'TEXT',
			),
			'data_movimento' => array(
					'type' => 'DATETIME'
			),
			'tp_movimento' => array(
					'type' => 'INT'
			),
			'tp_valor' => array(
					'type' => 'INT'
			)				
		);	
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field("valor decimal(15,2)");
		$this->dbforge->add_key('mov_id');
		$this->dbforge->create_table('movimentacao');
		
		
	}
	public function down()
	{
		$this->dbforge->drop_table('movimentacao');
	}
	
}