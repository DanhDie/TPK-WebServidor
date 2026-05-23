<?php

$idS = isset($_GET['idS']) ? $_GET['idS'] : null;
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idS || !$idC) {
    echo "Erro: parÃ¢metros invÃ¡lidos.";
    exit;
}

include __DIR__ . "/../../resources/Templates/header.php";

$campanhaSelecionada = null;
foreach ($usuario['campanhas'] as $camp) {
    if ($camp['idCampanha'] == $idC) {
        $campanhaSelecionada = $camp;
        break;
    }
}

if (!$campanhaSelecionada) {
    echo "Campanha nÃ£o encontrada.";
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
    echo "SessÃ£o nÃ£o encontrada.";
    exit;
}

include __DIR__ . "/../../resources/Views/viewSessao.php";

include __DIR__ . "/../../resources/Templates/footer.php";

