<?php
echo $_SERVER["REQUEST_URI"];
//Localmente pelo XAMPP: localhost/TPK-WebServidor/public/ 
$base = "/TPK-WebServidor/public";

// Rotas definidas pelo usuário
$rotas = [
    "/" =>  __DIR__ ."/../Controllers/controllerLogin.php",
    "/telaInicial" =>  __DIR__ ."/../Controllers/controllerTelaInicial.php",
    "/campanha" =>  __DIR__ ."/../Controllers/controllerCampanha.php",
    "/sessao" =>  __DIR__ ."/../Controllers/controllerSessao.php",
    "/personagem" =>  __DIR__ ."/../Controllers/controllerPersonagem.php",
    "/perfil" =>  __DIR__ ."/../Controllers/controllerPerfil.php",
    "/login" =>  __DIR__ ."/../Controllers/controllerLogin.php",
    "/ficha" =>  __DIR__ ."/../Controllers/controllerFichaPersonagem.php",
    "/editarSessao" =>  __DIR__ ."/../Controllers/controllerEditarSessao.php",
    "/editarCampanha" =>  __DIR__ ."/../Controllers/controllerEditarCampanha.php",
    "/editarPersonagem" =>  __DIR__ ."/../Controllers/controllerEditarPersonagem.php",
    "/criarSessao" =>  __DIR__ ."/../Controllers/controllerCriarSessao.php",
    "/criarPersonagem" =>  __DIR__ ."/../Controllers/controllerCriarPersonagem.php",
    "/criarCampanha" =>  __DIR__ ."/../Controllers/controllerCriarCampanha.php",
    "/cadastro" =>  __DIR__ ."/../Controllers/controllerCadastro.php",

];



// URL que usuário tá tentando acessar
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

# Remove o link basico do diretorio, agora o link pode ser qualquer um, e o que importa é a rota
$url = str_replace($base, "", $url);

if($url == "" || $url == "/index.php"){
    $url = "/";
}

// Carregar o controller correspondente a rota
if(array_key_exists($url, $rotas)){
    require($rotas[$url]);
}
else{
    echo "Erro 404! Página não existe :3";
}
//Futuramente caso ele ja esteja logado mandamos para a pagina principal
//Por enquanto manda direto para Login
#header("Location: ../Controllers/controllerLogin.php");