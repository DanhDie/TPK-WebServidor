<?php

class Conexao {

    private static $instancia;

    public static function get() {

        try {

            if (!isset(self::$instancia)) {

                self::$instancia = new PDO(
                    'mysql:host=localhost;dbname=bdTPK',
                    'root',
                    ''
                );

                self::$instancia->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }

            return self::$instancia;

        } catch (PDOException $e) {

            die("Erro na conexão: " . $e->getMessage());
        }
    }
}