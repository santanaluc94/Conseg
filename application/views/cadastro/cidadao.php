<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-dark" style="color: white">Cadastro de Cidadãos</div>
					<div class="card-body">
						<form action="<?= base_url('cidadaos/cidadaoPost/').$cidadao->CIDIDCIDADAO ?>" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="cidadao" class="col-form-label text-md-right">CONSEG:</label>								
										<select class="form-control" name="conseg" id="conseg">
											<option>Selecione o CONSEG do cidadão</option>
											<?php foreach($consegs as $conseg):?>
												<option value="<?=$conseg->CONIDCONSEG?>" <?php if($conseg->CONIDCONSEG == $cidadao->CONIDCONSEG) { echo "selected"; }?>><?=$conseg->CONNOME?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="nome" class="col-form-label text-md-right">Nome:</label>
										<input type="text" id="nome" name="nome" value="<?=$cidadao->CIDNOME?>" class="form-control" required>								
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-5">
									<div class="form-group">
										<label for="email" class="col-form-label text-md-right">E-mail:</label>
										<input type="email" id="email" name="email" value="<?=$cidadao->CIDEMAIL?>" class="form-control" data-validation="email" required>								
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="celular" class="col-form-label text-md-right">Celular/ Telefone:</label>								
										<input type="text" id="telefone" name="celular" value="<?=$cidadao->CIDCELULAR?>" class="form-control" data-validation="brphone" required>
									</div>
								</div>								
							</div>
							<hr>												
							<div class="row">
								<div class="col-2">
								    <input type="hidden" name="acao" value="<?=$acao?>">
									<button type="submit" class="btn btn-dark btn-block">
										<?php if($acao == "editar") { echo "Editar"; }else{ echo "Cadastrar"; }?>										
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

<script type="text/javascript">
	window.onload = function() {
		$('#cpf').mask('000.000.000-00');
		$('#telefone').mask('(00) 0000-00009');
	};
</script>