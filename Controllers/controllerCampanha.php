<?php
include("../Views/Templates/header.php");

if (isset($_POST['addPersonagem'])) {

    $idC = $_POST['idC'];
    $idP = $_POST['idP'];

    foreach ($usuario['campanhas'] as $i => $camp) {
        if ($camp['idCampanha'] == $idC) {
            foreach ($usuario['personagens'] as $pers) {
                if ($pers['idPersonagem'] == $idP) {
                    // nao duplicar o personagem
                    $existe = false;
                    foreach ($usuario['campanhas'][$i]['personagensCampanha'] as $pCamp) {
                        if ($pCamp['idPersonagem'] == $idP) {
                            $existe = true;
                            break;
                        }
                    }
                    if (!$existe) {
                        $usuario['campanhas'][$i]['personagensCampanha'][] = $pers;
                    }
                    break;
                }
            }
            break;
        }
    }

    $_SESSION['infoUser'] = $usuario;

    header("Location: controllerCampanha.php?idC=$idC");
    exit;
}


$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!$idC) {
    echo "Erro: campanha não informada.";
    exit;
}

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

include("../Views/viewCampanha.php");

include("../Views/Templates/footer.php");