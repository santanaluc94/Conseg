
<div class="container">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	
	<h1>Cidadãos</h1>
	<table class="table bg-white table-bordered table-sm tabela" style="font-size:14px;">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Celular</th>
				<th>CONSEG</th>
				<th>Status</th>
				<th>Editar/Inativar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($cidadaos as $cidadao): ?>
				<tr>
					<td><?=$cidadao->CIDNOME?></td>
					<td><?=$cidadao->CIDEMAIL?></td>
					<td class="telefone"><?=$cidadao->CIDCELULAR?></td>
					<td><?=$cidadao->CONSEG?></td>
					<td><?=$cidadao->STATUS?></td>
					<td style="min-width:150px;">
						<a href="<?=base_url("cidadaos/inativar/").$cidadao->CIDIDCIDADAO?>" class="mx-2"><button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> <small>Inativar</small> </button></a>
						<a href="<?=base_url("cidadaos/editar/").$cidadao->CIDIDCIDADAO?>" class="mx-2"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <small>Editar</small> </button></a>					
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>		
</div>