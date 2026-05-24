<?php

require_once __DIR__ . "/../../bootstrap.php";

// Se já estiver logado
if(!empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/telaInicial');
    exit();
}

include __DIR__ . "/../Validators/validationCadastro.php";

include __DIR__ . "/../../resources/Views/viewCadastro.php";

include __DIR__ . "/../../resources/Templates/footer.php";