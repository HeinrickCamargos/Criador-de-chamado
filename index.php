<?php

    require 'servidor.php';
    include 'chamado.php';

    $chamado = new chamado($mysql);
    $chamado = $chamado->exibirTodos();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $chamado = new chamado($mysql);
        $chamado->adicionar($_POST["nome"], $_POST["email"], $_POST["cpf"], $_POST["servico"], $_POST["nome_demanda"], $_POST["operadora"], $_POST["problematica"]);

        header('Location: index.php');
        exit();

    }

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
        <img src="../porra.png" class="img-fluid" alt="Imagem responsiva" style="max-width: 5%; margin-top: 20px">
    </div>
    <div class="container">
        <h2 class="title"> NOVO CHAMADO </h2>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label>TITULO*</label>
                <input name="nome_demanda" class="text-input" type="text" required>
            </div>
            <div class="form-group">
                <label>OPERADORA*</label>
                <select name="operadora" class="select-input" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="Oi">Oi</option>
                    <option value="Tim">Tim</option>
                    <option value="Vivo">Vivo</option>
                    <option value="Claro">Claro</option>
                </select>
            </div>
            <div class="form-group">
                <label>TEXTO*</label>
                <textarea name="problematica" class="textarea" type="text" required></textarea>
            </div>
            <div class="form-group">
                <label>ESCREVA SEUS DADOS*</label>
            </div>
            <div class="form-group">
                <label>NOME*</label>
                <input name="nome" class="text-input" type="text" required>
            </div>
            <div class="form-group">
                <label>EMAIL*</label>
                <input name="email" class="text-input" type="email" required>
            </div>
            <div class="form-group">
                <label>CPF*</label>
                <input name="cpf" class="text-input" type="cpf" required>
            </div>
            <div class="form-group">
                <label>SERVIÇO*</label>
                <select name="servico" class="select-input" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="Cancelamento">Cancelamento</option>
                    <option value="Nova Demanda">Nova Demanda</option>
                    <option value="Informações">Informações</option>
                    <option value="Gerar um extrato">Gerar um extrato</option>
                    <option value="Aprimorar serviço">Aprimorar serviço</option>
                </select>
            </div>
            <br>
            <button class="btn blue" type="submit">ENVIAR</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th scope="col">TITULO</th>
                    <th scope="col">OPERADORA</th>
                    <th scope="col">CPF</th>
                    <th scope="col">FUNÇÂO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chamado as $obj) { ?>
                    <tr>
                    <td><?php echo $obj['nome_demanda'] ?></td>
                        <td><?php echo $obj['operadora'] ?></td>
                        <td><?php echo $obj['cpf'] ?></td>
                        <td><?php echo $obj['servico'] ?></td>

                        <td class="btn-action">
                            <form action="https://localhost/ead/ccc/PHP/excluir.php" class="btn red fill">
                                    <input type="hidden" name="idDemanda" value="<?php echo $obj['idDemanda'] ?>" ></input>
                                    <input type="submit" class="btn red fill" value="EXCLUIR"></input>
                            </form>
                            <form action="https://localhost/ead/ccc/PHP/editar.php" class="btn green fill">
                                    <input type="hidden" name="idDemanda" value="<?php echo $obj['idDemanda'] ?>" ></input>
                                    <input type="submit" class="btn green fill" value="EDITAR"></input>
                            </form>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
</body>
</html>