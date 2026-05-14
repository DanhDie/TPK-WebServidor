<?php
include("../Models/users.php");

// so pra testar se ta funcionando
require_once __DIR__ . '/../Database/conexao.php';

$bd = Conexao::get();

$query = $bd->prepare('SELECT * FROM usuario');
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_OBJ);

foreach($usuarios as $u){
    echo $u->nome;
    echo ' ';
    }
//

include("./validationLogin.php");
include("../Views/viewLogin.php");
include("../Views/Templates/footer.php");