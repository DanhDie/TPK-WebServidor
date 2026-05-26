<?php

$sessaoInf = [
    'nome' => '',
    'data_sessao' => '',
    'resumo' => ''
];

$errors = [
    'nome' => '',
    'data_sessao' => ''
];

if (isset($_POST["submit"])) {

    foreach ($sessaoInf as $key => $value) {

        if (empty($_POST[$key])) {

            if (array_key_exists($key, $errors)) {

                $errors[$key] =
                    '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">
                        Campo obrigatório
                    </p>';

            } else {

                $sessaoInf[$key] = 'N/A';
            }

        } else {

            $sessaoInf[$key] = trim($_POST[$key]);
        }
    }

    if (!array_filter($errors)) {

        try {

            $query = $bd->prepare("
                INSERT INTO sessao
                (
                    nome,
                    data_sessao,
                    resumo,
                    campanha_id
                )
                VALUES
                (
                    :nome,
                    :data_sessao,
                    :resumo,
                    :campanha_id
                )
            ");

            $query->bindValue(':nome', $sessaoInf['nome']);
            $query->bindValue(':data_sessao', $sessaoInf['data_sessao']);
            $query->bindValue(':resumo', $sessaoInf['resumo']);
            $query->bindValue(':campanha_id', $idC);

            $query->execute();

            header('Location: ' . BASE_URL . '/campanha?idC=' . $idC);
            exit();

        } catch (PDOException $e) {

            die("Erro ao criar sessão: " . $e->getMessage());
        }
    }
}