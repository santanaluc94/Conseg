<div class="container">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	<h1>Demandas</h1>
	<table class="table table-bordered table-striped table-sm tabela">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Cidadão</th>
				<th>Data/Hora</th>
				<th>Ocorrência</th>
				<th>Secretaria</th>
				<th>Editar/Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($demandas as $demanda): ?>
			<tr>
				<td><?=$demanda->DEMIDCODIGO?></td>
				<td style="min-width:300px;"><small><?=$demanda->CIDADAO?></small></td>
				<td style="min-width:180px;"><small><?=mySQLtoDateBR($demanda->DEMDATA)?> - <span class="time"><?=$demanda->DEMHORA?></span></small></td>
				<td><small><?php echo nl2br(substr($demanda->DEMTEXTO, 0, 150))?>(...)</small></td>
				<td><?=$demanda->SECRETARIA?></td>
				<td>
					<a href="<?=base_url("demandas/inativar/").$demanda->DEMIDDEMANDA?>" class="mx-2"><button class="btn btn-danger btn-sm btn-block"><i class="fa fa-ban"></i> Inativar</button></a>
					<a href="<?=base_url("demandas/editar/").$demanda->DEMIDDEMANDA?>" class="mx-2"><button class="btn btn-primary btn-sm btn-block"><i class="fa fa-edit"></i> Editar</button></a>					
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>	
</div>
