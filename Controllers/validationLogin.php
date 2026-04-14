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

        session_start();
        
        if(!empty($_SESSION['logado']) && $_SESSION['logado']){
            header('Location: controllerTelaInicial.php');
            exit();
        }

        if(!empty($senha) && !empty($email)){
            $usuarioEncontrado= false;
            $senhaCorreta=false;
            foreach($users as $user){
                if($user['email']===$email){
                    $usuarioEncontrado= true;
                    if($user['senha']===$senha){
                        $senhaCorreta=true;
                        $_SESSION['logado']=true;
                        $_SESSION['infoUser']=$user;
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