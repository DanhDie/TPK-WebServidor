<?php
    class Autenticacao{ 
        static function verificarSessao(){
            # Evitar problemas de dar session_start(); duas vezes
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }

            # Vê se o usuário tá logado, se não, manda de volta para a tela de Login; Vou parar por hoje, eu quero jogar 
            if(!isset($_SESSION['infoUser'])){
                header('Location: ' . BASE_URL . '/login');
                exit;
            }
        }
    }