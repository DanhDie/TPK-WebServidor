<?php

include("../Views/Templates/header.php");


$idP = isset($_GET['idP']) ? $_GET['idP'] : null;

if (!$idP) {
    echo "Erro: personagem não informado.";
    exit;
}

$personagemIndex = null;

foreach ($usuario['personagens'] as $i => $pers) {
    if ($pers['idPersonagem'] == $idP) {
        $personagemIndex = $i;
        break;
    }
}

if ($personagemIndex === null) {
    echo "Personagem não encontrado.";
    exit;
}

$personagemSelecionado = $usuario['personagens'][$personagemIndex];


include("./validationCriarPersonagem.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit']) && $_POST['submit'] === "Atualizar") {

        $usuario['personagens'][$personagemIndex] = [
            ...$usuario['personagens'][$personagemIndex],

            'nome' => $_POST['nome'],
            'level' => $_POST['level'],
            'classe' => $_POST['classe'],
            'subclasse' => $_POST['subclasse'],
            'forca' => $_POST['forca'],
            'destreza' => $_POST['destreza'],
            'constituicao' => $_POST['constituicao'],
            'inteligencia' => $_POST['inteligencia'],
            'sabedoria' => $_POST['sabedoria'],
            'carisma' => $_POST['carisma'],
            'vida' => $_POST['vida'],
            'armadura' => $_POST['armadura'],
            'velocidade' => $_POST['velocidade'],
            'historia' => $_POST['historia']
        ];

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerFichaPersonagem.php?idP=$idP");
        exit;
    }

    if (isset($_POST['excluir'])) {

        unset($usuario['personagens'][$personagemIndex]);
        $usuario['personagens'] = array_values($usuario['personagens']);

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerPersonagens.php");
        exit;
    }
}

include("../Views/viewEditarPersonagem.php");
include("../Views/Templates/footer.php");