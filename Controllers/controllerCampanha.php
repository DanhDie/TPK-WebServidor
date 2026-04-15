<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
}

include("../Views/Templates/header.php");

foreach($usuario['campanhas'] as $camp){
    if($camp['idCampanha']==$id){
        $campanhaSelecionada=$camp;
        break;
    }
}


include("../Views/viewCampanha.php");

include("../Views/Templates/footer.php");