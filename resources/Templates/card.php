<div class="card py-2 px-2">
  <div class="card-image">
    <figure class="image is-4by3">
      <img
        src="<?= $campanha['imagem'] ?? 'https://placehold.co/400x300' ?>"
        alt="Imagem da campanha"
      />
    </figure>
  </div>

  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?= $campanha['nome'] ?? 'Sem título' ?></p>
        <p class="subtitle is-6"><?= $campanha['sistema'] ?? 'Sistema desconhecido' ?></p>
      </div>
    </div>

    <div class="content">
      <p class="is-size-6 has-text-weight-light">
        <?= $campanha['descricao'] ?? 'Sem descrição' ?>
      </p>

      <a href="<?= BASE_URL ?>/campanha?idC=<?= $campanha['id'] ?>"
         class="is-size-6 button is-primary">
        Abrir campanha
      </a>
    </div>
  </div>
</div>