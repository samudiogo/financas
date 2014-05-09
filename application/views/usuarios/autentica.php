<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="container login-container">
<?= form_open("site/autentica")?>
	<?= form_label("nickname","nickname")?>
	<?= form_input(array("name" => "nickname","id"=>"nickname","class"=>"form-control", "maxlength"=>"100"))?>
	<?= form_label("password","password")?>
	<?= form_input(array("name" => "password","id"=>"password","class"=>"form-control", "type"=>"password"))?>
	<?= form_button(array("content" => "login","id"=>"btn-login","class"=>"btn btn-primary", "type"=>"submit"))?>
<?= form_close() ?>
</div>

