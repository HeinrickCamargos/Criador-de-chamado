<?php

    require 'servidor.php';
    require 'chamado.php';


    if ($_SERVER['REQUEST_METHOD'] === 'GUET'){

        $chamado= new chamado($mysql);
        $chamado-> editar($_POST['id'], $_POST["nome"], $_POST["email"], $_POST["cpf"], $_POST["servico"], $_POST["nome_demanda"], $_POST["operadora"], $_POST["problematica"]);
       
        header('Location: index.php');
        die();
    }

    $chamado = new chamado($mysql);
    $chamado = $selecionachamado->encontrarPorId($_GET['idDemanda'],$_GET['idCliente']);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viemport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../index.css">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <div style="text-align: center;" class="col-lg-6 mx-auto">
            <img src="../porra.png" class="img-fluid" alt="Imagem responsiva" style="max-width: 5%; margin-top: 20px" >
        </div>
        <div class="container">
            <h2 class="title"> NOVO CHAMADO </h2>
            <form method="POST" action="index.php">
                    <div class="form-group">
                        <label>TITULO*</label>
                        <input name="nome_demanda" class="text-input" type="text" required value="<?php echo $edt ['nome_demanda'];?>">
                    </div>
                    <div class="form-group">                
                        <label>OPERADORA*</label>
                        <select name="operadora" class="select-input" required>
                            <option value='<?php echo $edt['operadora']; ?>'><?php echo $edt ['operadora']; ?></option>
                            <option value="Oi">Oi</option>
                            <option value="Tim">Tim</option>
                            <option value="Vivo">Vivo</option>
                            <option value="Claro">Claro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>TEXTO*</label>
                        <textarea name="problematica" class="textarea" type="text" requiredvalue="<?php echo $edt ['problematica'];?>"></textarea> 
                    </div>
                    <div class="form-group">
                        <label>ESCREVA SEUS DADOS*</label>
                    </div>
                    <div class="form-group">
                        <label>NOME*</label>
                        <input name="nome" class="text-input" type="text" required value="<?php echo $edt ['nome'];?>">
                    </div>
                    <div class="form-group">
                        <label>EMAIL*</label>
                        <input name="email" class="text-input" type="email" required value="<?php echo $edt ['email'];?> "> 
                    </div>
                    <div class="form-group">
                        <label>CPF*</label>
                        <input name="cpf" class="text-input" type="cpf" requiredvalue="<?php echo $edt ['cpf'];?> ">
                    </div>
                    <div class="form-group">
                        <label>SERVIÇO*</label>
                        <select name="servico" class="select-input" required>
                            <option value='<?php echo $edt['servico']; ?>'><?php echo $edt ['servico']; ?> </option>
                            <option value="Cancelamento">Cancelamento</option>
                            <option value="Nova Demanda">Nova Demanda</option>
                            <option value="Informações">Informações</option>
                            <option value="Gerar um extrato">Gerar um extrato</option>
                            <option value="Aprimorar serviço">Aprimorar serviço</option>
                        </select>
                    </div>
                    <br>
                    <p>
                        <input type="hidden" name="id" value="<?php echo $edt['id']; ?>"/>
                    </p>
                    <p>
                        <button class="btn blue" type="submit">EDITAR</button>
                        <a href="index.php" class="btn red" style="margin: 1rem 0;">CANCELAR</a>
                    </p>
            </form>
        </div>
    </body>
</html>