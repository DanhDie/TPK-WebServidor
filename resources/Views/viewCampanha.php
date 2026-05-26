<section class="container">

    <div class="container">

        <div class="is-primary">

            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                <?= $campanhaSelecionada['nome'] ?>
            </h1>

            <div class="mb-3 mx-2">

                <nav class="breadcrumb has-bullet-separator">
                    <ul>

                        <li class="is-size-7">
                            <a href="<?= BASE_URL ?>/telaInicial">
                                Campanhas
                            </a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#">
                                <?= $campanhaSelecionada['nome'] ?>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="box">

            <div class="container">

                <div class="columns">

                    <div class="column is-4">

                        <figure class="image is-4by3">

                            <img src="<?= $campanhaSelecionada['imagem'] ?: 'https://placehold.co/600x400' ?>">

                        </figure>

                    </div>

                    <div class="column is-8">

                        <div class="content">

                            <h1 class="is-size-5 has-text-weight-bold">
                                <?= $campanhaSelecionada['sistema'] ?>
                            </h1>

                            <p>
                                <?= $campanhaSelecionada['descricao'] ?>
                            </p>

                            <a class="button has-text-primary"
                               href="<?= BASE_URL ?>/editarCampanha?idC=<?= $campanhaSelecionada['id'] ?>">
                                Editar Campanha
                            </a>

                        </div>

                    </div>

                </div>

                <!-- SESSÕES -->

                <label class="is-size-4 label has-text-primary">
                    Sessões
                </label>

                <hr>

                <div class="content columns is-multiline">

                    <?php foreach ($sessoesCampanha as $sessao): ?>

                        <div class="column is-3">

                            <?php include __DIR__ . "/../Templates/cardSession.php"; ?>

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="content">

                    <a class="button has-text-primary"
                       href="<?= BASE_URL ?>/criarSessao?idC=<?= $campanhaSelecionada['id'] ?>">

                        Criar Sessão

                    </a>

                </div>

                <!-- PERSONAGENS -->

                <label class="is-size-4 label has-text-primary">
                    Personagens
                </label>

                <hr>

                <div class="content">

                    <?php if (!empty($personagensCampanha)): ?>

                        <div class="columns is-multiline">

                            <?php foreach ($personagensCampanha as $personagem): ?>

                                <div class="column is-3">

                                    <?php include __DIR__ . "/../Templates/cardPersonagem.php"; ?>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php else: ?>

                        <p class="has-text-grey">
                            Nenhum personagem nesta campanha.
                        </p>

                    <?php endif; ?>

                </div>

                <!-- ADICIONAR PERSONAGEM -->

                <div class="content">

                    <label class="label has-text-primary">
                        Adicionar personagem:
                    </label>

                    <form method="POST" action="<?= BASE_URL ?>/campanha">

                        <input type="hidden"
                               name="idC"
                               value="<?= $campanhaSelecionada['id'] ?>">

                        <div class="my-2 field has-addons">

                            <div class="pt-2">

                                <div class="select is-primary">

                                    <select name="idP" required>

                                        <option disabled selected>
                                            Selecione um personagem
                                        </option>

                                        <?php foreach ($personagensUsuario as $personagem): ?>

                                            <option value="<?= $personagem['id'] ?>">

                                                <?= $personagem['nome'] ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                            <div class="px-2 pt-2 is-primary">

                                <button class="button has-text-primary"
                                        type="submit"
                                        name="addPersonagem">

                                    Adicionar

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>