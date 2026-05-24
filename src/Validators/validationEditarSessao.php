<?php

$sessaoInf = [
    'nome' => $sessaoSelecionada['nome'],
    'data_sessao' => $sessaoSelecionada['data_sessao'],
    'resumo' => $sessaoSelecionada['resumo']
];

$errors = [
    'nome' => '',
    'data_sessao' => ''
];

if (isset($_POST['finalizar'])) {

    foreach ($sessaoInf as $key => $value) {

        if (empty($_POST[$key])) {

            if (array_key_exists($key, $errors)) {

                $errors[$key] =
                    '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                        Campo obrigatório
                    </p>';
            }

        } else {

            $sessaoInf[$key] = trim($_POST[$key]);
        }
    }

    if (!array_filter($errors)) {

        try {

            $query = $bd->prepare("
                UPDATE sessao
                SET
                    nome = :nome,
                    data_sessao = :data_sessao,
                    resumo = :resumo
                WHERE id = :id
            ");

            $query->bindValue(':nome', $sessaoInf['nome']);
            $query->bindValue(':data_sessao', $sessaoInf['data_sessao']);
            $query->bindValue(':resumo', $sessaoInf['resumo']);
            $query->bindValue(':id', $idS);

            $query->execute();

            header('Location: ' . BASE_URL . '/sessao?idC=' . $idC . '&idS=' . $idS);
            exit();

        } catch (PDOException $e) {

            die("Erro ao editar sessão: " . $e->getMessage());
        }
    }
}

if (isset($_POST['excluir'])) {

    try {

        $query = $bd->prepare("
            DELETE FROM sessao
            WHERE id = :id
        ");

        $query->bindValue(':id', $idS);

        $query->execute();

        header('Location: ' . BASE_URL . '/campanha?idC=' . $idC);
        exit();

    } catch (PDOException $e) {

        die("Erro ao excluir sessão: " . $e->getMessage());
    }
}