 <section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                <?= $campanhaSelecionada['nomeCampanha'] ?>
            </h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                    <ul>
                        <li class="is-size-7">
                            <a href="../Controllers/controllerTelaInicial.php">Campanhas</a>
                        </li>
                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#" aria-current="page">
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
                            <img
                                src="<?= $campanhaSelecionada['imagemCampanha'] ?>"
                                alt="Imagem da campanha"
                            />
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
                    <?php if (!empty($campanhaSelecionada['sessoesCampanha'])): 
                            foreach ($campanhaSelecionada['sessoesCampanha'] as $sessao): ?>
                            <div class="column is-3">
                                <?php include("../Views/Templates/cardSession.php"); ?>
                            </div>
                        <?php endforeach;?>
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
                    <div class="mt-1 columns is-multiline">
                        <div class="column is-3">
                            <?php include("../Views/Templates/cardPersonagem.php"); ?>
                        </div>
                        <div class="column is-3">
                            <?php include("../Views/Templates/cardPersonagem.php"); ?>
                        </div>
                        <div class="column is-3">
                            <?php include("../Views/Templates/cardPersonagem.php"); ?>
                        </div>
                    </div>

                    <div class="content">
                        <label class="label has-text-primary">Adicionar personagem:</label>

                        <div class="select">
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>

                        <button class="button">+</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>