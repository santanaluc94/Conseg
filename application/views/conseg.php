<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-dark" style="color: white">Cadastro de CONSEGs</div>
					<div class="card-body">
						<form action="<?= base_url('Conseg/consegPost') ?>" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="cidadao" class="col-form-label text-md-right">CONSEG:</label>								
										<input type="text" id="titulo" name="titulo" class="form-control" required>	
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="nome" class="col-form-label text-md-right">Presidente (Nome):</label>
										<input type="text" id="nome" name="nome" class="form-control" required>								
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-5">
									<div class="form-group">
										<label for="email" class="col-form-label text-md-right">Presidente (E-mail):</label>
										<input type="email" id="email" name="email" class="form-control" data-validation="email" required>								
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="celular" class="col-form-label text-md-right">Presidente (Celular/ Telefone):</label>								
										<input type="text" id="telefone" name="celular" class="form-control" data-validation="brphone" required>
									</div>
								</div>								
							</div>
							<hr>												
							<div class="row">
								<div class="col-2">
									<button type="submit" class="btn btn-dark btn-block">
										Cadastrar
									</button>
								</div>
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

