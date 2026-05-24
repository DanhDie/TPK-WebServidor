<section class="container">

    <div class="container">

        <div class="is-primary">

            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">

                <?= $sessaoSelecionada['nome'] ?>

            </h1>

            <div class="mb-3 mx-2">

                <nav class="breadcrumb has-bullet-separator">

                    <ul>

                        <li class="is-size-7">

                            <a href="<?= BASE_URL ?>/telaInicial">
                                Campanhas
                            </a>

                        </li>

                        <li class="is-size-7">

                            <a href="<?= BASE_URL ?>/campanha?idC=<?= $campanhaSelecionada['id'] ?>">

                                <?= $campanhaSelecionada['nome'] ?>

                            </a>

                        </li>

                        <li class="is-active is-size-7 has-text-primary">

                            <a href="#">

                                <?= $sessaoSelecionada['nome'] ?>

                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="box">

            <div class="container">

                <div class="columns">

                    <div class="column is-8">

                        <div class="content">

                            <h1 class="is-size-5 has-text-weight-bold has-text-primary">

                                <?= $sessaoSelecionada['nome'] ?>

                            </h1>

                            <p>

                                <?= $sessaoSelecionada['resumo'] ?>

                            </p>

                            <div class="content">

                                <label class="label">
                                    Data:
                                </label>

                                <span class="icon-text">

                                    <span class="icon">
                                        <i class="fas fa-calendar"></i>
                                    </span>

                                    <span>

                                        <?= $sessaoSelecionada['data_sessao'] ?>

                                    </span>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="content">

                    <a
                        class="button has-text-primary"
                        href="<?= BASE_URL ?>/editarSessao?idC=<?= $campanhaSelecionada['id'] ?>&idS=<?= $sessaoSelecionada['id'] ?>"
                    >

                        Editar Sessão

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>