
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <title>TPK - Login</title>
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
                <div class="field">
                    <label class="label">Email:</label>
                    <div class="control">
                    <input class="input" type="text" name="email" placeholder="exemplo@email.com" value="<?php echo $email ?>" />
                    </div>
                </div>
                <?php
                echo $errors['email'];                
                ?>

                <div class="field">
                    <label class="label">Senha:</label>
                    <div class="control">
                    <input value="<?php echo $senha ?>" class="input" type="text" name="senha" placeholder="********" />
                    </div>
                </div>
                <?php
                echo $errors['senha'];                
                ?>             

                <button >
                    <input class="mt-1 button is-primary" name="submit" type="submit" value="Entrar">
                </button>

                <div class="mt-2">
                    <a href="../Controllers/controllerCadastro.php" class="is-size-7 has-text-primary is-underlined">Não possui conta? Crie uma já!</a>
                </div>
                
            </form>
        </div>
    </section>