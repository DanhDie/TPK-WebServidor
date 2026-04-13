<?php
    $email=$senha=$nome=$senhaConfirm='';
    $errors = array('email'=>'', 'senha'=>'', 'nome'=>'', 'senhaConfirm'=>'');
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
            foreach($users as $user){
                if($user['email']=== $email){
                    $errors['email']= '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Email em uso.</p>';
                    break;
                }
            }
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
        if(empty($_POST['nome'])){
            $errors['nome']= '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nome nao preenchido.</p>';
        } else{
            $nome=$_POST['nome'];
        }
        if(empty($_POST['senhaConfirma'])):
            $errors['senhaConfirm']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Confirmação de senha nao preenchida.</p>';
        else:
            $senhaConfirm=$_POST['senhaConfirma'];
            if(strcmp($senhaConfirm, $senha)){
                $errors['senhaConfirm']= '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Senhas diferentes.</p>';
            }
        endif;

        if(array_filter($errors)){
            
        } else{
            $email=$senha=$nome=$senhaConfirm='';
            header('Location: controllerTelaInicial.php');
            exit();
        }
    endif;    
?>