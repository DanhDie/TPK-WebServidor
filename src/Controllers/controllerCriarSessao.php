<?php

require_once __DIR__ . "/../../bootstrap.php";

if (empty($_SESSION['logado'])) {
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];

$idC = $_GET['idC'] ?? null;

if (!$idC) {
    die("Campanha não informada.");
}

try {

    $bd = Conexao::get();

    $queryCampanha = $bd->prepare("
        SELECT *
        FROM campanha
        WHERE id = :id
        AND usuario_id = :usuario_id
    ");

    $queryCampanha->bindValue(':id', $idC);
    $queryCampanha->bindValue(':usuario_id', $usuario['id']);

    $queryCampanha->execute();

    $campanhaSelecionada = $queryCampanha->fetch(PDO::FETCH_ASSOC);

    if (!$campanhaSelecionada) {
        die("Campanha não encontrada.");
    }

} catch (PDOException $e) {

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../Validators/validationCriarSessao.php";

include __DIR__ . "/../../resources/Views/viewCriarSessao.php";

include __DIR__ . "/../../resources/Templates/footer.php";