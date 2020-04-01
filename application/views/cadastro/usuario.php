<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container conteudo">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-dark" style="color: white">Cadastro de Usuário</div>
					<div class="card-body">
						<form action="<?= base_url('Usuarios/usuarioPost/').$usuario->USUIDUSUARIO ?>" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="conseg" class="col-form-label text-md-right">CONSEG:</label>								
										<select class="form-control" name="id_conseg" id="conseg">
											<option>Selecione o CONSEG do usuário</option>
											<?php foreach($consegs as $conseg):?>
												<option value="<?=$conseg->CONIDCONSEG?>" <?php if($usuario->CONIDCONSEG == $conseg->CONIDCONSEG) { echo "selected"; }?>><?=$conseg->CONNOME?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome" class="col-form-label text-md-right">Nome:</label>
										<div class="">
											<input type="text" id="nome" class="form-control" name="nome" required value="<?= $usuario->USUNOME ?>">
										</div>
									</div>
								</div>	
							</div>	
							<div class="row">
								<div class="col-md-3">					
									<div class="form-group">
										<label for="cpf" class="col-form-label text-md-right">C.P.F.:</label>
										<input type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00" data-validation="cpf" required value="<?= $usuario->USUCPF ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email" class="col-form-label text-md-right">E-Mail:</label>									
										<input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" data-validation="email" required value="<?= $usuario->USUEMAIL ?>">
									</div>
								</div>
								<div class="col-md-3">					
									<div class="form-group">
										<label for="telefone" class="col-form-label text-md-right">Telefone/Celular:</label>
										<input type="text" id="telefone" class="form-control" name="telefone" placeholder="(##) #####-####" data-validation="brphone" required value="<?= $usuario->USUTELEFONE ?>">
									</div>
								</div>
							</div>		
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">													
										<input type="checkbox" name="relatorios" class="align-center" <?php if($usuario->USURELATORIOS == true) {?> checked <?php }?>>	
										<label for="senha" class="col-form-label text-md-right">Acessar Relatórios</label>														
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="checkbox" name="administrador" <?php if($usuario->USUADMINISTRADOR == true) {?> checked <?php }?>>
										<label for="senha" class="col-form-label text-md-right">Acesso Administrador</label>										
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

