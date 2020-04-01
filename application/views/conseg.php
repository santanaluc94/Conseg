<div class="container conteudo">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success mt-2" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	<h1>CONSEGs</h1>
	<table class="table table-bordered table-striped table-sm tabela" style="font-size:14px;">
		<thead>
			<tr>
				<th>Título</th>
				<th>Presidente</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Editar/Inativar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($consegs as $conseg): ?>
			<tr>
				<td><?=$conseg->CONNOME?></td>
				<td><?=$conseg->CONPRESIDENTE?></td>
				<td class="telefone"><?=$conseg->CONPRESIDENTETELEFONE?></td>
				<td><?=$conseg->CONPRESIDENTEEMAIL?></td>
				<td style="min-width:150px;">
					<a href="<?=base_url("consegs/inativar/").$conseg->CONIDCONSEG?>" class="mx-2"><button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i><small> Inativar</small></button></a>
					<a href="<?=base_url("consegs/editar/").$conseg->CONIDCONSEG?>" class="mx-2"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i><small> Editar </small></button></a>					
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>	
</div>
