<?php

$email = $senha = '';

$errors = array(
    'email' => '',
    'senha' => ''
);

if(isset($_POST['submit'])){

    // EMAIL
    if(empty($_POST['email'])){

        $errors['email'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email nao preenchido.</p>';

    } else{

        $email = trim($_POST['email']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $errors['email'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email invalido.</p>';
        }
    }

    // SENHA
    if(empty($_POST['senha'])){

        $errors['senha'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha nao preenchida.</p>';

    } else{

        $senha = $_POST['senha'];
    }

    // Se não houver erros
    if(!array_filter($errors)){

        try{

            $bd = Conexao::get();

            $query = $bd->prepare("
                SELECT *
                FROM usuario
                WHERE email = :email
            ");

            $query->bindValue(':email', $email);

            $query->execute();

            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            // Usuario encontrado
            if($usuario){

                // Verifica senha
                if($usuario['senha'] === $senha){

                    $_SESSION['logado'] = true;

                    $_SESSION['infoUser'] = array(
                        'id' => $usuario['id'],
                        'nome' => $usuario['nome'],
                        'email' => $usuario['email']
                    );

                    header('Location: ' . BASE_URL . '/telaInicial');
                    exit();

                } else{

                    $errors['senha'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha incorreta.</p>';
                }

            } else{

                $errors['email'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Usuario nao encontrado.</p>';
            }

        } catch(PDOException $e){

            die("Erro no banco: " . $e->getMessage());
        }
    }
}
?>