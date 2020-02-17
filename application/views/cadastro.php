<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-dark" style="color: white">Cadastro de Usuário</div>
					<div class="card-body">
						<form action="<?= base_url('cadastro/cadastroPost') ?>" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome" class="col-form-label text-md-right">Nome:</label>
										<div class="">
											<input type="text" id="nome" class="form-control" name="nome" required>
										</div>
									</div>
								</div>	
							</div>	
							<div class="row">
								<div class="col-md-3">					
									<div class="form-group">
										<label for="cpf" class="col-form-label text-md-right">C.P.F.:</label>
										<input type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00" data-validation="cpf" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email" class="col-form-label text-md-right">E-Mail:</label>									
										<input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" data-validation="email" required>
									</div>
								</div>
								<div class="col-md-3">					
									<div class="form-group">
										<label for="telefone" class="col-form-label text-md-right">Telefone/Celular:</label>
										<input type="text" id="telefone" class="form-control" name="telefone" placeholder="(##) #####-####" data-validation="brphone" required>
									</div>
								</div>
							</div>		
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="senha" class="col-form-label text-md-right">Senha (mínimo 6 caracteres):</label>									
										<input type="password" id="senha" class="form-control password" name="senha"  data-validation="strength" data-validation-strength="2" data-validation-length="min6" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="confirmar-senha" class="col-form-label text-md-right">Confirme a Senha:</label>									
										<input type="password" id="confirmar-senha" class="form-control password" name="confirmar-senha" data-validation="confirmation" required>
									</div>
								</div>								
							</div>		
							<hr>					
							<div class="row">							
								<div class="col-md-6">
									<button type="submit" class="btn btn-dark" href='?page=submit'>
										Cadastre-se
									</button>
								</div>
							</div>
							<?php if (isset($tipoDeErro['query'])) : ?>
								<?php
								$nomeErro = explode('=', $tipoDeErro['query']);
								$erros = explode('&', $nomeErro[1]);
								?>
								<?php if ($nomeErro[0] == "fieldExist") : ?>
									<?php foreach ($erros as $erro) : ?>
										<div class="alert alert-danger" style="margin-top: 15px;">
											<span><strong><?= ucfirst($erro) ?></strong> is already registered!</span>
										</div>
									<?php endforeach; ?>

								<?php elseif ($tipoDeErro['query'] == "UserExist") : ?>
									<div class="alert alert-danger" style="margin-top: 15px;">
										<span><strong>User</strong> already exist!</span>
									</div>

								<?php else : ?>
									<?php foreach ($erros as $erro) : ?>
										<div class="alert alert-danger" style="margin-top: 15px;">
											<span><strong><?= ucfirst($erro) ?></strong> não é válido(a)!</span>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

