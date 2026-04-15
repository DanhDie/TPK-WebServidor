<?php
  $cardData = array(
    'titulo'=> $campanha['nomeCampanha'],
    'descricao'=> $campanha['descCampanha'],
    'sistema'=> $campanha['sistemaCampanha'],
    'imagem'=> $campanha['imagemCampanha'],
  );
?>

<div class="card py-2 px-2">
  <div class="card-image">
    <figure class="image is-4by3">
      <img
        src="<?= $cardData['imagem'] ?? 'https://placehold.co/400x300' ?>"
        alt="Imagem da campanha"
      />
    </figure>
  </div>

  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?= $cardData['titulo'] ?? 'Sem título' ?></p>
        <p class="subtitle is-6"><?= $cardData['sistema'] ?? 'Sistema desconhecido' ?></p>
      </div>
    </div>

    <div class="content">
      <p class="is-size-6 has-text-weight-light">
        <?= $cardData['descricao'] ?? 'Sem descrição' ?>
      </p>

      <a href="../Controllers/controllerCampanha.php?idC=<?= $campanha['idCampanha'] ?>"
         class="is-size-6 button is-primary">
        Abrir campanha
      </a>
    </div>
  </div>
</div>