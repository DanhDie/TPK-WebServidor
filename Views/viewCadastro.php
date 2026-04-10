
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <title>TPK - Cadastro</title>
</head>
<body class="">
    <main>
        
    <section class="section">
        <div class="container my-6">
            <div class="box has-text-centered">
                <h1 class="is-size-3 is-italic has-text-weight-bold has-text-primary">TPK</h1>
                <h2 class="is-size-6 has-text-weight-light">Seu gerenciador de campanhas</h2>
            </div>
            <form class="box" action="" method="POST">
                <label for="" class="is-size-5 label has-text-primary">CADASTRAR USUÁRIO</label>
                <div class="field">
                    <label class="label">Nome:</label>
                    <div class="control">
                    <input class="input" type="text" name="nome" placeholder="insira aqui seu nome" value="<?php echo $email ?>" />
                    </div>
                </div>
                <?php
                echo $errors['email'];                
                ?>
                <div class="field">
                    <label class="label">Email:</label>
                    <div class="control">
                    <input class="input" type="text" name="email" placeholder="exemplo@email.com" value="<?php echo $email ?>" />
                    </div>
                </div>
                <?php
                echo $errors['email'];                
                ?>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Senha:</label>
                            <div class="control">
                            <input value="<?php echo $senha ?>" class="input" type="text" name="senha" placeholder="********" />
                            </div>
                        </div>
                        <?php
                        echo $errors['senha'];                
                        ?>   
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Confirmar senha:</label>
                            <div class="control">
                            <input value="<?php echo $senha ?>" class="input" type="text" name="senhaConfirma" placeholder="********" />
                            </div>
                        </div>
                        <?php
                        echo $errors['senha'];                
                        ?>   
                    </div>
                </div>          

                <button >
                    <input class="button is-primary" name="submit" type="submit" value="Cadastrar">
                </button>

                <div class="mt-2">
                    <a href="../Controllers/controllerLogin.php" class="is-size-7 has-text-primary is-underlined">Já possui conta? Entre já!</a>
                </div>
                
            </form>
        </div>
    </section>