<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
            #campanha selecionada
        </h1>

        <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-size-7"><a href="../Controllers/controllerTelaInicial.php">Campanhas</a></li>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">#Campanha selecionada</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <div class="container">
                 <div class="columns">
                    <div class="column is-4">
                        <figure class="image is-4by3">
                            <img
                                src="https://placehold.co/400x300"
                                alt="Placeholder image"
                            />
                        </figure>
                    </div>
                    <div class="column is-8">
                        <div class="content">
                            <h1 class="is-size-5 has-text-weight-bold">#sistema</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus rem, mollitia sapiente fuga doloribus error repudiandae delectus magnam beatae itaque laborum laboriosam libero velit inventore eum. Animi vitae ab tempora.</p>
                            <button class="button">
                                <a class="has-text-primary" href="../Controllers/controllerEditarCampanha.php">Editar Campanha</a>
                            </button>
                            
                        </div>
                    </div>
                 </div>
                 <label for="" class="is-size-4 label has-text-primary">Sessões</label>
                 <hr>
                 <div class="content columns is-multiline">
                    
                    <div class="column is-3">
                           <?php
                           include("../Views/Templates/cardSession.php");
                           ?>                     
                    </div>
                    <div class="column is-3">
                           <?php
                           include("../Views/Templates/cardSession.php");
                           ?>                     
                    </div>
                    <div class="column is-3">
                           <?php
                           include("../Views/Templates/cardSession.php");
                           ?>                     
                    </div>
                    <div class="column is-3">
                           <?php
                           include("../Views/Templates/cardSession.php");
                           ?>                     
                    </div>
                    <div class="column is-3">
                           <?php
                           include("../Views/Templates/cardSession.php");
                           ?>                     
                    </div>
                </div>
                <div class="content">
                    <button class="button">
                        <a class="has-text-primary" href="../Controllers/controllerCriarSessao.php">Criar Sessão</a>
                    </button>
                </div>
                <label for="" class="is-size-4 label has-text-primary">Pesonagens</label>
                <hr>
                <div class=" content">
                    <div class="mt-1 columns is-multiline">
                        <div class="column is-3">
                            <?php
                            include("../Views/Templates/cardPersonagem.php");
                            ?>                     
                        </div>
                        <div class="column is-3">
                            <?php
                            include("../Views/Templates/cardPersonagem.php");
                            ?>                     
                        </div>
                        <div class="column is-3">
                            <?php
                            include("../Views/Templates/cardPersonagem.php");
                            ?>                     
                        </div>
                    </div>
                    <button class="button">
                        <a class="has-text-primary" href="#">Adicionar Pesonagem</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>