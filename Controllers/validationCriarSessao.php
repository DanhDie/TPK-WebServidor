<?php
    $sessaoInf=array('nomeSessao'=>'',
                  'dataSessao'=>'',
                  'descSessao'=>'');

    # erros
    $uploadOk = 1;
    $errors=array('nomeSessao'=>'',
            'dataSessao'=>'');

    # Lógica de validação dos campos
    # Formulário enviado
    if(isset($_POST["submit"])):
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
                
        if(array_filter($errors)){ # Procura por erros (lugares em branco)
                    
                } else{
                    # Se tudo foi preenchido,

                    # Pega ID pela URL
                    $idC = isset($_GET['idC']) ? $_GET['idC'] : null;

                    # Filtra a campanha pela ID 
                    # Se eu tivesse tempo eu usaria árvore binária de pesquisa por eficiência só pela piada
                    $chaveCampanhaAtual = null;
                    foreach ($usuario['campanhas'] as $key => $value) {
                        if ($value['idCampanha'] == $idC) {
                            $chaveCampanhaAtual = $key;
                            break;
                        }
                    }

                    # Com a campanha correta, verificação de segurança
                    if($chaveCampanhaAtual !== null) {
                        # Adiconar a sessoes se, existir alguma sessao no array de sessoes da campanha atual, se não array vazio
                        $sessoes = $usuario['campanhas'][$chaveCampanhaAtual]['sessoesCampanha'] ?? [];
                        # Pega a última sessão
                        $ultimaSessao = end($sessoes); 
                        # Descobre a nova ID
                        $id = array('idSessao' => $ultimaSessao ? $ultimaSessao['idSessao'] + 1 : 1); 

                        # Merge das informações para atribuir depois
                        $sessao=array_merge($sessaoInf,$id);
                        
                        # Agora dá para atribuir a nova sessão para o $sessoes com essa atribuição que é pra resolver problemas magicamente
                        $usuario['campanhas'][$chaveCampanhaAtual]['sessoesCampanha'][] = $sessao;
                        
                        # Salvar info
                        $_SESSION['infoUser'] = $usuario;

                        # Retornar para a tela inciai
                        header('Location: controllerTelaInicial.php');
                        exit();
                    }
                }
    endif;
?>