<?php

require_once __DIR__ . "/../../bootstrap.php";
require_once __DIR__ . "/../../resources/Services/dndAPIService.php";

if(empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$classesdnd = requisicao();

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../Validators/validationCriarPersonagem.php";
include __DIR__ . "/../../resources/Views/viewCriarPersonagem.php";

include __DIR__ . "/../../resources/Templates/footer.php";