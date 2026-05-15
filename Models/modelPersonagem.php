<?php 
    class Personagem{
        protected $id;
        protected $nome;
        protected $classe;
        protected $subclasse;
        protected $historia;
        protected $level;
        protected $vida;
        protected $armadura;
        protected $forca;
        protected $destreza;
        protected $constituicao;
        protected $inteligencia;
        protected $sabedoria;
        protected $carisma;
        protected $velocidade;

        public function statCalculator($stat){
            # Devido ao arredondamento para cima / para baixo diferentes, eu tive que seperar

            # Se é maior ou igual a dez == Modificador positivo
            if($stat>=10){
                # Deixa só o que vem depois e divide por dois, arredondando para baixo, o valor resultantes é o aumento
                $stat-=10;
                $stat=floor($stat/2);

                # Retorna o valor
                return $stat;
            }

            # Se o valor é menor que dez e maior zero == Modificador negativo
            elseif($stat<10 && $stat>0){
                $stat-=10;
                $stat=ceil($stat/2);

                # Retorna o valor
                return $stat;
            }

            # Numero menor ou igual a zero
            else{
                return -5;
            }
        }
    }