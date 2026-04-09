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
    
    <!--Informações de formulário-->
    <label>Nome da Campanha: </label>
    <input <?php echo $campanhaNome?>> 

    <label>Sistema utilizado: </label>
    <select required <?php echo $campanhaSistema?>>
        <option disabled selected value> -- Selecione um Sistema -- </option>
        <?php 
            foreach($sistemas as $sistema){
                echo "<option>".$sistema."</option>";
            }
        ?>
    </select>

    <label>Players: </label>
    <select multiple <?php echo $campanhaPlayers?>>
        <option disabled selected value> -- Adicione players  -- </option>
        <?php 
            foreach($players as $player){
                echo "<option>".$player."</option>";
            }
        ?>
    </select>

    <label>Personagem: </label>
    <select required <?php echo $campanhaPersonagem?>>
        <option disabled selected value> -- Selecione um Personagem -- </option>
        <option>* Ainda precisa fazer a lógica de ligação de personagem ao player e permitir acesso aqui</option>
    </select>

    <label>Descrição: </label>
    <textarea rows="5" cols="80" id="TITLE"></textarea>

    <!--Botão de Enviar-->
    <button >
        <input class="mt-1 button is-primary" name="submit" type="submit" value="Finalizar">
    </button>

</body>
</html>