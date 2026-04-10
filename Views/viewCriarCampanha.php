<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Texto-->
    <h1>Criar campanha</h1>
    <h2>Insira os dados requisitados abaixo:</h2>
    
    <form class="box" action="" method="POST">
        <!--Informações de formulário-->
        <label>Nome da Campanha: </label>
        <input name="nome" value="<?php echo $campanhaNome?>">
        <?php
        echo $errors['nome'];                
        ?> 

        <label>Sistema utilizado: </label>
        <select name="sistema" value="<?php echo $campanhaSistema?>">
            <option disabled selected value> -- Selecione um Sistema -- </option>
            <?php 
                foreach($sistemas as $sistema){
                    echo "<option>".$sistema."</option>";
                }
            ?>
        </select>
        <?php
        echo $errors['sistema'];                
        ?>

        <label>Descrição: </label>
        <textarea name="desc" rows="5" cols="80" <?php echo $campanhaDesc?>></textarea>

        <!--Botão de Enviar-->
        <button >
            <input class="mt-1 button is-primary" name="submit" type="submit" value="Finalizar">
        </button>
    </form>
</body>
</html>