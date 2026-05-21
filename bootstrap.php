<?php

require_once __DIR__ . '/Database/conexao.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

define('BASE_URL', '/TPK-WebServidor/public');