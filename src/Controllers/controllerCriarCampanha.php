<?php

require_once __DIR__ . "/../../bootstrap.php";

// Verifica login
if (empty($_SESSION['logado'])) {
    header('Location: ' . BASE_URL . '/login');
    exit();
}

include __DIR__ . "/../../resources/Templates/header.php";

include __DIR__ . "/../Validators/validationCriarCampanha.php";

include __DIR__ . "/../../resources/Views/viewCriarCampanha.php";

include __DIR__ . "/../../resources/Templates/footer.php";