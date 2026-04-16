<?php
    # Por escrito
    $personagemDesc=array('nome'=>'',
                          'classe'=>'',
                          'subclasse'=>'',
                          'historia'=>'');

    # Por números
    $personagemStats=array('level'=>'',
            'forca'=>'',
            'destreza'=>'',
            'constituicao'=>'',
            'inteligencia'=>'',
            'sabedoria'=>'',
            'carisma'=>'',
            'vida'=>'',
            'armadura'=>'',
            'velocidade'=>'');

    # erros
    $uploadOk = 1;
    $errors=array('nome'=>'',
            'level'=>'',
            'classe'=>'',
            'forca'=>'',
            'destreza'=>'',
            'constituicao'=>'',
            'inteligencia'=>'',
            'sabedoria'=>'',
            'carisma'=>'',
            'vida'=>'',
            'armadura'=>'',
            'velocidade'=>'');

    # Lógica de validação dos campos
    # Formulário enviado
    if(isset($_POST["submit"])):
        # Passa por todos os campos de personagemDesc para verificar se tá preenchido
        foreach($personagemDesc as $key => $value) {
            if(empty($_POST[$key])): # Verifica se tá vazio

                if(array_key_exists($key,$errors)): # Vazio e obrigatório
                    $errors[$key]='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';

                else: # Vazio e não obrigatório
                    $personagemDescs[$key]='N/A';
                endif;


            
            else: # Não vazio
                $personagemDesc[$key]=$_POST[$key];
            endif; 
        }
        
        # Passa por todos os campos de personagemStats para verificar se tá preenchido E se se tratam de números
        foreach($personagemStats as $key => $value) {
            if(empty($_POST[$key])): # Verifica se tá vazio

                if(array_key_exists($key,$errors)): # Vazio e obrigatório
                    $errors[$key]='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';
                endif;

                if(is_numeric($_POST[$key])):
                    $errors[$key]='<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">O campo deve conter um número</p>';
                endif;
            
            else: # Não vazio
                $personagemDesc[$key]=$_POST[$key];
            endif; 
        }

        # Imagens https://www.w3schools.com/php/php_file_upload.asp, não está em inglês por causa de IA
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
                                $imagem = array("imagem"=> $target_file);

                            } else {
                                #echo "Sorry, there was an error uploading your file.";
                            }
                        }

                    # Gerar ID única da sessão
                    #$ultimoPersonagem = end($usuario['personagens']);

                    #$id = $ultimoPersonagem ? $ultimoPersonagem['idPersonagem']+1 : 1;

                    # Merge de todas as informações
                    $personagem=array_merge($imagem, $personagemDesc, $personagemStats);

                    # Atribuir $personagem aos personagens do usuário
                    array_push($usuario['personagens'],$personagem);

                    # Salvar info
                    $_SESSION['infoUser'] = $usuario;

                    # Retornar para a tela de personagens
                    header('Location: controllerPersonagens.php');
                    exit();
                }
    endif;
?>