<?php

require_once __DIR__ . '/../bootstrap.php';

// Se já estiver logado
if(!empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/telaInicial');
    exit();
}

include("validationLogin.php");

include("../Views/viewLogin.php");

include("../Views/Templates/footer.php");