<section class="container">
    <div class="container">
        
        <div class="is-primary">
            <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary mt-3 mx-2">
            Meu Perfil
        </h1>

        <div class="mb-3 mx-2">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
            <ul>
                <li class="is-active is-size-7 has-text-primary"><a href="#" aria-current="page">Perfil</a></li>
            </ul>
            </nav>
        </div>

        </div>
        <div class="box">
            <civ class="container">
                <div class="columns">
                    <div class="content column is-4">
                        <label for="" class="label">Nome:</label>
                        <p><?= $_SESSION['infoUser']['nome'] ?></p>
                    </div>
                    <div class="content column is-8">
                        <label for="" class="label">Email:</label>
                        <p><?= $_SESSION['infoUser']['email'] ?></p>
                    </div>
                </div>
                
                <div class="columns is-multiline">
                    <div class="content column">
                        <button class="button is-danger">
                            <a  class="has-text-dark" href="../Controllers/logout.php">SAIR</a>
                        </button>
                    </div>
                </div>
            </civ>
        </div>
    </div>
</section>