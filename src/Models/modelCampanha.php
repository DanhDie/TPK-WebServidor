<?php
    class Campanha{
        protected $id;
        protected $nome;
        protected $descricao;
        protected $sistema;
        protected $sessoes; // Um array para as instâncias de sessões?
        protected $personagens; // Um array para as instâncias de personagens?
        protected $imagem; // Vou manter aqui, até chegar a hora da implementação, porque é possível colocar imagens em MySQL, eu só não sei o quão difícil realmente é
    }