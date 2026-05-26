<?php

require_once __DIR__ . "/../../bootstrap.php";

if (empty($_SESSION['logado'])) {
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];

$idP = $_GET['idP'] ?? null;

if (!$idP) {
    die("Personagem não informado.");
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
    $query->bindValue(':usuario_id', $usuario['id']);

    $query->execute();

    $personagemSelecionado = $query->fetch(PDO::FETCH_ASSOC);

    if (!$personagemSelecionado) {
        die("Personagem não encontrado.");
    }

} catch (PDOException $e) {

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../../resources/Views/viewFichaPersonagem.php";

include __DIR__ . "/../../resources/Templates/footer.php";