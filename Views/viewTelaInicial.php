<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
            Bem-vindo <?= $_SESSION['infoUser']['nome'] ?>
        </h1>

        <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Campanhas</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <civ class="container">
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <?php include("../Views/Templates/card.php"); ?>
                    </div>
                    <div class="column is-4">
                        <?php include("../Views/Templates/card.php"); ?>
                    </div>
                    <div class="column is-4">
                        <?php include("../Views/Templates/card.php"); ?>
                    </div>

                    <div class="column is-12">
                        <div class="content has-text-centered">
                            <a href="controllerCriarCampanha.php" class="button">Criar campanha</a>
                        </div>
                    </div>
                </div>
            </civ>
        </div>
    </div>
</section>