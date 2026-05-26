<?php

Autenticacao::verificarSessao();

if(empty($_SESSION['logado'])){

    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];
?>
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <script src="https://kit.fontawesome.com/d47d9eff15.js" crossorigin="anonymous"></script>
    <title>TPK - RPG manager</title>
</head>
<body   >
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a href="#" class="navbar-item">
                <h1 class="is-size-4 is-italic has-text-weight-bold">TPK</h1>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="px-2 navbar-end is-size-7">
                <a href="<?= BASE_URL ?>/telaInicial" class="navbar-item has-text-weight-light">
                    Campanhas
                </a>

                <a href="<?= BASE_URL ?>/personagens" class="navbar-item has-text-weight-light">
                    Personagens
                </a>

                <a href="<?= BASE_URL ?>/perfil" class="navbar-item has-text-weight-light">
                    Meu perfil
                </a>
            </div>
        </div>
    </nav>
    <main>