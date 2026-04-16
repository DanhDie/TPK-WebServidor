<?php

$sessaoInf=array('nomeSessao'=>'',
                  'dataSessao'=>'',
                  'resumoSessao'=>'');

# erros
$errors=array('nomeSessao'=>'',
            'dataSessao'=>'');

    if (isset($_POST['finalizar'])) {
        //pqp, talvez com Banco fique mais bonito?
        # Passa por todos os campos de sessaoInf para verificar se tá preenchido
        foreach($sessaoInf as $key => $value) {
            if(empty($_POST[$key])): # Verifica se tá vazio

                if(array_key_exists($key,$errors)): # Vazio e obrigatório
                    $errors[$key]='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';

                else: # Vazio e não obrigatório
                    $sessaoInf[$key]='N/A';
                endif;
            
            else: # Não vazio
                $sessaoInf[$key]=$_POST[$key];
            endif; 
        }

        # Verifica se tem erros
        if(array_filter($errors)){} 
        else{
            # Atribuir os valores ao local da sessao para poder alterar
            $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['nomeSessao'] = $sessaoInf['nomeSessao'];
            $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['dataSessao'] = $sessaoInf['dataSessao'];
            $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]['resumoSessao'] = $sessaoInf['resumoSessao'];

            $_SESSION['infoUser'] = $usuario;

            header("Location: controllerSessao.php?idC=$idC&idS=$idS");
            exit;
        }
    }

    if (isset($_POST['excluir'])) {

        unset($usuario['campanhas'][$campanhaIndex]['sessoesCampanha'][$sessaoIndex]);
        
        $usuario['campanhas'][$campanhaIndex]['sessoesCampanha'] =
            array_values($usuario['campanhas'][$campanhaIndex]['sessoesCampanha']);

        $_SESSION['infoUser'] = $usuario;

        header("Location: controllerCampanha.php?idC=$idC");
        exit;
    }