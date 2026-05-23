<?php
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idC) {
    echo "Erro: campanha nÃ£o informada.";
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

$campanhaSelecionada = $usuario['campanhas'][$campanhaIndex];

include __DIR__ . "/../Validators/validationEditarCampanha.php";
include __DIR__ . "/../../resources/Views/viewEditarCampanha.php";
include __DIR__ . "/../../resources/Templates/footer.php";

