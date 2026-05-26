<?php
class Autenticacao {
    public static function verificarSessao() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}