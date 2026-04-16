<?php

$campanhaNome = $campanhaSelecionada['nomeCampanha'];
$campanhaDesc = $campanhaSelecionada['descCampanha'];
$campanhaSistema = $campanhaSelecionada['sistemaCampanha'];

$sistemas = ["Dungeons & Dragons", "Ordem Paranormal", "Brutal", "Sacramento", "Assimilação"];

$errors=array('nome'=>'',
              'sistema'=>'',
              'imagem'=>'');


if (isset($_POST['submit']) && $_POST['submit'] === "Finalizar") {
        if(empty($_POST['nome'])):
            $errors['nome']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Não pode ser vazio</p>';
        else:
            $campanhaNome = $_POST['nome'];
        endif;
        
        $campanhaDesc = $_POST['desc'];

        $campanhaSistema = $_POST['sistema'];

        if (!empty($_FILES['imagem']['name'])) {
                # Isso aqui tá sendo utilizado em três arquivos diferentes, se eu fosse gente eu fazia um outro arquivo que trataria isso, mas eu não tenho muito tempo
                $target_dir = "../Views/ImageUploads/";
                $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                # Checagem de imagem ser imagem! https://www.w3schools.com/php/php_file_upload.asp
                $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                if($check !== false) {
                    #echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $errors['imagem'] = 'O arquivo não é uma imagem válida.';
                    $uploadOk = 0;
                }
        }

        if(array_filter($errors)){} # Se tem problemas, não deixa seguir em frente
        else{ # Se tá tudo certo, atribui tudo
            # Atribuição da imagem
            if ($uploadOk == 1 && isset($target_file)) {
                // if everything is ok, try to upload file
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                    $usuario['campanhas'][$campanhaIndex]['imagemCampanha'] = $target_file;
                }
            }
            
            # Atribuição das coisas
            $usuario['campanhas'][$campanhaIndex]['nomeCampanha'] = $campanhaNome;
            $usuario['campanhas'][$campanhaIndex]['descCampanha'] = $campanhaDesc;
            $usuario['campanhas'][$campanhaIndex]['sistemaCampanha'] = $campanhaSistema;

            $_SESSION['infoUser'] = $usuario;

            header("Location: controllerCampanha.php?idC=$idC");
            exit;
        }
        
        
}

if (isset($_POST['submit']) && $_POST['submit'] === "Excluir") {
    unset($usuario['campanhas'][$campanhaIndex]);
    $usuario['campanhas'] = array_values($usuario['campanhas']);
    $_SESSION['infoUser'] = $usuario;
    header("Location: controllerTelaInicial.php");
    exit;
}