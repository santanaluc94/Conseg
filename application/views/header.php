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
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="<?= base_url(); ?>">CONSEG Guarulhos</a>			
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Novo
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?=base_url('cidadaos/cadastro')?>">Cidadão</a>
							<a class="dropdown-item" href="<?=base_url('consegs/cadastro')?>">CONSEG</a>		
							<a class="dropdown-item" href="<?=base_url('demandas/cadastro')?>">Demandas</a>				
							<a class="dropdown-item" href="<?=base_url('secretarias/cadastro')?>">Secretarias</a>						
							<a class="dropdown-item" href="<?=base_url('usuarios/cadastro')?>">Usuários</a>
						</div>					
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('demandas')?>">
							Demandas
						</a>									
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('cidadaos')?>">
							Cidadãos
						</a>									
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('consegs')?>">
							Consegs
						</a>									
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('secretarias')?>">
							Secretarias
						</a>									
					</li>
					<li class="nav-item mr-auto">
						<a class="nav-link" href="<?=base_url('usuarios')?>">
							Usuários
						</a>									
					</li>									
				</ul>	
				<li class="nav-item text-right">
					<button class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i> Logout</button>
				</li>
			</div>
		</nav>
	</header>