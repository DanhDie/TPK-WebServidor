<?php
    try{
        $bd = new PDO("mysql:host=localhost;dbname=dbtpk","root","");
    } catch(PDOException $e){
        throw new Exception("Erro na conexão: " . $e->getMessage());
    }