<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                <?= $campanhaSelecionada['nomeCampanha'] ?>
            </h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator">
                    <ul>
                        <li class="is-size-7">
                            <a href="../Controllers/controllerTelaInicial.php">Campanhas</a>
                        </li>
                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#">
                                <?= $campanhaSelecionada['nomeCampanha'] ?>
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
                            <img src="<?= $campanhaSelecionada['imagemCampanha'] ?>">
                        </figure>
                    </div>

                    <div class="column is-8">
                        <div class="content">
                            <h1 class="is-size-5 has-text-weight-bold">
                                <?= $campanhaSelecionada['sistemaCampanha'] ?>
                            </h1>

                            <p><?= $campanhaSelecionada['descCampanha'] ?></p>

                            <a class="button has-text-primary"
                               href="../Controllers/controllerEditarCampanha.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>">
                                Editar Campanha
                            </a>
                        </div>
                    </div>
                </div>

                <label class="is-size-4 label has-text-primary">Sessões</label>
                <hr>

                <div class="content columns is-multiline">
                    <?php if (!empty($campanhaSelecionada['sessoesCampanha'])): ?>
                        <?php foreach ($campanhaSelecionada['sessoesCampanha'] as $sessao): ?>
                            <div class="column is-3">
                                <?php include("../Views/Templates/cardSession.php"); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="content">
                    <a class="button has-text-primary"
                       href="../Controllers/controllerCriarSessao.php?idC=<?= $campanhaSelecionada['idCampanha'] ?>">
                        Criar Sessão
                    </a>
                </div>

                <label class="is-size-4 label has-text-primary">Personagens</label>
                <hr>

                <div class="content">
                    <?php if (!empty($campanhaSelecionada['personagensCampanha'])): ?>
                        <div class="columns is-multiline">
                            <?php foreach($campanhaSelecionada['personagensCampanha'] as $personagem): ?>
                                <div class="column is-3">
                                    <?php include("../Views/Templates/cardPersonagem.php"); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="has-text-grey">Nenhum personagem nesta campanha.</p>
                    <?php endif; ?>
                </div>

                <div class="content">
                    <label class="label has-text-primary">Adicionar personagem:</label>

                    <form method="POST" action="../Controllers/controllerCampanha.php">
                        <input type="hidden" name="idC" value="<?= $campanhaSelecionada['idCampanha'] ?>">

                        <div class="my-2 field has-addons">
                            <div class="pt-2">
                                <div class="select is-primary">
                                    <select name="idP" required>
                                        <option disabled selected>Selecione um personagem</option>

                                        <?php foreach($usuario['personagens'] as $personagem): ?>
                                            <option value="<?= $personagem['idPersonagem'] ?>">
                                                <?= $personagem['nome'] ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="px-2 pt-2 is-primary">
                                <button class="button has-text-primary" type="submit" name="addPersonagem">
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