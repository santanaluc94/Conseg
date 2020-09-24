<div class="container conteudo">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success mt-2" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	<?php if($this->session->flashdata('mensagem_erro')){?>
		<div class="alert alert-success mt-2" role="alert">
			<?=$this->session->flashdata('mensagem_erro') ?>
   		</div>
	<?php } ?>
	<h1>Candidatos</h1>
	<table class="table bg-white table-bordered table-sm">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>CONSEG</th>		
				<th>Acessar Relatórios</th>	
				<th>Direito Administrador</th>	
				<th>Cadastrar</th>	
				<th>Excluir</th>			
			</tr>
		</thead>
		<tbody>
			<?php foreach($candidatos as $candidato): ?>
			<tr>
				<form method="post" action="<?=base_url("Usuarios/usuarioPost")?>">
					<td><?=$candidato->nome?></td>
					<td><?=$candidato->email?></td>	
					<td><?=$candidato->connome?></td>	
					<td><input type="checkbox" name="relatorio" class="align-center"></td>
					<td><input type="checkbox" name="administrador"></td>	
					<input type="hidden" name="id_conseg" value="<?=$candidato->conseg?>">	
					<input type="hidden" name="id" value="<?=$candidato->id?>">		
					<input type="hidden" name="acao" value="inserir">
					<td><button type="submit" class="btn btn-sm btn-primary" value="">Cadastrar</button></td>
				</form>		
				<form method="post" action="<?=base_url("Usuarios/excluirCandidato")?>">
					<input type="hidden" name="id" value="<?=$candidato->id?>">		
					<td><button type="submit" class="btn btn-sm btn-danger">Excluir</button></td>
				</form>		
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>	
	<h1>Usuários</h1>
	<table class="table bg-white table-bordered table-sm">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Status</th>
				<th>Ver Relatórios</th>
				<th>Administrador</th>
				<th>Editar/Inativar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario) : ?>
			<tr>
				<td><?=$usuario->USUNOME?></td>
				<td><?=$usuario->USUEMAIL?></td>
				<td><?=$usuario->USUSTATUS?></td>
				<td><?=$usuario->USURELATORIOS?></td>
				<td><?=$usuario->USUADMINISTRADOR?></td>				
				<td>
					<a href="<?=base_url("Usuarios/editar/".$usuario->USUIDUSUARIO)?>"><button type="submit" class="btn btn-sm btn-primary" >Editar</button></a>
					<?php if($usuario->USUSTATUS == "Ativo"): ?>
						<a href="<?=base_url("Usuarios/inativar/".$usuario->USUIDUSUARIO)?>"><button type="submit" class="btn btn-sm btn-danger">Inativar</button></a>
					<?php else: ?>					
						<a href="<?=base_url("Usuarios/ativar/".$usuario->USUIDUSUARIO)?>"><button type="submit" class="btn btn-sm btn-success">Ativar</button></a>
					<?php endif; ?>
					
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>	
</div>
