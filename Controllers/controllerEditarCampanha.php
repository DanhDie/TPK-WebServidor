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

$campanhaSelecionada = $usuario['campanhas'][$campanhaIndex];

$campanhaNome = $campanhaSelecionada['nomeCampanha'];
$campanhaDesc = $campanhaSelecionada['descCampanha'];
$campanhaSistema = $campanhaSelecionada['sistemaCampanha'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['submit']) && $_POST['submit'] === "Finalizar") {

        $usuario['campanhas'][$campanhaIndex]['nomeCampanha'] = $_POST['nome'];
        $usuario['campanhas'][$campanhaIndex]['descCampanha'] = $_POST['desc'];
        $usuario['campanhas'][$campanhaIndex]['sistemaCampanha'] = $_POST['sistema'];

        
        if (!empty($_FILES['arquivo']['name'])) {
            $usuario['campanhas'][$campanhaIndex]['imagemCampanha'] = $_FILES['arquivo']['name'];
        }

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerCampanha.php?idC=$idC");
        exit;
    }

    if (isset($_POST['submit']) && $_POST['submit'] === "Excluir") {

        unset($usuario['campanhas'][$campanhaIndex]);

        $usuario['campanhas'] = array_values($usuario['campanhas']);

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerTelaInicial.php");
        exit;
    }
}
include("./validationCriarCampanha.php");
include("../Views/viewEditarCampanha.php");
include("../Views/Templates/footer.php");