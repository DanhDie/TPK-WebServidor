<section class="container">

    <div class="container">

        <div class="is-primary">

            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                EDITAR SESSÃO
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

                        <li class="is-size-7">

                            <a href="<?= BASE_URL ?>/sessao?idC=<?= $idC ?>&idS=<?= $idS ?>">

                                <?= $sessaoSelecionada['nome'] ?>

                            </a>

                        </li>

                        <li class="is-active is-size-7 has-text-primary">

                            <a href="#">
                                Editar sessão
                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="box">

            <div class="container">

                <form method="POST">

                    <div class="columns is-multiline">

                        <div class="column is-8">

                            <div class="field">

                                <label class="label">
                                    Nome
                                </label>

                                <div class="control">

                                    <input
                                        class="input"
                                        type="text"
                                        name="nome"
                                        value="<?= $sessaoInf['nome'] ?>"
                                    >

                                </div>

                                <?= $errors['nome'] ?>

                            </div>

                        </div>

                        <div class="column is-4">

                            <div class="field">

                                <label class="label">
                                    Data
                                </label>

                                <div class="control">

                                    <input
                                        class="input"
                                        type="date"
                                        name="data_sessao"
                                        value="<?= $sessaoInf['data_sessao'] ?>"
                                    >

                                </div>

                                <?= $errors['data_sessao'] ?>

                            </div>

                        </div>

                        <div class="column is-12">

                            <div class="field">

                                <label class="label">
                                    Resumo
                                </label>

                                <div class="control">

                                    <textarea
                                        class="textarea"
                                        name="resumo"
                                    ><?= $sessaoInf['resumo'] ?></textarea>

                                </div>

                            </div>

                        </div>

                        <div class="column">

                            <div class="buttons mt-1 mb-0">

                                <button
                                    type="submit"
                                    name="finalizar"
                                    class="button is-primary"
                                >

                                    Finalizar

                                </button>

                                <button
                                    type="submit"
                                    name="excluir"
                                    class="button is-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir esta sessão?')"
                                >

                                    Excluir

                                </button>

                                <a
                                    class="button"
                                    href="<?= BASE_URL ?>/sessao?idC=<?= $idC ?>&idS=<?= $idS ?>"
                                >

                                    Cancelar

                                </a>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>