<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SDTECH
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		SDTECH
 * @author		Samuel Diogo CEO
 * @since		Version 2.1.4
 * @filesource
 * 
 */

// ------------------------------------------------------------------------

/**
 * MY Active Record Class
 *
 * This is the platform-independent base Active Record implementation class.
 *
 * @package		SDTECH
 * @subpackage	Drivers
 * @category	Database
 * @author		Samuel Diogo CEO
 */

class MY_T_Active_reccord
{
	//array with data object;
	protected $data;
	public function __construct($id = NULL)
	{
		if(isset($id) and !empty($id))
		{
			//load the object according with id value
			$object = $this->load($id);
			if ($object)
			{
				$this->fromArray($object->to_array());
			}
		}
	}
	/*
	 * method __clone()
	 * unset id
	 * */
	public function __clone()
	{
		unset($this->id);
	}
	public function __set($prop, $value)
	{
		if(method_exists($this, "set_".$prop))
		{
			call_user_func(array(
				$this,"set_".$prop,$value
			));
		}
		else 
		{
			if ($value === NULL)
			{
				unset($this->data[$prop]);
			}
			else 
			{
				$this->data[$prop] = $value;
			}
		}
		
	}
	
	public function __get($prop)
	{
		if (method_exists($this, "get_".$prop))
		{
			return call_user_func(array($this,"get_".$prop));
		}
		else
		{
			if (isset($this->data[$prop]))
			{
				return $this->data[$prop];
			}
		}
	}
	public function get_entity()
	{
		$class = get_class($this);
		return constant("{$class}::TABLENAME");
	}
	/*
	 * method fromArray
	* preenche os dados do objeto com um array
	*/
	public function from_array($data)
	{
		$this->data = $data;
	}
	
	public function to_array()
	{
		return $this->data;
	}
	
	/**
	 * store
	 *
	 * check if is an id value is setting, if is null them insert into database
	 * case is not null them update the database record
	 *
	 * @param	string
	 * @return	object
	 */
	public function store()
	{
		#insert:
		if (empty($this->data['id']) or (!$this->load_rec($this->id)))
		{
			if (empty($this->data['id']))
			{
				$this->id = $this->get_last() + 1;
			}
			
		}
		else
		{
			
		}
	}
	public function load_rec($id)
	{
		
	}
	public function get_last()
	{
		
	}
	public function delete($id = NULL)
	{
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}