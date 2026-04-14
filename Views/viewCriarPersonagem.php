<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">CRIAR PERSONAGEM</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerPersonagens.php">Personagens</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Criar Personagem</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <div class="container">
                <!--Informações de formulário-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="columns">
                        <div class="column is-8">
                            <div class="content">
                                <label class="label">Nome da Personagem: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $personagem['nome']?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Level: </label>
                                <input class="input is-normal" type="text" name="level" value="<?php echo $personagem['level']?>"> 
                            </div>
                            <?php
                            echo $errors['level'];                
                            ?>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Classe: </label>
                                <input class="input is-normal" type="text" name="classe" value="<?php echo $personagem['classe']?>"> 
                            </div>
                            <?php
                            echo $errors['classe'];                
                            ?>
                        </div>
                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Sub-classe: </label>
                                <input class="input is-normal" type="text" name="subclasse" value="<?php echo $personagem['subclasse']?>"> 
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Força: </label>
                                <input class="input is-normal" type="text" name="forca" value="<?php echo $personagem['forca']?>"> 
                            </div>
                            <?php
                            echo $errors['forca'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Destreza: </label>
                                <input class="input is-normal" type="text" name="destreza" value="<?php echo $personagem['destreza']?>"> 
                            </div>
                            <?php
                            echo $errors['destreza'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Constituição: </label>
                                <input class="input is-normal" type="text" name="constituicao" value="<?php echo $personagem['constituicao']?>"> 
                            </div>
                            <?php
                            echo $errors['constituicao'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Inteligência: </label>
                                <input class="input is-normal" type="text" name="inteligencia" value="<?php echo $personagem['inteligencia']?>"> 
                            </div>
                            <?php
                            echo $errors['inteligencia'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Sabedoria: </label>
                                <input class="input is-normal" type="text" name="sabedoria" value="<?php echo $personagem['sabedoria']?>"> 
                            </div>
                            <?php
                            echo $errors['sabedoria'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Carisma: </label>
                                <input class="input is-normal" type="text" name="carisma" value="<?php echo $personagem['carisma']?>"> 
                            </div>
                            <?php
                            echo $errors['carisma'];                
                            ?>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Vida Máxima: </label>
                                <input class="input is-normal" type="text" name="vida" value="<?php echo $personagem['vida']?>"> 
                            </div>
                            <?php
                            echo $errors['vida'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Armadura: </label>
                                <input class="input is-normal" type="text" name="armadura" value="<?php echo $personagem['armadura']?>"> 
                            </div>
                            <?php
                            echo $errors['armadura'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Velocidade de movimento: </label>
                                <input class="input is-normal" type="text" name="velocidade" value="<?php echo $personagem['velocidade']?>"> 
                            </div>
                            <?php
                            echo $errors['velocidade'];                
                            ?>
                        </div>
                    </div>

                    <div class="content">
                        <label class="label">Historia do Personagem: </label>
                        <textarea class="textarea" rows="5" cols="80" id="TITLE" name="historia" value="<?php echo $personagem['historia']?>"></textarea>
                    </div>

                    <div class="content">
                        <label class="label">Imagem: </label>
                        <div class="file has-name">
                            <label class="file-label">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <input  type="file" name="arquivo" />
                                </span>
                            </label>
                        </div>
                    </div>
                    <?php
                    echo $errors['imagem'];                
                    ?> 

                    <div class="content">
                        <!--Botão de Enviar-->
                    <button >
                        <input class="mt-1 button is-primary" name="submit" type="submit" value="Finalizar">
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
