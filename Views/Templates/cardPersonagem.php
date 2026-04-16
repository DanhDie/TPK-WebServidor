<?php
$cardData = array(
    'nome'=> $personagem['nome'],
    'descricao'=> $personagem['historia'],
);
?>

<div class="card">
    <div class="card-image">
        <figure class="image is-1by1">
            <img src="https://placehold.co/300x300" alt="Imagem personagem"/>
        </figure>
    </div>

    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-6"><?= $cardData['nome'] ?></p>
            </div>
        </div>

        <div class="content">
            <?php 
                //pra caso passar muito o texto ele mostra so os primeiros caracteres
                $texto = $cardData['descricao'];
            ?>
            <p><?= strlen($texto) > 50 ? substr($texto, 0, 50) . '...' : $texto ?></p>

            <a href="../Controllers/controllerFichaPersonagem.php?idP=<?= $personagem['idPersonagem'] ?>"
               class="is-size-7">
                Abrir ficha
            </a>
        </div>
    </div>
</div>