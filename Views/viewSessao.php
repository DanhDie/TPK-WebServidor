<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                <?= $sessaoSelecionada['nomeSessao'] ?>
            </h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                    <ul>
                        <li class="is-size-7">
                            <a href="../Controllers/controllerTelaInicial.php">Campanhas</a>
                        </li>

                        <li class="is-size-7">
                            <a href="../Controllers/controllerCampanha.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>">
                                <?= $campanhaSelecionada['nomeCampanha'] ?>
                            </a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#" aria-current="page">
                                <?= $sessaoSelecionada['nomeSessao'] ?>
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
                                <?= $sessaoSelecionada['nomeSessao'] ?>
                            </h1>

                            <p><?= $sessaoSelecionada['resumoSessao'] ?></p>

                            <div class="content">
                                <label class="label">Data:</label>
                                <span class="icon-text">
                                    <span class="icon">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <span><?= $sessaoSelecionada['dataSessao'] ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <a class="button has-text-primary"
                       href="../Controllers/controllerEditarSessao.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>&idS=<?= $sessaoSelecionada['idSessao'] ?>">
                        Editar Sessão
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>