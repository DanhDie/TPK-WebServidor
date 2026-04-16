<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">CRIAR SESSÃO</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerTelaInicial.php">Campanhas</a></li>
                <li class="is-size-7"><a href="../Controllers/controllerCampanha.php">#Campanha selecionada</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Criar sessao</a></li>
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
                                <label class="label">Nome da Sessão: </label>
                                <input class="input is-normal" type="text" name="nomeSessao" value="<?php echo $sessaoInf['nomeSessao']?>"> 
                            </div>
                            <?php
                            echo $errors['nomeSessao'];                
                            ?> 
                        </div>
                        <div class="column is-4">
                            <div class="content">
                                <label class="label">Data: </label>
                                <input class="input is-normal" type="text" name="dataSessao" value="<?php echo $sessaoInf['dataSessao']?>"> 
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $errors['dataSessao'];                
                    ?> 

                    <div class="content">
                        <label class="label">Resumo: </label>
                        <textarea class="textarea" rows="5" cols="80" id="TITLE" name="resumoSessao" value="<?php echo $sessaoInf['resumoSessao']?>"></textarea>
                    </div>
                    

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
