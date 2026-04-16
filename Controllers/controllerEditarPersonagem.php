<?php

include("../Views/Templates/header.php");


$idP = isset($_GET['idP']) ? $_GET['idP'] : null;

if (!$idP) {
    echo "Erro: personagem não informado.";
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
    echo "Personagem não encontrado.";
    exit;
}

$personagemSelecionado = $usuario['personagens'][$personagemIndex];


include("./validationEditarPersonagem.php");
include("../Views/viewEditarPersonagem.php");
include("../Views/Templates/footer.php");