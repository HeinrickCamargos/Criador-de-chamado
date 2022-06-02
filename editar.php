<?php
 /*
    require 'servidor.php';
    require 'chamado.php';


    if ($_SERVER['REQUEST_METHOD'] === 'GET'){

        $chamado= new chamado($mysql);
        $chamado-> editar($_POST['id'], $_POST["nome"], $_POST["email"], $_POST["cpf"], $_POST["servico"], $_POST["nome_demanda"], $_POST["operadora"], $_POST["problematica"]);
       
        header('Location: index.php');
        die();
    }

    $chamado = new chamado($mysql);
    $demanda = $_GET['idDemanda'];
    $chamado = $chamado->encontrarPorId($demanda,$demanda);
*/
require 'chamado.php';

$servername = "localhost";
$username = "root";
$password = "";

try {
$conn = new PDO("mysql:host=$servername;dbname=chamado", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

$id = $_GET['idDemanda'];
$sql = 'SELECT idDemanda, idCliente, nome, email, cpf, servico, nome_demanda, operadora, problematica FROM `demanda`,`cliente`';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result;
$row = $stmt->fetch();

/*$data = Array (
	'editCount' => $row->inc(1),
	// editCount = editCount + 2;
	'active' => $row->not()
	// active = !active;
);
$row->where ('idDemanda', 1);
if ($row-> update ('users', $data))
    echo $row->count . ' records were updated';
else
    echo 'update failed: ' . $row->getLastError();*/
    
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
                        <input name="nome_demanda" class="text-input" type="text" required value="<?php echo $row['nome_demanda']; ?>">
                    </div>
                    <div class="form-group">                
                        <label>OPERADORA*</label>
                        <select name="operadora" class="select-input" required >
                            <option value=''>Selecione</option>
                            <option value="Oi">Oi</option>
                            <option value="Tim">Tim</option>
                            <option value="Vivo">Vivo</option>
                            <option value="Claro">Claro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>TEXTO*</label>
                        <textarea name="problematica" class="textarea" type="text"><?php echo $row['problematica']; ?></textarea> 
                    </div>
                    <div class="form-group">
                        <label>ESCREVA SEUS DADOS*</label>
                    </div>
                    <div class="form-group">
                        <label>NOME*</label>
                        <input name="nome" class="text-input" type="text" required value="<?php echo $row['nome']; ?>">
                    </div>
                    <div class="form-group">
                        <label>EMAIL*</label>
                        <input name="email" class="text-input" type="email" required value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>CPF*</label>
                        <input name="cpf" class="text-input" type="cpf" required value="<?php echo $row['cpf']; ?>">
                    </div>
                    <div class="form-group">
                        <label>SERVIÇO*</label>
                        <select name="servico" class="select-input" required >
                            <option value="">Selecione</option>
                            <option value="Cancelamento">Cancelamento</option>
                            <option value="Nova Demanda">Nova Demanda</option>
                            <option value="Informações">Informações</option>
                            <option value="Gerar um extrato">Gerar um extrato</option>
                            <option value="Aprimorar serviço">Aprimorar serviço</option>
                        </select>
                    </div>
                    <br>
                    <div class="btn">
                        <form action="https://localhost/ead/ccc/PHP/index.php">
                            <input type="hidden" name="idDemanda" value="<?php echo $id; ?>" ></input>
                                <button type="submit" class="btn blue" >EDITAR</button>
                                <a href="index.php" class="btn red" style="margin: 1rem 0;">CANCELAR</a>
                        </form>
                    </div>
            </form>
        </div>
    </body>
</html>