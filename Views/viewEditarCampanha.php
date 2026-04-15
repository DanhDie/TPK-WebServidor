<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                EDITAR CAMPANHA
            </h1>
        
            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator">
                    <ul>
                        <li class="is-size-7">
                            <a href="../Controllers/controllerTelaInicial.php">Campanhas</a>
                        </li>

                        <li class="is-size-7">
                            <a href="../Controllers/controllerCampanha.php?idC=<?= $idC ?>">
                                <?= $campanhaSelecionada['nomeCampanha'] ?>
                            </a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#">Editar Campanha</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="box">
            <div class="container">

                <form method="POST" enctype="multipart/form-data">

                    <div class="content">
                        <label class="label">Nome da Campanha:</label>
                        <input class="input" type="text" name="nome" value="<?= $campanhaSelecionada['nomeCampanha'] ?>">
                    </div>
                    <?= $errors['nome'] ?>

                    <div class="content">
                        <label class="label">Descrição:</label>
                        <textarea class="textarea" name="desc"><?= $campanhaSelecionada['descCampanha'] ?></textarea>
                    </div>

                    <div class="content">
                        <label class="label">Imagem atual:</label>
                        
                        <figure class="image is-4by3" style="max-width: 300px;">
                            <img src="<?= $campanhaSelecionada['imagemCampanha'] ?>" alt="Imagem da campanha">
                        </figure>
                    </div>

                    <div class="content">
                        <label class="label">Alterar imagem:</label>
                        <input type="file" name="arquivo">
                    </div>
                    <?= $errors['imagem'] ?>

                    <div class="content">
                        <label class="label">Sistema:</label>
                        <div class="select">
                            <select name="sistema">
                                <option disabled> -- Selecione um Sistema -- </option>

                                <?php foreach($sistemas as $sistema): ?>
                                    <option <?= ($sistema == $campanhaSistema) ? 'selected' : '' ?>>
                                        <?= $sistema ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <?= $errors['sistema'] ?>

                    <div class="buttons mt-4">
                        <button type="submit" name="submit" value="Finalizar" class="button is-primary">
                            Finalizar
                        </button>

                        <button type="submit" name="submit" value="Excluir"
                                class="button is-danger"
                                onclick="return confirm('Tem certeza que deseja excluir a campanha?')">
                            Excluir
                        </button>

                        <a class="button"
                           href="../Controllers/controllerCampanha.php?idC=<?= $idC ?>">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>