<?php
    $email=$senha='';
    $errors = array('email'=>'', 'senha'=>'');
    $users=array(
        ['email'=>'joao@gmail.com',
        'senha'=>'senha1234'],
        ['email'=>'maria@hotmail.com',
        'senha'=>'mariazinha69'],
    );

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

        if(!empty($senha) && !empty($email)){
            $usuarioEncontrado= false;
            $senhaCorreta=false;
            foreach($users as $user){
                if($user['email']===$email){
                    $usuarioEncontrado= true;
                    if($user['senha']===$senha){
                        $senhaCorreta=true;
                    }
                }
                break;
            }
            if(!$usuarioEncontrado){
                $errors['email']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Usuario nao encontrado.</p>';
            } elseif(!$senhaCorreta){
                $errors['senha']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senha incorreta</p>';
                $senha='';
            }
        }

        if(array_filter($errors)){
            
        } else{
            header('Location: controllerTelaInicial.php');
            exit();
        }
    endif;    
?>