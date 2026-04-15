<?php

$idS = isset($_GET['idS']) ? $_GET['idS'] : null;
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idS || !$idC) {
    echo "Erro: parâmetros inválidos.";
    exit;
}

include("../Views/Templates/header.php");

// 🔍 Buscar campanha
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

// 🔍 Buscar sessão
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

//////////////////////////////////////
// 🔥 AÇÕES
//////////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✏️ ATUALIZAR
    if (isset($_POST['finalizar'])) {

        $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['nomeSessao'] = $_POST['nomeSessao'];
        $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['dataSessao'] = $_POST['dataSessao'];
        $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['resumoSessao'] = $_POST['resumoSessao'];

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerSessao.php?idC=$idC&idS=$idS");
        exit;
    }

    // ❌ EXCLUIR
    if (isset($_POST['excluir'])) {

        unset($usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]);

        // reorganiza índices
        $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'] =
            array_values($usuario['campanhas'][$campanhaIndex]['sessoesCampanha']);

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerCampanha.php?idC=$idC");
        exit;
    }
}

// Dados pra view
$campanhaSelecionada = $usuario['campanhas'][$campanhaIndex];
$sessaoSelecionada = $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex];

include("../Views/viewEditarSessao.php");
include("../Views/Templates/footer.php");