<?php
    $campanhaNome=$campanhaSistema=$campanhaDesc='';
    $sistemas = ["Dungeons & Dragons", "Ordem Paranormal", "Brutal", "Sacramento", "Assimilação"];
    $mestre="#User";

    # erro
    $errors=array('nome'=>'',
            'sistema'=>'');

    # Lógica de validação dos campos
    # Formulário enviado
    if(isset($_POST["submit"])):

        # Nome tem que ser escrito
        if(empty($_POST['nome'])):
            $errors['nome']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nenhum nome inserido</p>';
        else:
            $campanhaNome=$_POST['nome'];
        endif;

        # Sistema deve ser escolhido
        if(empty($_POST['sistema'])):
            $errors['sistema']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nenhum sistema escolhido</p>';
            else:
                $campanhaSistema=$_POST['sistema'];
        endif;
        
        # A descrição é opcional
                
        if(array_filter($errors)){ # Procura por erros (lugares em branco)
                    
                } else{
                    # Se tudo foi preenchido,
                    # Atribuir tudo isso a um array associativo (enquanto não há DB)
                    $campanha=['nome'=>$campanhaNome,
                                'sistema'=>$campanhaSistema,
                                'desc'=>$campanhaDesc];
                    
                    # De alguma forma compartilhar com o controllerCampanha, talvez algo como
                    # $campanhas.append($campanha);

                    # Retornar para a tela inciai
                    header('Location: controllerTelaInicial.php');
                    exit();
                }
    endif;
?>