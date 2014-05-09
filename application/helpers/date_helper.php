<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function dateBrToEn($date){
	$parts = explode("/", $date);
	return "{$parts[2]}-{$parts[1]}-{$parts[0]}";
}
function dateEnToBr($date){
$date = new DateTime($date);
return $date->format("d/m/Y");
	}
	
	function numerosEmReais($numero){
		return "R$ ". number_format($numero,2,",",".");
	}