<?php

class Conexao {

    private static $instancia;

    public static function get() {

        try {

            if(!isset(self::$instancia)) {

                self::$instancia = new PDO(
                    'mysql:host=localhost;dbname=bdTPK;charset=utf8',
                    'root',
                    ''
                );

            }

            return self::$instancia;

        } catch(PDOException $e){

            throw new Exception(
                "Erro na conexão: " . $e->getMessage()
            );
        }
    }
}
?>