<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                Editar Personagem</h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator">
                    <ul>
                        <li class="is-size-7"><a href="../Controllers/controllerPersonagens.php">Personagens</a></li>

                        <li class="is-size-7">
                            <a href="../Controllers/controllerFichaPersonagem.php?idP=<?= $idP ?>">
                                <?= $personagemSelecionado['nome'] ?>
                            </a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary"><a href="#">Editar</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="box">
            <form method="POST">

                <div class="columns">
                    <div class="column">
                        <label class="label">Nome</label>
                        <input class="input" name="nome" value="<?= $personagemSelecionado['nome'] ?>">
                    </div>

                    <div class="column">
                        <label class="label">Level</label>
                        <input class="input" name="level" value="<?= $personagemSelecionado['level'] ?>">
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <label class="label">Classe</label>
                        <input class="input" name="classe" value="<?= $personagemSelecionado['classe'] ?>">
                    </div>

                    <div class="column">
                        <label class="label">Subclasse</label>
                        <input class="input" name="subclasse" value="<?= $personagemSelecionado['subclasse'] ?>">
                    </div>
                </div>

                <div class="columns is-multiline">
                    <?php
                    $atributos = [
                        'forca' => 'Força',
                        'destreza' => 'Destreza',
                        'constituicao' => 'Constituição',
                        'inteligencia' => 'Inteligência',
                        'sabedoria' => 'Sabedoria',
                        'carisma' => 'Carisma'
                    ];

                    foreach ($atributos as $key => $label):
                    ?>
                        <div class="column is-2">
                            <label class="label"><?= $label ?></label>
                            <input class="input" name="<?= $key ?>" value="<?= $personagemSelecionado[$key] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="columns">
                    <div class="column">
                        <label class="label">Vida</label>
                        <input class="input" name="vida" value="<?= $personagemSelecionado['vida'] ?>">
                    </div>

                    <div class="column">
                        <label class="label">Armadura</label>
                        <input class="input" name="armadura" value="<?= $personagemSelecionado['armadura'] ?>">
                    </div>

                    <div class="column">
                        <label class="label">Velocidade</label>
                        <input class="input" name="velocidade" value="<?= $personagemSelecionado['velocidade'] ?>">
                    </div>
                </div>

                <div class="content">
                    <label class="label">História</label>
                    <textarea class="textarea" name="historia"><?= $personagemSelecionado['historia'] ?></textarea>
                </div>

                <div class="buttons mt-4">
                    <button type="submit" name="submit" value="Atualizar" class="button is-primary">
                        Atualizar
                    </button>

                    <button type="submit" name="excluir" class="button is-danger"
                            onclick="return confirm('Excluir personagem?')">
                        Excluir
                    </button>

                    <a class="button"
                       href="../Controllers/controllerFichaPersonagem.php?idP=<?= $idP ?>">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>