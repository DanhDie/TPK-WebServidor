<?php

require_once __DIR__ . "/../../bootstrap.php";

// Se já estiver logado
if(!empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/telaInicial');
    exit();
}

include __DIR__ . "/../Validators/validationLogin.php";

include __DIR__ . "/../../resources/Views/viewLogin.php";

include __DIR__ . "/../../resources/Templates/footer.php";
