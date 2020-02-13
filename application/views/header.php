<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?= base_url(); ?>">Logo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse w-100 order-3 dual-collapse2">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item float-right">
						<a class="nav-link" href="#">Cadastro</a>
					</li>
					<li class="nav-item float-right">
						<a class="nav-link" href="#">Login</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>