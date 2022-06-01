<?php

    require 'servidor.php';
    require 'chamado.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $chamado = new chamado($mysql);
        $chamado->remover($_POST['id']);
        
        header('Location: index.php');
        die();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../style.css">
    <title>excluir</title>
</head>
<body>
    <div class="container">
        <h1 class="title-excluir">Você realmente deseja excluir essa demanda ?</h1>
        <div class="btn">
            <form class="form" method="POST" action="excluir.php">
            
                <input type="hidden" name="id">

                <button type="submit" class="btn blue" style="width: 50%; margin-bottom:1rem;">SIM!!</button>

                <a href="index.php" class="btn red" style="width: 50%;">NÃO!!</a>
            </form>
        </div>
    </div>
</body>
</html>