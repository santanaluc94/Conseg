<div class="container">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	<h1>Secretarias</h1>	
	<table class="table table-bordered table-striped table-sm tabela">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Responsável</th>
				<th>Telefone / Email</th>
				<th>Editar / Inativar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($secretarias as $secretaria): ?>
				<tr>
					<td><?=$secretaria->SECNOME?></td>
					<td><?=$secretaria->SECRESPONSAVEL?></td>
					<td>
						Tel: <span class="telefone"><?=$secretaria->SECRESPONSAVELTELEFONE?></span><br>
						Email: <?=$secretaria->SECRESPONSAVELEMAIL?>					
					</td>
					<td>
						<a href="<?=base_url("secretarias/inativar/").$secretaria->SECIDSECRETARIA?>" class="mx-2"><button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Inativar</button></a>
						<a href="<?=base_url("secretarias/editar/").$secretaria->SECIDSECRETARIA?>" class="mx-2"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</button></a>					
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
