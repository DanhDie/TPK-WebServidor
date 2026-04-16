<?php
  $cardData = array(
    'nome'=> $personagem['DadosS']['nome'],
    'descricao'=> $personagem['DadosS']['historia'],
  );
?>
<div class="card">
    <div class="card-image">
    <figure class="image is-1by1">
      <img
        src="https://placehold.co/300x300"
        alt="Placeholder image"
      />
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-6"><?= $cardData['nome'] ?></p>
      </div>
    </div>

    <div class="content">
      <p class="is-size-7 has-text-weight-light"><?= $cardData['descricao'] ?></p>
      <a href="../Controllers/controllerFichaPersonagem.php" class="is-size-7">Abrir ficha</a>
    </div>
  </div>
</div>