<?php

$email = $senha = $nome = $senhaConfirm = '';

$errors = array(
    'email' => '',
    'senha' => '',
    'nome' => '',
    'senhaConfirm' => ''
);

if(isset($_POST['submit'])){

    // NOME
    if(empty($_POST['nome'])){

        $errors['nome'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nome nao preenchido.</p>';

    } else{

        $nome = trim($_POST['nome']);
    }

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

        if(!preg_match('/^.*\d.*$/', $senha)){

            $errors['senha'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha deve conter pelo menos um numero.</p>';
        }

        if(!preg_match('/^.{8,}$/', $senha)){

            $errors['senha'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha deve conter pelo menos 8 caracteres.</p>';
        }
    }

    // CONFIRMAR SENHA
    if(empty($_POST['senhaConfirma'])){

        $errors['senhaConfirm'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Confirmacao de senha nao preenchida.</p>';

    } else{

        $senhaConfirm = $_POST['senhaConfirma'];

        if($senhaConfirm !== $senha){

            $errors['senhaConfirm'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senhas diferentes.</p>';
        }
    }

    // Se não houver erros
    if(!array_filter($errors)){

        try{

            $bd = Conexao::get();

            // Verifica email existente
            $query = $bd->prepare("
                SELECT id
                FROM usuario
                WHERE email = :email
            ");

            $query->bindValue(':email', $email);

            $query->execute();

            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            if($usuario){

                $errors['email'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email em uso.</p>';

            } else{

                // Cadastro
                $query = $bd->prepare("
                    INSERT INTO usuario (
                        nome,
                        email,
                        senha
                    )
                    VALUES (
                        :nome,
                        :email,
                        :senha
                    )
                ");

                $query->bindValue(':nome', $nome);
                $query->bindValue(':email', $email);
                $query->bindValue(':senha', $senha);

                $query->execute();

                $idUsuario = $bd->lastInsertId();

                $_SESSION['logado'] = true;

                $_SESSION['infoUser'] = array(
                    'id' => $idUsuario,
                    'nome' => $nome,
                    'email' => $email
                );

                header('Location: ' . BASE_URL . '/telaInicial');
                exit();
            }

        } catch(PDOException $e){

            die("Erro no banco: " . $e->getMessage());
        }
    }
}
?>