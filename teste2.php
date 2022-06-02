<?php 
    $id = $_GET['idDemanda'];
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=chamado", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

    $sql = "DELETE FROM demanda WHERE idDemanda=" . $id;
    $result = $conn->query($sql);
    $sql = "DELETE FROM cliente WHERE idcliente=" . $id;
    $result = $conn->query($sql);

    header('Location: index.php');
    die();
?>