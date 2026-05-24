<div class="card pb-0">

    <div class="card-content">

        <div class="media">

            <div class="media-content">

                <p class="title is-5">
                    <?= $sessao['nome'] ?>
                </p>

            </div>

        </div>

        <div class="content pb-0">

            <p class="is-size-7 has-text-weight-light">
                <?= $sessao['resumo'] ?>
            </p>

            <a href="<?= BASE_URL ?>/sessao?idC=<?= $campanhaSelecionada['id'] ?>&idS=<?= $sessao['id'] ?>"
               class="mt-3 mb-0 is-size-7 button is-primary">

                + Informações

            </a>

        </div>

    </div>

</div>