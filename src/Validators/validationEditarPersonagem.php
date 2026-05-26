<?php

$personagemDesc = array(
    'nome' => $personagemSelecionado['nome'],
    'classe' => $personagemSelecionado['classe'],
    'subclasse' => $personagemSelecionado['subclasse'],
    'historia' => $personagemSelecionado['historia']
);

$personagemStats = array(
    'level' => $personagemSelecionado['level'],
    'forca' => $personagemSelecionado['forca'],
    'destreza' => $personagemSelecionado['destreza'],
    'constituicao' => $personagemSelecionado['constituicao'],
    'inteligencia' => $personagemSelecionado['inteligencia'],
    'sabedoria' => $personagemSelecionado['sabedoria'],
    'carisma' => $personagemSelecionado['carisma'],
    'vida' => $personagemSelecionado['vida'],
    'armadura' => $personagemSelecionado['armadura'],
    'velocidade' => $personagemSelecionado['velocidade']
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
    'vida'=> '',
    'armadura' => '',
    'velocidade' => ''
);

if (isset($_POST['submit']) && $_POST['submit'] === "Atualizar") {

    foreach ($personagemDesc as $key => $value) {

        if (empty($_POST[$key])) {

            if (array_key_exists($key, $errors)) {
                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';
            } else {
                $personagemDesc[$key] = 'N/A';
            }

        } else {

            $personagemDesc[$key] = trim($_POST[$key]);
        }
    }

    foreach ($personagemStats as $key => $value) {

        if (empty($_POST[$key])) {

            $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';

        } else {

            if (!is_numeric($_POST[$key])) {

                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">O campo deve conter um número</p>';

            } else {

                $personagemStats[$key] = trim($_POST[$key]);
            }
        }
    }

    if (!array_filter($errors)) {

        try {

            $bd = Conexao::get();

            $query = $bd->prepare("
                UPDATE personagem
                SET
                    nome = :nome,
                    classe = :classe,
                    subclasse = :subclasse,
                    historia = :historia,
                    level = :level,
                    forca = :forca,
                    destreza = :destreza,
                    constituicao = :constituicao,
                    inteligencia = :inteligencia,
                    sabedoria = :sabedoria,
                    carisma = :carisma,
                    vida = :vida,
                    armadura = :armadura,
                    velocidade = :velocidade
                WHERE id = :id
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

            $query->bindValue(':id', $idP);

            $query->execute();

            header("Location: " . BASE_URL . "/ficha?idP=$idP");
            exit;

        } catch(PDOException $e) {

            die("Erro no banco: " . $e->getMessage());
        }
    }
}

if (isset($_POST['excluir'])) {

    try {

        $bd = Conexao::get();

        $query = $bd->prepare("
            DELETE FROM personagem
            WHERE id = :id
        ");

        $query->bindValue(':id', $idP);

        $query->execute();

        header("Location: " . BASE_URL . "/personagens");
        exit;

    } catch(PDOException $e) {

        die("Erro no banco: " . $e->getMessage());
    }
}