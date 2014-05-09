<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supremo_utils {
	public function check_array_propeties($arr_name,$item, $index = '')
	{
		if ($item == '')
		{
			if (! isset($arr_name[$item]))
			{
				return FALSE;
			}
			$pref = $arr_name[$item];
		}
		else
		{
			if(! isset($arr_name[$index]))
			{
				return FALSE;
			}
			if (! isset($arr_name[$index][$item]))
			{
				return FALSE;
			}
			$pref = $arr_name[$index][$index];
		}
		return $pref;
	}
	
}