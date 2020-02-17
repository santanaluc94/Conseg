<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-dark" style="color: white">Cadastro de Demandas</div>
					<div class="card-body">
						<form action="<?= base_url('demanda/demandaPost') ?>" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="cidadao" class="col-form-label text-md-right">Cidadão:</label>								
										<select class="form-control" name="cidadao" id="cidadao">
											<option>Selecione o cidadão para abrir a demanda</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label for="data" class="col-form-label text-md-right">Data:</label>
										<input type="text" id="data" name="data" class="form-control date" data-validation="date" data-validation-format="dd/mm/yyyy" required>								
									</div>
								</div>
								<div class="col-2">
									<div class="form-group">
										<label for="horario" class="col-form-label text-md-right">Horário:</label>
										<input type="text" id="horario" name="horario" class="form-control time" data-validation="time" data-validation-help="HH:mm" required>								
									</div>
								</div>
								<div class="col-5">
									<div class="form-group">
										<label for="nome" class="col-form-label text-md-right">Secretaria:</label>								
										<select class="form-control" name="secretaria" id="secretaria">
											<option>Selecione a secretaria responsável</option>
										</select>
									</div>
								</div>
								<div class="col-3 mt-5">
									<div class="form-check d-flex justify-content-baseline">
										<input type="checkbox" id="privacidade" name="privacidade" class="form-check-input">
										<label class="form-check-label" for="privacidade">Necessita Privacidade</label>
									</div>									
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label for="cep" class="col-form-label text-md-right">CEP:</label>
										<input type="text" id="cep" name="cep" class="form-control cep" data-validation="cep" required>								
									</div>
								</div>
								<div class="col-10">
									<div class="form-group">
										<label for="endereco" class="col-form-label text-md-right">Endereço:</label>
										<input type="text" id="endereco" name="endereco" class="form-control" required>								
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label for="bairro" class="col-form-label text-md-right">Bairro:</label>
										<input type="text" id="bairro" name="bairro" class="form-control"  required>								
									</div>
								</div>
								<div class="col-7">
									<div class="form-group">
										<label for="cidade" class="col-form-label text-md-right">Cidade:</label>
										<input type="text" id="cidade"  name="cidade" class="form-control" required>								
									</div>
								</div>
								<div class="col-1">
									<div class="form-group">
										<label for="uf" class="col-form-label text-md-right">UF:</label>
										<input type="text" id="uf" name="uf" class="form-control"  required>								
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<label for="complemento" class="col-form-label text-md-right">Complemento:</label>
										<input type="text" id="complemento" name="complemento" class="form-control">								
									</div>
								</div>
							</div>
							<hr>		
							<div class="row">
								<div class="col-12">
									<label for="texto_demanda" class="col-form-label text-md-right">Demanda:</label>
									<textarea name="texto_demanda" id="texto_demanda" class="form-control" rows=15></textarea>
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

<script type="text/javascript">
	window.onload = function() {
		$('#cpf').mask('000.000.000-00');
		$('#telefone').mask('(00) 0000-00009');
	};
</script>