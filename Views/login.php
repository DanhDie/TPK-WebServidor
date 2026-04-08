
<?php
    $email=$senha='';
    $errors = array('email'=>'', 'senha'=>'');

    if(isset($_POST["submit"])):
        if(empty($_POST['email'])):
            $errors['email']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email nao preenchido.</p>';
        else:
            $email=$_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $errors['email']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email invalido.</p>';
            endif;
        endif;
        if(empty($_POST['senha'])):
                $errors['senha']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha nao preenchida.</p>';
        else:
            $senha=$_POST['senha'];
            if(!preg_match('/^.*\d.*$/', $senha)):
                $errors['senha']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha deve ser conter pelo menos um numero</p>';
            endif;
            if(!preg_match('/^.{8,}$/', $senha)):
                $errors['senha']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha deve ser conter mais que 8 caracteres</p>';
            endif;
            
        endif;
    endif;    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <title>TPK - Login</title>
</head>
<body class="">
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
                    <input class="mt-1 button is-primary" name="submit" type="submit" value="Enviar">
                </button>

                <div class="mt-2">
                    <a href="#" class="is-size-7 has-text-primary is-underlined">Não possui conta? Crie uma já!</a>
                </div>
                
            </form>
        </div>
    </section>

</body>
</html>