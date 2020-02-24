<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Conseg</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bootstrap 4 Mobile App Template">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
	<style>
		body {
			font-size:14px;
		}
		.form-error{
			font-size:12px;
			color:red;
		}
	</style>
</head>

<body>
	<header class="header" style="margin-bottom: 2.5%">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?= base_url(); ?>">CONSEG Guarulhos</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false">
				<span class="navbar-toggler-icon"></span>
			</button>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Cadastro
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?=base_url('cidadaos')?>">Cidadão</a>
						<a class="dropdown-item" href="<?=base_url('consegs')?>">CONSEG</a>		
						<a class="dropdown-item" href="<?=base_url('demandas')?>">Demandas</a>				
						<a class="dropdown-item" href="<?=base_url('secretarias')?>">Secretarias</a>						
						<a class="dropdown-item" href="<?=base_url('usuarios')?>">Usuários</a>
					</div>					
				</li>
			</ul>

			<div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
				<ul class="navbar-nav ml-auto">					
					<li class="nav-item float-right">
						<a class="nav-link" href="#"><button class="btn btn-danger btn-sm">Logout</button></a>
					</li>
				</ul>
			</div>
		</nav>
	</header>