<section class="container">
    <div class="container">

        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                CRIAR PERSONAGEM
            </h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator">
                    <ul>
                        <li class="is-size-7">
                            <a href="<?= BASE_URL ?>/personagens">Personagens</a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#">Criar Personagem</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="box">
            <div class="container">

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="columns">

                        <div class="column is-8">
                            <div class="content">
                                <label class="label">Nome da Personagem:</label>

                                <input
                                    class="input is-normal"
                                    type="text"
                                    name="nome"
                                    value="<?= $personagemDesc['nome'] ?>"
                                >
                            </div>

                            <?= $errors['nome'] ?>
                        </div>

                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Level:</label>

                                <input
                                    class="input is-normal"
                                    type="text"
                                    name="level"
                                    value="<?= $personagemStats['level'] ?>"
                                >
                            </div>

                            <?= $errors['level'] ?>
                        </div>

                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Classe:</label>
                                <div class="select is-normal is-fullwidth">
                                    <select name="classe">
                                        <?php foreach($classesdnd as $classe): ?>
                                            <option value="<?= $classe['index'] ?>"
                                                <?= $personagemDesc['classe'] === $classe['index'] ? 'selected' : '' ?>>
                                                <?= $classe['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?= $errors['classe'] ?>
                        </div>

                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Sub-classe:</label>

                                <input
                                    class="input is-normal"
                                    type="text"
                                    name="subclasse"
                                    value="<?= $personagemDesc['subclasse'] ?>"
                                >
                            </div>
                        </div>

                    </div>

                    <div class="columns">

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Força:</label>

                                <input class="input" type="text" name="forca" value="<?= $personagemStats['forca'] ?>">
                            </div>

                            <?= $errors['forca'] ?>
                        </div>

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Destreza:</label>

                                <input class="input" type="text" name="destreza" value="<?= $personagemStats['destreza'] ?>">
                            </div>

                            <?= $errors['destreza'] ?>
                        </div>

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Constituição:</label>

                                <input class="input" type="text" name="constituicao" value="<?= $personagemStats['constituicao'] ?>">
                            </div>

                            <?= $errors['constituicao'] ?>
                        </div>

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Inteligência:</label>

                                <input class="input" type="text" name="inteligencia" value="<?= $personagemStats['inteligencia'] ?>">
                            </div>

                            <?= $errors['inteligencia'] ?>
                        </div>

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Sabedoria:</label>

                                <input class="input" type="text" name="sabedoria" value="<?= $personagemStats['sabedoria'] ?>">
                            </div>

                            <?= $errors['sabedoria'] ?>
                        </div>

                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Carisma:</label>

                                <input class="input" type="text" name="carisma" value="<?= $personagemStats['carisma'] ?>">
                            </div>

                            <?= $errors['carisma'] ?>
                        </div>

                    </div>

                    <div class="columns">

                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Vida Máxima:</label>

                                <input class="input" type="text" name="vida" value="<?= $personagemStats['vida'] ?>">
                            </div>

                            <?= $errors['vida'] ?>
                        </div>

                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Armadura:</label>

                                <input class="input" type="text" name="armadura" value="<?= $personagemStats['armadura'] ?>">
                            </div>

                            <?= $errors['armadura'] ?>
                        </div>

                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Velocidade:</label>

                                <input class="input" type="text" name="velocidade" value="<?= $personagemStats['velocidade'] ?>">
                            </div>

                            <?= $errors['velocidade'] ?>
                        </div>

                    </div>

                    <div class="content">
                        <label class="label">Historia do Personagem:</label>

                        <textarea
                            class="textarea"
                            rows="5"
                            name="historia"
                        ><?= $personagemDesc['historia'] ?></textarea>
                    </div>

                    <div class="content">
                        <label class="label">Imagem:</label>

                        <div class="file has-name">
                            <label class="file-label">

                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>

                                    <span class="file-label">
                                        Escolher arquivo
                                    </span>
                                </span>

                                <input type="file" name="imagem">

                            </label>
                        </div>

                        <?= $errors['imagem'] ?>
                    </div>

                    <div class="content">
                        <button class="mt-1 button is-primary" name="submit" type="submit">
                            Finalizar
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>