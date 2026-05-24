<section class="container">

    <div class="container">

        <div class="is-primary">

            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                CRIAR CAMPANHA
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
                                Criar Campanha
                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="box">

            <div class="container">

                <form
                    action=""
                    method="POST"
                    enctype="multipart/form-data"
                >


                    <div class="content">

                        <label class="label">
                            Nome da Campanha:
                        </label>

                        <input
                            class="input is-normal"
                            type="text"
                            name="nome"
                            value="<?= $campanhaNome ?>"
                        >

                    </div>

                    <?= $errors['nome'] ?>


                    <div class="content">

                        <label class="label">
                            Descrição:
                        </label>

                        <textarea
                            class="textarea"
                            rows="5"
                            cols="80"
                            name="desc"
                        ><?= $campanhaDesc ?></textarea>

                    </div>


                    <div class="content">

                        <label class="label">
                            Imagem:
                        </label>

                        <div class="file has-name">

                            <label class="file-label">

                                <input
                                    class="file-input"
                                    type="file"
                                    name="imagem"
                                >

                                <span class="file-cta">

                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>

                                    <span class="file-label">
                                        Escolher imagem
                                    </span>

                                </span>

                            </label>

                        </div>

                    </div>

                    <?= $errors['imagem'] ?>


                    <div class="content">

                        <label class="label">
                            Sistema utilizado:
                        </label>

                        <div class="control select">

                            <select name="sistema">

                                <option disabled selected value="">
                                    -- Selecione um Sistema --
                                </option>

                                <?php foreach ($sistemas as $sistema): ?>

                                    <option
                                        value="<?= $sistema ?>"
                                        <?= $campanhaSistema == $sistema ? 'selected' : '' ?>
                                    >
                                        <?= $sistema ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                    </div>

                    <?= $errors['sistema'] ?>


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