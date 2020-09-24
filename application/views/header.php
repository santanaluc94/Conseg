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
	<link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-size:1rem;
			height: 800px;
            background-color:#ECF0F1;
            font-family: 'Karla', sans-serif;
		}
		.form-error{
			font-size:12px;
			color:red;
		}
		li {
			list-style-type: none;
		}		

		.conteudo {    
			min-height: 800px;
		}
	</style>
</head>

<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
						</div>					
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('demandas/lista/2')?>">
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
					<span class="text-white mr-2">Olá, <?= $this->session->userdata('nome');?></span>
					<a href="Login/logout"><button class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i> Logout</button></a>
				</li>				
			</div>
		</nav>
	</header>