<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<title>Financas</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dataTables.bootstrap.css')?>">
	<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-1.10.2.min.js')?>"></script>
	<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.dataTables.js')?>"></script>
	<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/dataTables.bootstrap.js')?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/style_default.css')?>" >	
	</head>
	<body>
		<div class="container">
		<header class="topo-menu">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
				<?php if(!($x = auth_check())):?>							
				<a class="btn btn-default navbar-btn glyphicon glyphicon-log-in">Login</a>		
				<?php elseif ($x["tp_user"] == 1) : ?>
				<a class="btn btn-warning navbar-btn" href="<?= base_url("site/logout")?>"><i class="glyphicon glyphicon-log-out"></i> logout</a>
				<a class="btn btn-default navbar-btn">cadastro</a>
				<?php else :?>
				<a class="btn btn-warning navbar-btn" href="<?= base_url("site/logout")?>"><i class="glyphicon glyphicon-log-out"></i>logout</a>				
				<?php endif;?>
				</div>
			</nav>
		</header>
		<header class="topo-geral">
			<section class="alert-area">
				<?php if ($this->session->flashdata("success")): ?>
				<p class="alert alert-success"><?php echo $this->session->flashdata("success"); ?>
				<?php elseif ($this->session->flashdata("danger")): ?>
				<p class="alert alert-danger"><?php echo $this->session->flashdata("danger"); ?>
				<?php endif;?>
			</section>
		</header>
		
		