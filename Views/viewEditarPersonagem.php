<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">EDITAR PERSONAGEM</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerPersonagens.php">Personagens</a></li>
                <li class="is-size-7"><a href="../Controllers/controllerFichaPersonagem.php">#Personagem selecionado</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Editar Personagem</a></li>
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
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Level: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Classe: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-6">
                            <div class="content">
                                <label class="label">Sub-classe: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Força: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Destreza: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Constituição: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Inteligência: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Sabedoria: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-2">
                            <div class="content">
                                <label class="label">Carisma: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Vida Máxima: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Armadura: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Velocidade de movimento: </label>
                                <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                            </div>
                            <?php
                            echo $errors['nome'];                
                            ?>
                        </div>
                    </div>

                    <div class="content">
                        <label class="label">Historia do Personagem: </label>
                        <textarea class="textarea" rows="5" cols="80" id="TITLE" name="desc" value="<?php echo $campanhaDesc?>"><?php echo $campanhaDesc?></textarea>
                    </div>

                    <div class="content">
                        <label class="label">Substituir imagem: </label>
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
                        <button >
                            <input class="mt-1 button is-primary" name="submit" type="submit" value="Atualizar">
                        </button>
                        <button class="ml-2" >
                            <input class="mt-1 button is-danger" name="excluir" type="submit" value="Excluir">
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
