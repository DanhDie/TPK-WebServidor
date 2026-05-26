<?php

require_once __DIR__ . "/../../bootstrap.php";

// Verifica login
if (empty($_SESSION['logado'])) {
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];

try {

    $bd = Conexao::get();

    if (isset($_POST['addPersonagem'])) {

        $idC = $_POST['idC'];
        $idP = $_POST['idP'];

        // Verifica se personagem já está na campanha
        $verifica = $bd->prepare("
            SELECT id
            FROM personagem
            WHERE id = :idP
            AND campanha_id = :idC
        ");

        $verifica->bindValue(':idP', $idP);
        $verifica->bindValue(':idC', $idC);

        $verifica->execute();

        if (!$verifica->fetch()) {

            $update = $bd->prepare("
                UPDATE personagem
                SET campanha_id = :idC
                WHERE id = :idP
            ");

            $update->bindValue(':idC', $idC);
            $update->bindValue(':idP', $idP);

            $update->execute();
        }

        header("Location: " . BASE_URL . "/campanha?idC=$idC");
        exit();
    }

    $idC = $_GET['idC'] ?? null;

    if (!$idC) {
        die("Campanha não informada.");
    }

    $queryCampanha = $bd->prepare("
        SELECT *
        FROM campanha
        WHERE id = :id
    ");

    $queryCampanha->bindValue(':id', $idC);

    $queryCampanha->execute();

    $campanhaSelecionada = $queryCampanha->fetch(PDO::FETCH_ASSOC);

    if (!$campanhaSelecionada) {
        die("Campanha não encontrada.");
    }

    $querySessoes = $bd->prepare("
        SELECT *
        FROM sessao
        WHERE campanha_id = :idC
    ");

    $querySessoes->bindValue(':idC', $idC);

    $querySessoes->execute();

    $sessoesCampanha = $querySessoes->fetchAll(PDO::FETCH_ASSOC);

    $queryPersonagensCampanha = $bd->prepare("
        SELECT *
        FROM personagem
        WHERE campanha_id = :idC
    ");

    $queryPersonagensCampanha->bindValue(':idC', $idC);

    $queryPersonagensCampanha->execute();

    $personagensCampanha = $queryPersonagensCampanha->fetchAll(PDO::FETCH_ASSOC);

    $queryPersonagensUsuario = $bd->prepare("
        SELECT *
        FROM personagem
        WHERE usuario_id = :usuario_id
        AND campanha_id IS NULL
    ");

    $queryPersonagensUsuario->bindValue(':usuario_id', $usuario['id']);

    $queryPersonagensUsuario->execute();

    $personagensUsuario = $queryPersonagensUsuario->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../../resources/Views/viewCampanha.php";

include __DIR__ . "/../../resources/Templates/footer.php";