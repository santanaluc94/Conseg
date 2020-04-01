<style>
	label{
		font-weight:bold;
	}
</style>
<main class="content">
	<div class="container conteudo">
		<div class="row justify-content-center">
			<div class="col-md-12">				
				<div class="card mb-5">
					<div class="card-body">
						<div>
							<label for="cidadao" class="col-form-label text-md-right">Cidadão:</label><span> <?=$cidadao->CIDNOME?></span>
						</div>
						<div>
							<label for="data" class="col-form-label text-md-right">Data:</label> <span class="date"><?=mySQLtoDateBR($demanda->DEMDATA)?> </span>
							<label for="horario" class="col-form-label text-md-right ml-5">Horário:</label>  <span class="time"><?=$demanda->DEMHORA?></span>								
						</div>
						<div>
							<label for="nome" class="col-form-label text-md-right">Secretaria:</label><span> <?=$secretaria->SECNOME?></span>	
						</div>									
						<div>								
							<label for="endereco" class="col-form-label text-md-right ">Endereço:</label> <?=$demanda->DEMENDERECO?> - <?=$demanda->DEMBAIRRO?> , <?=$demanda->DEMCIDADE?> - 	<?=$demanda->DEMUF?> 
							<label for="cep" class="col-form-label text-md-right ml-5">CEP:</label> <span class="cep"><?=$demanda->DEMCEP?></span><br>								
							<label for="complemento" class="col-form-label text-md-right">Complemento:</label>  <?=$demanda->DEMCOMPLEMENTO?>
						</div>
						<hr>
						<div>
							<h5 class="text-center my-5">Descrição da Demanda</h5>
							<textarea class="form-control" rows=15 readonly><?=($demanda->DEMTEXTO)?></textarea>	
						</div>
						<hr>
						<div>
							<h5 class="text-center my-5">Comentários</h5>							
							<?php foreach($comentarios as $comentario):?>
								<div>
									<strong><p><?=$comentario->USUIDCODIGO ?> no dia <?=mySQLtoDateBR($comentario->COMDATA) ?> às <span class="time"><?= $comentario->COMHORA ?></span> escreveu:</p></strong>
									<p><?=$comentario->COMTEXTO ?></p>
								</div>
							<?php endforeach;?>	
						</div>		
					</div>
				</div>
				<form action="<?=base_url('Demandas/inserir_comentario/').$demanda->DEMIDDEMANDA?>" method="post">
					<div class="card">
						<div class="card-header bg-light text-secondary">Inserir Comentário</div>
						<div class="card-body">
							<textarea class="form-control" name="texto_comentario" rows=5 required="required"></textarea>
							<button type="submit" class="btn btn-dark mt-3">
								Comentar										
							</button>	
						</div>									
					</div>	
				</form>			
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