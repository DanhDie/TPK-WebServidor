<?php

$campanhaNome = '';
$campanhaSistema = '';
$campanhaDesc = '';

$sistemas = [
    "Dungeons & Dragons",
    "Ordem Paranormal",
    "Brutal",
    "Sacramento",
    "Assimilação"
];

$errors = [
    'nome' => '',
    'sistema' => '',
    'imagem' => ''
];

if (isset($_POST["submit"])) {

    $usuario = $_SESSION['infoUser'];

    if (empty(trim($_POST['nome']))) {

        $errors['nome'] =
            '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                Nenhum nome inserido
            </p>';

    } else {

        $campanhaNome = trim($_POST['nome']);
    }

    $campanhaDesc = trim($_POST['desc']);

    if (empty($_POST['sistema'])) {

        $errors['sistema'] =
            '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                Nenhum sistema escolhido
            </p>';

    } else {

        $campanhaSistema = $_POST['sistema'];
    }

    $caminhoImagem = null;

    if (
        isset($_FILES['imagem']) &&
        $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE
    ) {

        $targetDir = __DIR__ . "/../../public/uploads/";

        // cria pasta caso não exista
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $nomeArquivo = time() . "_" . basename($_FILES["imagem"]["name"]);

        $targetFile = $targetDir . $nomeArquivo;

        $imageFileType = strtolower(
            pathinfo($targetFile, PATHINFO_EXTENSION)
        );

        // Verifica imagem
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);

        if ($check === false) {

            $errors['imagem'] =
                '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                    O arquivo não é uma imagem válida.
                </p>';

        } else {

            if (
                move_uploaded_file(
                    $_FILES["imagem"]["tmp_name"],
                    $targetFile
                )
            ) {

                // caminho salvo no banco
                $caminhoImagem =
                    BASE_URL . "/uploads/" . $nomeArquivo;
            }
        }
    }

    if (!array_filter($errors)) {

        try {

            $bd = Conexao::get();

            $query = $bd->prepare("
                INSERT INTO campanha
                (
                    nome,
                    descricao,
                    imagem,
                    sistema,
                    usuario_id
                )
                VALUES
                (
                    :nome,
                    :descricao,
                    :imagem,
                    :sistema,
                    :usuario_id
                )
            ");

            $query->bindValue(':nome', $campanhaNome);
            $query->bindValue(':descricao', $campanhaDesc);
            $query->bindValue(':imagem', $caminhoImagem);
            $query->bindValue(':sistema', $campanhaSistema);
            $query->bindValue(':usuario_id', $usuario['id']);

            $query->execute();

            header('Location: ' . BASE_URL . '/telaInicial');
            exit();

        } catch (PDOException $e) {

            die("Erro ao criar campanha: " . $e->getMessage());
        }
    }
}