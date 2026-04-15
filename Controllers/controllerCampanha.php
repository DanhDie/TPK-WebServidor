<?php

// Receber via GET
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idC) {
    echo "Erro: campanha não informada.";
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

//Pra hora de ver uns bug
if (!$campanhaSelecionada) {
    echo "Campanha não encontrada.";
    exit;
}

include("../Views/viewCampanha.php");

include("../Views/Templates/footer.php");