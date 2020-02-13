<?php
$tipoDeErro = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Cadastro de Usuário</div>
					<div class="card-body">
						<form action="<?= base_url('cadastro/cadastroPost') ?>" method="post">
							<div class="form-group row">
								<label for="nome" class="col-md-4 col-form-label text-md-right">Nome:</label>
								<div class="col-md-6">
									<input type="text" id="nome" class="form-control" name="nome" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="sobrenome" class="col-md-4 col-form-label text-md-right">Sobrenome:</label>
								<div class="col-md-6">
									<input type="text" id="sobrenome" class="form-control" name="sobrenome" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F.:</label>
								<div class="col-md-6">
									<input type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>
								<div class="col-md-6">
									<input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
								<div class="col-md-6">
									<input type="text" id="telefone" class="form-control" name="telefone" placeholder="(00) 0000-0000" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="senha" class="col-md-4 col-form-label text-md-right">Senha</label>
								<div class="col-md-6">
									<input type="password" id="senha" class="form-control password" name="senha" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="confirmar-senha" class="col-md-4 col-form-label text-md-right">Confirmação de Senha</label>
								<div class="col-md-6">
									<input type="password" id="confirmar-senha" class="form-control password" name="confirmar-senha" required>
								</div>
							</div>
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary" href='?page=submit'>
									Cadastre-se
								</button>
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

<script type="text/javascript">
	window.onload = function() {
		$('#cpf').mask('000.000.000-00');
		$('#telefone').mask('(00) 0000-00009');
	};
</script>