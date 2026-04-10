<section class="container">
    <div class="container">
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">CRIAR CAMPANHA</h1>
        
        <div class="is-primary">
            <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="#">Campanhas</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Criar Campanha</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <div class="container">
                <!--Informações de formulário-->
                <form action="POST">
                    <div class="content">
                        <label class="label">Nome da Campanha: </label>
                        <input class="input is-normal" type="text"  <?php echo $campanhaNome?>> 
                    </div>

                    <div class="content">
                        <label class="label">Descrição: </label>
                        <textarea class="textarea" rows="5" cols="80" id="TITLE"></textarea>
                    </div>

                    <div class="content">
                        <label class="label">Imagem: </label>
                        <div class="file has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="arquivo" />
                                <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label"> Insira um arquivo... </span>
                                </span>
                                <span class="file-name"> Screen Shot 2017-07-29 at 15.54.25.png </span>
                            </label>
                        </div>
                    </div>

                    <div class="content">
                        <label class="label">Sistema utilizado: </label>
                        <div class="control select">
                            <select required <?php echo $campanhaSistema?>>
                                <option disabled selected value> -- Selecione um Sistema -- </option>
                                <?php 
                                    foreach($sistemas as $sistema){
                                        echo "<option>".$sistema."</option>";
                                    }
                                ?>
                            </select>
                        </div>
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