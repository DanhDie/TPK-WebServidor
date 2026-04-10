<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">EDITAR CAMPANHA</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerTelaInicial.php">Campanhas</a></li>
                <li class="is-size-7"><a href="../Controllers/controllerCampanha.php">#Campanha selecionada</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Editar Campanha</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <div class="container">
                <!--Informações de formulário-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="content">
                        <label class="label">Nome da Campanha: </label>
                        <input class="input is-normal" type="text" name="nome" value="<?php echo $campanhaNome?>"> 
                    </div>
                    <?php
                    echo $errors['nome'];                
                    ?> 

                    <div class="content">
                        <label class="label">Descrição: </label>
                        <textarea class="textarea" rows="5" cols="80" id="TITLE" name="desc" value="<?php echo $campanhaDesc?>"><?php echo $campanhaDesc?></textarea>
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
                        <label class="label">Sistema utilizado: </label>
                        <div class="control select">
                            <select name="sistema" value="<?php echo $campanhaSistema?>">
                                <option disabled selected value> -- Selecione um Sistema -- </option>
                                <?php 
                                    foreach($sistemas as $sistema){
                                        echo "<option>".$sistema."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    echo $errors['sistema'];                
                    ?>
                    

                    

                    <div class="content">
                        <!--Botão de Enviar-->
                    <button >
                        <input class="mt-1 button is-primary" name="submit" type="submit" value="Finalizar">
                    </button>
                    <button class="mx-3">
                        <input class="mt-1 button is-danger" name="submit" type="submit" value="Excluir">
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
