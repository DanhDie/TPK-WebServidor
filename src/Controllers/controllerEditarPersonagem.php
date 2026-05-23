<?php

include __DIR__ . "/../../resources/Templates/header.php";


$idP = isset($_GET['idP']) ? $_GET['idP'] : null;

if (!$idP) {
    echo "Erro: personagem nÃ£o informado.";
    exit;
}

$personagemIndex = null;

foreach ($usuario['personagens'] as $i => $pers) {
    if ($pers['idPersonagem'] == $idP) {
        $personagemIndex = $i;
        break;
    }
}

if ($personagemIndex === null) {
    echo "Personagem nÃ£o encontrado.";
    exit;
}

$personagemSelecionado = $usuario['personagens'][$personagemIndex];


include __DIR__ . "/../Validators/validationEditarPersonagem.php";
include __DIR__ . "/../../resources/Views/viewEditarPersonagem.php";
include __DIR__ . "/../../resources/Templates/footer.php";

