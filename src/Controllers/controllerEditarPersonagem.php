<?php

require_once __DIR__ . "/../../bootstrap.php";

if(empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$idP = isset($_GET['idP']) ? $_GET['idP'] : null;

if (!$idP) {
    echo "Erro: personagem não informado.";
    exit;
}

try {

    $bd = Conexao::get();

    $query = $bd->prepare("
        SELECT *
        FROM personagem
        WHERE id = :id
        AND usuario_id = :usuario_id
    ");

    $query->bindValue(':id', $idP);
    $query->bindValue(':usuario_id', $_SESSION['infoUser']['id']);

    $query->execute();

    $personagemSelecionado = $query->fetch(PDO::FETCH_ASSOC);

    if (!$personagemSelecionado) {
        echo "Personagem não encontrado.";
        exit;
    }

} catch(PDOException $e) {

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../Validators/validationEditarPersonagem.php";
include __DIR__ . "/../../resources/Views/viewEditarPersonagem.php";

include __DIR__ . "/../../resources/Templates/footer.php";