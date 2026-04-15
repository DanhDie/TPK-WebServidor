<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">EDITAR SESSÃO</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerTelaInicial.php">Campanhas</a></li>
                <li class="is-size-7">
                            <a href="../Controllers/controllerCampanha.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>">
                                <?= $campanhaSelecionada['nomeCampanha'] ?>
                            </a>
                        </li>

                        <li class="is-size-7">
                            <a href="../Controllers/controllerSessao.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>&idS=<?= $sessao['idSessao'] ?>" class="is-size-7">
                                Editar Sessão
                            </a>
                        </li>
                        </li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Editar sessao</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <div class="container">
                <!--Informações de formulário-->
                <form method="POST">
                    <div class="columns is-multiline">
                        <div class="column is-8">
                            <div class="field">
                                <label class="label">Nome</label>
                                <div class="control">
                                    <input class="input" type="text" name="nomeSessao"
                                        value="<?= $sessaoSelecionada['nomeSessao'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="field">
                                <label class="label">Data</label>
                                <div class="control">
                                    <input class="input" type="text" name="dataSessao"
                                        value="<?= $sessaoSelecionada['dataSessao'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">Resumo</label>
                                <div class="control">
                                    <textarea class="textarea" name="resumoSessao"><?= $sessaoSelecionada['resumoSessao'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="buttons mt-1 mb-0">
                                <button type="submit" name="finalizar" class="button is-primary">
                                    Finalizar
                                </button>

                                <button type="submit" name="excluir" class="button is-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir esta sessão?')">
                                    Excluir
                                </button>

                                <a class="button"
                                href="../Controllers/controllerSessao.php?idC=<?= $idC ?>&idS=<?= $idS ?>">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
