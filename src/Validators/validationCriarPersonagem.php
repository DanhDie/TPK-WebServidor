<?php

require_once __DIR__ . "/../../bootstrap.php";

$target_file = null;

$personagemDesc = array(
    'nome' => '',
    'classe' => '',
    'subclasse' => '',
    'historia' => ''
);

$personagemStats = array(
    'level' => '',
    'forca' => '',
    'destreza' => '',
    'constituicao' => '',
    'inteligencia' => '',
    'sabedoria' => '',
    'carisma' => '',
    'vida' => '',
    'armadura' => '',
    'velocidade' => ''
);

$errors = array(
    'nome' => '',
    'level' => '',
    'classe' => '',
    'forca' => '',
    'destreza' => '',
    'constituicao' => '',
    'inteligencia' => '',
    'sabedoria' => '',
    'carisma' => '',
    'vida' => '',
    'armadura' => '',
    'velocidade' => '',
    'imagem' => ''
);

if(isset($_POST["submit"])):

    foreach($personagemDesc as $key => $value){

        if(empty($_POST[$key])){

            if(array_key_exists($key, $errors)){
                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';
            } else {
                $personagemDesc[$key] = 'N/A';
            }

        } else {
            $personagemDesc[$key] = trim($_POST[$key]);
        }
    }

    foreach($personagemStats as $key => $value){

        if(empty($_POST[$key])){

            $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';

        } else {

            if(!is_numeric($_POST[$key])){

                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">O campo deve conter um número</p>';

            } else {

                $personagemStats[$key] = trim($_POST[$key]);
            }
        }
    }

    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE){

        $target_dir = __DIR__ . "/../../resources/ImageUploads/";

        if(!is_dir($target_dir)){
            mkdir($target_dir, 0777, true);
        }

        $nomeArquivo = time() . "_" . basename($_FILES["imagem"]["name"]);

        $target_file = $target_dir . $nomeArquivo;

        $check = getimagesize($_FILES["imagem"]["tmp_name"]);

        if($check === false){
            $errors['imagem'] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Arquivo inválido</p>';
        }
    }

    if(!array_filter($errors)){

        $imagemBanco = null;

        if($target_file){

            if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)){

                $imagemBanco = BASE_URL . "/resources/ImageUploads/" . $nomeArquivo;
            }
        }

        try{

            $bd = Conexao::get();

            $query = $bd->prepare("
                INSERT INTO personagem (
                    nome,
                    classe,
                    subclasse,
                    historia,
                    level,
                    forca,
                    destreza,
                    constituicao,
                    inteligencia,
                    sabedoria,
                    carisma,
                    vida,
                    armadura,
                    velocidade,
                    usuario_id
                ) VALUES (
                    :nome,
                    :classe,
                    :subclasse,
                    :historia,
                    :level,
                    :forca,
                    :destreza,
                    :constituicao,
                    :inteligencia,
                    :sabedoria,
                    :carisma,
                    :vida,
                    :armadura,
                    :velocidade,
                    :usuario_id
                )
            ");

            $query->bindValue(':nome', $personagemDesc['nome']);
            $query->bindValue(':classe', $personagemDesc['classe']);
            $query->bindValue(':subclasse', $personagemDesc['subclasse']);
            $query->bindValue(':historia', $personagemDesc['historia']);
            $query->bindValue(':level', $personagemStats['level']);
            $query->bindValue(':forca', $personagemStats['forca']);
            $query->bindValue(':destreza', $personagemStats['destreza']);
            $query->bindValue(':constituicao', $personagemStats['constituicao']);
            $query->bindValue(':inteligencia', $personagemStats['inteligencia']);
            $query->bindValue(':sabedoria', $personagemStats['sabedoria']);
            $query->bindValue(':carisma', $personagemStats['carisma']);
            $query->bindValue(':vida', $personagemStats['vida']);
            $query->bindValue(':armadura', $personagemStats['armadura']);
            $query->bindValue(':velocidade', $personagemStats['velocidade']);
            $query->bindValue(':usuario_id', $_SESSION['infoUser']['id']);

            $query->execute();

            header('Location: ' . BASE_URL . '/personagens');
            exit();

        } catch(PDOException $e){

            die("Erro no banco: " . $e->getMessage());
        }
    }

endif;