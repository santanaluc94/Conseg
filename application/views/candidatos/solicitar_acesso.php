
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Signin Template for Bootstrap</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post" action="<?=base_url("login/solicitar_acesso")?>">
            <h1 class="h3 mb-3 font-weight-normal">CONSEG - Sistema de Demandas  Guarulhos-SP</h1>
            <h2>Solicitar Acesso</h2>
            <label for="inputName" class="sr-only">Nome Completo</label>
            <input type="text" id="inputName" name="nome" class="form-control form-control-sm mb-2" placeholder="Nome Completo" required autofocus>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control form-control-sm mb-2" placeholder="E-mail" data-validation="email" required>
            <label for="inputEmail" class="sr-only">CPF</label>
            <input type="text" id="inputCPF" name="cpf" class="form-control form-control-sm mb-2 cpf" placeholder="CPF" data-validation="cpf" required>
            <label for="inputPhone" class="sr-only">Telefone</label>
            <input type="text" id="inputPhone" name="telefone" class="form-control form-control-sm mb-2 telefone" placeholder="Telefone" data-validation="brphone" required>            
            <select class="form-control mb-2" name="conseg" placeholder="Selecione o Conseg">
                <option value="">Selecione o CONSEG</option>
                <?php foreach($consegs as $conseg): ?>
                    <option value="<?=$conseg->CONIDCONSEG?>"><?=$conseg->CONNOME?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-lg btn-primary btn-block mb-2" type="submit"><i class="fa fa-arrow-right"></i> Solicitar Acesso</button>
            <input type="hidden" name="acao" value="inserir">
        </form>
  