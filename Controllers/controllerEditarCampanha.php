<?php
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idC) {
    echo "Erro: campanha não informada.";
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

include("./validationEditarCampanha.php");
include("../Views/viewEditarCampanha.php");
include("../Views/Templates/footer.php");