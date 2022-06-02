<?php
    //require 'servidor.php';
    //require 'chamado.php';
    /*if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $chamado = new chamado($mysql);
        $id_variabel = $_GET['idDemanda'];
        echo $id_variabel;
        //$chamado->remover($_GET['idDemanda']);
        header('Location: index.php');
        die();
    } */
    require 'teste2.php'
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
             <form action="https://localhost/ead/ccc/PHP/teste2.php">
                <input type="hidden" name="idDemanda" value="<?php echo $id; ?>" ></input>
                <button type="submit" class="btn blue" style="width: 50%; margin-bottom:1rem;">SIM!!</button>
                <a href="index.php" class="btn red" style="width: 50%;">NÃO!!</a>
            </form>
        </div>
    </div>
</body>
</html>