<?php
    //Este arquivo php é temporario, ele armazena as informacoes de usuario num array. 
    //Para a parte dois do trabalho, ele será substituido pelo banco de dados
    $sessao0Exemplo=array(
        'nomeSessao'=> 'Sessao exemplo - 0',
        'dataSessao'=> '10/10/26',
        'resumoSessao'=> 'Nesta sessao ocorreu 1 batalha emocionante.',
        'idSessao'=>'1'
    );

    $campanhaExemplo=array(
        'nomeCampanha'=>'Campanha Exemplo',
        'descCampanha'=> 'Esta é uma campanha de exemplo. RPG(Role Playing Game) é um hobbie muito divertido!',
        'imagemCampanha'=> 'https://placehold.co/400x300',
        'sistemaCampanha'=> 'Ordem Paranormal',
        'sessoesCampanha'=> [$sessao0Exemplo,$sessao0Exemplo],
        'personagensCampanha'=>[],
        'idCampanha'=>'1'
    );
    
    $campanhaExemplo2=array(
        'nomeCampanha'=>'Outra Campanha',
        'descCampanha'=> 'Esta é uma outra campanha de exemplo. RPG(Role Playing Game) é um hobbie muito, mas muito mesmo, divertido :D',
        'imagemCampanha'=> 'https://placehold.co/400x300',
        'sistemaCampanha'=> 'Dungeons & Dragons',
        'sessoesCampanha'=> [$sessao0Exemplo],
        'personagensCampanha'=>[],
        'idCampanha'=>'2'
    );

    $users=array(
        ['email'=>'joao@gmail.com',
        'senha'=>'senha1234',
        'nome'=>'Joao',
        'campanhas'=>[$campanhaExemplo, $campanhaExemplo2],
        'personagens'=> []
        ],
        ['email'=>'maria@hotmail.com',
        'senha'=>'mariazinha69',
        'nome'=>'Maria',
        'campanhas'=>[],
        'personagens'=> []
        ],
    );

    
    