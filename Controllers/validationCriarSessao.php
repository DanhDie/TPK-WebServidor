<?php
    $nomeSessao=$dataSessao=$descSessao='';
    $sistemas = ["Dungeons & Dragons", "Ordem Paranormal", "Brutal", "Sacramento", "Assimilação"];
    $mestre="#User";

    # erros
    $uploadOk = 1;
    $errors=array('nome'=>'',
            'sistema'=>'',
            'imagem'=>'');

    # Lógica de validação dos campos
    # Formulário enviado
    if(isset($_POST["submit"])):
        # Nome tem que ser escrito
        if(empty($_POST['nome'])):
            $errors['nome']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nenhum nome inserido</p>';
        else:
            $campanhaNome=$_POST['nome'];
        endif;

        # A descrição é opcional
        $campanhaDesc=$_POST['desc'];

        # Imagens https://www.w3schools.com/php/php_file_upload.asp, não está em inglês por causa de IA
        # O CARA USANDO IA????? QUE FEIO
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
            # Image Upload via https://www.w3schools.com/php/php_file_upload.asp 
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

        # Sistema deve ser escolhido
        if(empty($_POST['sistema'])):
            $errors['sistema']='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Nenhum sistema escolhido</p>';
            else:
                $campanhaSistema=$_POST['sistema'];
        endif;
                
        if(array_filter($errors)){ # Procura por erros (lugares em branco)
                    
                } else{
                    # Se tudo foi preenchido,

                    # Upload real (ou não) da imagem https://www.w3schools.com/php/php_file_upload.asp
                    if ($uploadOk == 0) {
                        #echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } 
                        else {
                            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                                #echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            } else {
                                #echo "Sorry, there was an error uploading your file.";
                            }
                        }

                    # Atribuir informações a um array associativo (enquanto não há DB)
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