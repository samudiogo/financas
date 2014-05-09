<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function sumif($array,$criteria,$sum_array){
	if(is_array($array) && is_array($sum_array) && trim($criteria)!= ""){
		$array_count = (count($array) < count($sum_array)) ? count($array):count($sum_array);
		for($i=0;$i<$array_count;$i++){
			if(ereg("^<",$criteria)){
				$value = ereg_replace("^<","",$criteria);
				$result += $array[$i] < $value ? $sum_array[$i]:0;
			}
			elseif(ereg("^>",$criteria)){
				$value = ereg_replace("^>","",$criteria);
				$result += $array[$i] > $value ? $sum_array[$i]:0;
			}
			else{
				$value = $criteria;
				$result += $array[$i] == $value ? $sum_array[$i]:0;
			}

		}
		return $result ? $result:0;
	}
}