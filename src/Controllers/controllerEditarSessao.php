<?php

$idS = isset($_GET['idS']) ? $_GET['idS'] : null;
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idS || !$idC) {
    echo "Erro: parÃ¢metros invÃ¡lidos.";
    exit;
}

include __DIR__ . "/../../resources/Templates/header.php";

$campanhaIndex = null;
foreach ($usuario['campanhas'] as $i => $camp) {
    if ($camp['idCampanha'] == $idC) {
        $campanhaIndex = $i;
        break;
    }
}

if ($campanhaIndex === null) {
    echo "Campanha nÃ£o encontrada.";
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
    echo "SessÃ£o nÃ£o encontrada.";
    exit;
}

// Dados pra view
$campanhaSelecionada = $usuario['campanhas'][$campanhaIndex];
$sessaoSelecionada = $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex];

include __DIR__ . "/../Validators/validationEditarSessao.php";
include __DIR__ . "/../../resources/Views/viewEditarSessao.php";
include __DIR__ . "/../../resources/Templates/footer.php";

