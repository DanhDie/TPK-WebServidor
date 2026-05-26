<?php
// Require onces do mapeamento
require_once __DIR__ . '/../vendor/autoload.php';


//echo $_SERVER["REQUEST_URI"];
//Localmente pelo XAMPP: localhost/TPK-WebServidor/public/ 
$base = "/TPK-WebServidor/public";

// Rotas definidas pelo usuÃ¡rio
$rotas = [
    "/" =>  __DIR__ ."/../src/Controllers/controllerLogin.php",
    "/telaInicial" =>  __DIR__ ."/../src/Controllers/controllerTelaInicial.php",
    "/campanha" =>  __DIR__ ."/../src/Controllers/controllerCampanha.php",
    "/sessao" =>  __DIR__ ."/../src/Controllers/controllerSessao.php",
    "/personagens" =>  __DIR__ ."/../src/Controllers/controllerPersonagens.php",
    "/perfil" =>  __DIR__ ."/../src/Controllers/controllerPerfil.php",
    "/login" =>  __DIR__ ."/../src/Controllers/controllerLogin.php",
    "/ficha" =>  __DIR__ ."/../src/Controllers/controllerFichaPersonagem.php",
    "/editarSessao" =>  __DIR__ ."/../src/Controllers/controllerEditarSessao.php",
    "/editarCampanha" =>  __DIR__ ."/../src/Controllers/controllerEditarCampanha.php",
    "/editarPersonagem" =>  __DIR__ ."/../src/Controllers/controllerEditarPersonagem.php",
    "/criarSessao" =>  __DIR__ ."/../src/Controllers/controllerCriarSessao.php",
    "/criarPersonagem" =>  __DIR__ ."/../src/Controllers/controllerCriarPersonagem.php",
    "/criarCampanha" =>  __DIR__ ."/../src/Controllers/controllerCriarCampanha.php",
    "/cadastro" =>  __DIR__ ."/../src/Controllers/controllerCadastro.php",
    "/logout" => __DIR__ . "/../src/Controllers/logout.php"

];



// URL que usuÃ¡rio tÃ¡ tentando acessar
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

# Remove o link basico do diretorio, agora o link pode ser qualquer um, e o que importa Ã© a rota
$url = str_replace($base, "", $url);

if($url == "" || $url == "/index.php"){
    $url = "/";
}

// Carregar o controller correspondente a rota
if(array_key_exists($url, $rotas)){
    require($rotas[$url]);
}
else{
    echo "Erro 404! PÃ¡gina nÃ£o existe :3";
}
//Futuramente caso ele ja esteja logado mandamos para a pagina principal
//Por enquanto manda direto para Login
#header("Location: ../Controllers/controllerLogin.php");
