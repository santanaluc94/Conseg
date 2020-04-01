<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Inserir Demanda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card-body">
				<form action="<?= base_url('demandas/demandaPost/').$demanda->DEMIDDEMANDA ?>" method="post">
					<input type="hidden" value="<?=$cidadao->CIDIDCIDADAO?>" name="cidadao">
					<div class="row">
						<div class="col-3">
							<div class="form-group">
								<label for="data" class="col-form-label text-md-right">Data:</label>
								<input type="date" id="data" name="data" value="<?=$demanda->DEMDATA?>" class="form-control" required>								
							</div>
						</div>
						<div class="col-2">
							<div class="form-group">
								<label for="horario" class="col-form-label text-md-right">Horário:</label>
								<input type="time" id="horario" name="horario" value="<?=$demanda->DEMHORA?>" class="form-control time" data-validation="time" data-validation-help="HH:mm" required>								
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="nome" class="col-form-label text-md-right">Secretaria:</label>								
								<select class="form-control" name="secretaria" id="secretaria">
									<option>Selecione a secretaria responsável</option>
									<?php foreach($secretarias as $secretaria): ?>
										<option value="<?=$secretaria->SECIDSECRETARIA?>" <?php if($secretaria->SECIDSECRETARIA == $demanda->SECIDSECRETARIA) { echo "selected"; }?>><?=$secretaria->SECNOME?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="col-3 mt-5">
							<div class="form-check d-flex justify-content-baseline">
								<input type="checkbox" id="privacidade" name="privacidade" class="form-check-input">
								<label class="form-check-label" for="privacidade" <?php if($demanda->DEMIDPRIVACIDADE == 1) { echo "checked"; }?>>Necessita Privacidade</label>
							</div>									
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-2">
							<div class="form-group">
								<label for="cep" class="col-form-label text-md-right">CEP:</label>
								<input type="text" id="cep" name="cep" value="<?=$demanda->DEMCEP?>" class="form-control cep" data-validation="cep" required>								
							</div>
						</div>
						<div class="col-10">
							<div class="form-group">
								<label for="endereco" class="col-form-label text-md-right">Endereço:</label>
								<input type="text" id="endereco" name="endereco" value="<?=$demanda->DEMENDERECO?>" class="form-control" required>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<div class="form-group">
								<label for="bairro" class="col-form-label text-md-right">Bairro:</label>
								<input type="text" id="bairro" name="bairro" value="<?=$demanda->DEMBAIRRO?>" class="form-control"  required>								
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cidade" class="col-form-label text-md-right">Cidade:</label>
								<input type="text" id="cidade"  name="cidade" value="<?=$demanda->DEMCIDADE?>" class="form-control" required>								
							</div>
						</div>
						<div class="col-2">
							<div class="form-group">
								<label for="uf" class="col-form-label text-md-right">UF:</label>
								<input type="text" id="uf" name="uf" value="<?=$demanda->DEMUF?>" class="form-control"  required>								
							</div>
						</div>								
					</div>
					<div class="row">
						<div class="col-8">
							<div class="form-group">
								<label for="complemento" class="col-form-label text-md-right">Complemento:</label>
								<input type="text" id="complemento" name="complemento" value="<?=$demanda->DEMCOMPLEMENTO?>" class="form-control">								
							</div>
						</div>
					</div>
					<hr>		
					<div class="row">
						<div class="col-12">
							<label for="texto_demanda" class="col-form-label text-md-right">Demanda:</label>
							<textarea name="texto_demanda" id="texto_demanda" class="form-control" rows=15><?=($demanda->DEMTEXTO)?></textarea>
						</div>
					</div>	
					<hr>								
					<div class="row">
						<div class="col-5">
							<input type="hidden" name="acao" value="inserir">
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
