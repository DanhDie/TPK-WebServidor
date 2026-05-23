<?php
$personagemSelecionado = $usuario['personagens'][$personagemIndex];

# Por escrito
$personagemDesc = array(
    'nome' => $personagemSelecionado['nome'],
    'classe' => $personagemSelecionado['classe'],
    'subclasse' => $personagemSelecionado['subclasse'],
    'historia' => $personagemSelecionado['historia']
);
# Por números
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

# erros
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
    'velocidade' => '',
    'imagem' => ''
);

# Lógica de validação dos campos
# Formulário enviado
if (isset($_POST['submit']) && $_POST['submit'] === "Atualizar") {

    # Campos descritivos
    foreach ($personagemDesc as $key => $value) { 
        if (empty($_POST[$key])) {
            if (array_key_exists($key, $errors)) { # Se vazio e obrigatório
                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';
            } else { #Vazio e não obrigatório
                $personagemDesc[$key] = 'N/A';
            }
        } else { # Tudo certo
            $personagemDesc[$key] = $_POST[$key];
        }
    }

    # Campos numéricos
    foreach ($personagemStats as $key => $value) {
        if (empty($_POST[$key])) {
            if (array_key_exists($key, $errors)) { # vazio (todos os stats são obrigatórios)
                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">Campo obrigatório</p>';
            }
        } else {
            if (!is_numeric($_POST[$key])) { # Não é um numero
                $errors[$key] = '<p class="pb-2 is-size-7 has-text-danger has-text-weight-light">O campo deve conter um número</p>';
            } else { #Tudo certo
                $personagemStats[$key] = $_POST[$key];
            }
        }
    }

    # Validação de erros
    if (array_filter($errors)) {}
    else{

        # Mantém idPersonagem e atualiza o resto
        $usuario['personagens'][$personagemIndex] = array_merge(
            $personagemSelecionado,
            $personagemDesc,
            $personagemStats
        );

        $_SESSION['infoUser'] = $usuario;
        header("Location: controllerFichaPersonagem.php?idP=$idP");
        exit;
    }
}

if (isset($_POST['excluir'])) {
    unset($usuario['personagens'][$personagemIndex]);
    $usuario['personagens'] = array_values($usuario['personagens']);
    $_SESSION['infoUser'] = $usuario;
    header("Location: controllerPersonagens.php");
    exit;
}