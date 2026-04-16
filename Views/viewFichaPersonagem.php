<?php
    // Por agum motivo quando cria o personagem vem sem os dados que sao numeros
    //print so pra ver 
    print_r($personagemSelecionado);
    function calcularModificador($numero){
        $mod=floor(($numero-10)/2);
        if($numero>10){
            return '+'.$mod;
        }
        else{
            return $mod;
        }
        
    }
?>
<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
                <?= $personagemSelecionado['nome'] ?>
            </h1>

            <div class="mb-3 mx-2">
                <nav class="breadcrumb has-bullet-separator">
                    <ul>
                        <li class="is-size-7">
                            <a href="../Controllers/controllerPersonagens.php">Personagens</a>
                        </li>

                        <li class="is-active is-size-7 has-text-primary">
                            <a href="#">
                                <?= $personagemSelecionado['nome'] ?>
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
                        <figure class="image is-1by1">
                            <img src="https://placehold.co/300x300">
                        </figure>
                    </div>

                    <div class="column is-8">
                        <div class="content">

                            <div class="columns is-multiline">
                                <div class="column is-8">
                                    <h1 class="is-size-5 has-text-weight-bold">
                                        <?= $personagemSelecionado['nome'] ?>
                                    </h1>
                                </div>

                                <div class="column is-4">
                                    <h1 class="is-size-5 has-text-weight-bold">
                                        Nível: <?= $personagemSelecionado['level'] ?>
                                    </h1>
                                </div>
                                <div class="column is-4">
                                    <p><strong>Classe:</strong> <?= $personagemSelecionado['classe'] ?></p>
                                </div>
                                <div class="column is-4">
                                    <p><strong>Subclasse:</strong> <?= $personagemSelecionado['subclasse'] ?></p>
                                </div>
                            </div>

                            
                            

                        </div>

                        <div class="columns is-multiline">

                            <?php
                            $atributos = [
                                'FOR' => 'forca',
                                'DEX' => 'destreza',
                                'CON' => 'constituicao',
                                'INT' => 'inteligencia',
                                'SAB' => 'sabedoria',
                                'CAR' => 'carisma'
                            ];

                            foreach ($atributos as $sigla => $key):
                                $mod = calcularModificador((int)$personagemSelecionado[$key]);
                            ?>
                                <div class="column is-2">
                                    <div class="box has-text-centered py-1">
                                        <h1 class="is-size-7 has-text-weight-light"><?= $sigla ?></h1>
                                        <h2 class="is-size-3 has-text-primary has-text-weight-bold">
                                            <?= $mod ?>
                                        </h2>
                                        <h2 class="is-size-6 has-text-weight-light">
                                            <?= $personagemSelecionado[$key] ?>
                                        </h2>
                                       <!--Aqui precisa fazer o calculo dos atributos-->
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="box has-text-centered">
                                    <h2 class="is-size-7 has-text-weight-light"">
                                        VIDA: 
                                    </h2>
                                    <h1 class="is-size-3 has-text-primary has-text-weight-bold"><?= $personagemSelecionado['vida'] ?>
                                    </h1>
                                </div>
                            </div>

                            <div class="column">
                                <div class="box has-text-centered">
                                    <h2 class="is-size-7 has-text-weight-light"">
                                        ARMADURA: 
                                    </h2>
                                    <h1 class="is-size-3 has-text-primary has-text-weight-bold"><?= $personagemSelecionado['armadura'] ?>
                                    </h1>
                                </div>
                            </div>

                            <div class="column">
                                <div class="box has-text-centered">
                                    <h2 class="is-size-7 has-text-weight-light"">
                                        VELOCIDADE: 
                                    </h2>
                                    <h1 class="is-size-3 has-text-primary has-text-weight-bold"><?= $personagemSelecionado['velocidade'] ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <label class="label has-text-primary">História:</label>
                <hr>

                <div class="content">
                    <p><?= $personagemSelecionado['historia'] ?></p>
                </div>

                <a class="button has-text-primary"
                   href="../Controllers/controllerEditarPersonagem.php?idP=<?= $personagemSelecionado['idPersonagem'] ?>">
                    Editar Personagem
                </a>

            </div>
        </div>
    </div>
</section>