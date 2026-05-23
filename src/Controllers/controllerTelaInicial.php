<?php

require_once __DIR__ . "/../../bootstrap.php";

// Verifica login
if(empty($_SESSION['logado'])){
    header('Location: ' . BASE_URL . '/login');
    exit();
}

$usuario = $_SESSION['infoUser'];

try{

    $bd = Conexao::get();

    $query = $bd->prepare("
        SELECT *
        FROM campanha
        WHERE usuario_id = :usuario_id
    ");

    $query->bindValue(':usuario_id', $usuario['id']);

    $query->execute();

    $campanhas = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e){

    die("Erro no banco: " . $e->getMessage());
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../../resources/Views/viewTelaInicial.php";

include __DIR__ . "/../../resources/Templates/footer.php";

