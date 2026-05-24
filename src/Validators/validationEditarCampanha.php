<?php

$campanhaNome = $campanhaSelecionada['nome'];
$campanhaDesc = $campanhaSelecionada['descricao'];
$campanhaSistema = $campanhaSelecionada['sistema'];

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

// =====================================
// EDITAR CAMPANHA
// =====================================
if (
    isset($_POST['submit']) &&
    $_POST['submit'] === "Finalizar"
) {

    // ==========================
    // NOME
    // ==========================
    if (empty(trim($_POST['nome']))) {

        $errors['nome'] =
            '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                Não pode ser vazio
            </p>';

    } else {

        $campanhaNome = trim($_POST['nome']);
    }

    // ==========================
    // DESCRIÇÃO
    // ==========================
    $campanhaDesc = trim($_POST['desc']);

    // ==========================
    // SISTEMA
    // ==========================
    if (empty($_POST['sistema'])) {

        $errors['sistema'] =
            '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                Escolha um sistema
            </p>';

    } else {

        $campanhaSistema = $_POST['sistema'];
    }

    // ==========================
    // IMAGEM
    // ==========================
    $caminhoImagem = $campanhaSelecionada['imagem'];

    if (
        isset($_FILES['imagem']) &&
        $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE
    ) {

        $targetDir = __DIR__ . "/../../public/uploads/";

        if (!is_dir($targetDir)) {

            mkdir($targetDir, 0777, true);
        }

        $nomeArquivo =
            time() . "_" . basename($_FILES["imagem"]["name"]);

        $targetFile = $targetDir . $nomeArquivo;

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

                $caminhoImagem =
                    BASE_URL . "/uploads/" . $nomeArquivo;
            }
        }
    }

    // ==========================
    // SEM ERROS
    // ==========================
    if (!array_filter($errors)) {

        try {

            $queryUpdate = $bd->prepare("
                UPDATE campanha
                SET
                    nome = :nome,
                    descricao = :descricao,
                    sistema = :sistema,
                    imagem = :imagem
                WHERE id = :id
            ");

            $queryUpdate->bindValue(':nome', $campanhaNome);
            $queryUpdate->bindValue(':descricao', $campanhaDesc);
            $queryUpdate->bindValue(':sistema', $campanhaSistema);
            $queryUpdate->bindValue(':imagem', $caminhoImagem);
            $queryUpdate->bindValue(':id', $idC);

            $queryUpdate->execute();

            header("Location: " . BASE_URL . "/campanha?idC=$idC");
            exit();

        } catch (PDOException $e) {

            die("Erro ao editar campanha: " . $e->getMessage());
        }
    }
}

// =====================================
// EXCLUIR CAMPANHA
// =====================================
if (
    isset($_POST['submit']) &&
    $_POST['submit'] === "Excluir"
) {

    try {

        $queryDelete = $bd->prepare("
            DELETE FROM campanha
            WHERE id = :id
        ");

        $queryDelete->bindValue(':id', $idC);

        $queryDelete->execute();

        header("Location: " . BASE_URL . "/telaInicial");
        exit();

    } catch (PDOException $e) {

        die("Erro ao excluir campanha: " . $e->getMessage());
    }
}