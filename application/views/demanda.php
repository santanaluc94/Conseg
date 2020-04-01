<div class="container conteudo-fluid conteudo">
	<div class="row">
        <nav class="col-md-2 d-none d-md-block bg-secondary sidebar">
          	<div class="sidebar-sticky pt-2">	
			  	<?php foreach($status as $st): ?>	
					<?php if ($status_lista->STAIDCODIGO == $st->STAIDCODIGO) : ?>
						<a class="btn btn-primary btn-block text-white" href="<?=base_url("Demandas/lista/".$st->STAIDCODIGO)?>">
					<?php else : ?>
						<a class="btn btn-outline-primary btn-block text-white" href="<?=base_url("Demandas/lista/".$st->STAIDCODIGO)?>">
					<?php endif; ?>
						<span data-feather="home"></span>
						<?= $st->STANOME?> <span class="sr-only">(current)</span>
					</a>	
				<?php endforeach; ?>						
          	</div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          	<div class="d-flex justify-content-between flex-column flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<?php if($this->session->flashdata('mensagem')){?>
					<div class="alert alert-success mt-2" role="alert">
						<?=$this->session->flashdata('mensagem') ?>
					</div>
				<?php } ?>
				<h1>Demandas <?=" - ".$status_lista->STANOME?></h1>
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
								<a href="<?=base_url("demandas/inativar/").$demanda->DEMIDDEMANDA."/".$status_lista->STAIDCODIGO?>" class="mx-2 btn btn-danger btn-sm btn-block"><i class="fa fa-ban"></i> Inativar</button></a>
								<a href="<?=base_url("demandas/editar/").$demanda->DEMIDDEMANDA?>" class="mx-2 btn btn-primary btn-sm btn-block"><i class="fa fa-edit"></i> Editar</button></a>					
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>	
			</div>
        </main>
    </div>
</div>
