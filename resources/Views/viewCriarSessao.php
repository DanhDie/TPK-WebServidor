<section class="container">

    <div class="container">

        <div class="is-primary">

            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                CRIAR SESSÃO
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
                                Criar sessão
                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="box">

            <div class="container">

                <form action="" method="POST">

                    <div class="columns">

                        <div class="column is-8">

                            <div class="content">

                                <label class="label">
                                    Nome da Sessão:
                                </label>

                                <input
                                    class="input is-normal"
                                    type="text"
                                    name="nome"
                                    value="<?= $sessaoInf['nome'] ?>"
                                >

                            </div>

                            <?= $errors['nome'] ?>

                        </div>

                        <div class="column is-4">

                            <div class="content">

                                <label class="label">
                                    Data:
                                </label>

                                <input
                                    class="input is-normal"
                                    type="date"
                                    name="data_sessao"
                                    value="<?= $sessaoInf['data_sessao'] ?>"
                                >

                            </div>

                            <?= $errors['data_sessao'] ?>

                        </div>

                    </div>

                    <div class="content">

                        <label class="label">
                            Resumo:
                        </label>

                        <textarea
                            class="textarea"
                            rows="5"
                            cols="80"
                            name="resumo"
                        ><?= $sessaoInf['resumo'] ?></textarea>

                    </div>

                    <div class="content">

                        <input
                            class="mt-1 button is-primary"
                            name="submit"
                            type="submit"
                            value="Finalizar"
                        >

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>