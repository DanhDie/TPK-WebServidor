<?php

$idS = isset($_GET['idS']) ? $_GET['idS'] : null;
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idS || !$idC) {
    echo "Erro: parâmetros inválidos.";
    exit;
}

include("../Views/Templates/header.php");

$campanhaSelecionada = null;
foreach ($usuario['campanhas'] as $camp) {
    if ($camp['idCampanha'] == $idC) {
        $campanhaSelecionada = $camp;
        break;
    }
}

if (!$campanhaSelecionada) {
    echo "Campanha não encontrada.";
    exit;
}

$sessaoSelecionada = null;
foreach ($campanhaSelecionada['sessoesCampanha'] as $sess) {
    if ($sess['idSessao'] == $idS) {
        $sessaoSelecionada = $sess;
        break;
    }
}

if (!$sessaoSelecionada) {
    echo "Sessão não encontrada.";
    exit;
}

include("../Views/viewSessao.php");

include("../Views/Templates/footer.php");