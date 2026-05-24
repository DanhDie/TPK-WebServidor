<?php

require_once __DIR__ . "/../../bootstrap.php";

if (empty($_SESSION['logado'])) {
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];

$idS = $_GET['idS'] ?? null;
$idC = $_GET['idC'] ?? null;

if (!$idS || !$idC) {
    die("Parâmetros inválidos.");
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

    $querySessao = $bd->prepare("
        SELECT *
        FROM sessao
        WHERE id = :id
        AND campanha_id = :campanha_id
    ");

    $querySessao->bindValue(':id', $idS);
    $querySessao->bindValue(':campanha_id', $idC);

    $querySessao->execute();

    $sessaoSelecionada = $querySessao->fetch(PDO::FETCH_ASSOC);

    if (!$sessaoSelecionada) {
        die("Sessão não encontrada.");
    }

} catch (PDOException $e) {

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../Validators/validationEditarSessao.php";

include __DIR__ . "/../../resources/Views/viewEditarSessao.php";

include __DIR__ . "/../../resources/Templates/footer.php";