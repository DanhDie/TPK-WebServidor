<?php

$idS = isset($_GET['idS']) ? $_GET['idS'] : null;
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idS || !$idC) {
    echo "Erro: parâmetros inválidos.";
    exit;
}

include("../Views/Templates/header.php");

$campanhaIndex = null;
foreach ($usuario['campanhas'] as $i => $camp) {
    if ($camp['idCampanha'] == $idC) {
        $campanhaIndex = $i;
        break;
    }
}

if ($campanhaIndex === null) {
    echo "Campanha não encontrada.";
    exit;
}

$sessaoIndex = null;
foreach ($usuario['campanhas'][$campanhaIndex]['sessoesCampanha'] as $j => $sess) {
    if ($sess['idSessao'] == $idS) {
        $sessaoIndex = $j;
        break;
    }
}

if ($sessaoIndex === null) {
    echo "Sessão não encontrada.";
    exit;
}

// Dados pra view
$campanhaSelecionada = $usuario['campanhas'][$campanhaIndex];
$sessaoSelecionada = $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex];

include("./validationEditarSessao.php");
include("../Views/viewEditarSessao.php");
include("../Views/Templates/footer.php");