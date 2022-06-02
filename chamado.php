<?php

class chamado
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }


    public function adicionar(string $nome, string $email, string $cpf, string $servico, string $nome_demanda, string $operadora, string $problematica) : void{
        $inserecliente = $this->mysql->prepare('INSERT INTO cliente ( nome, email, cpf, servico) VALUES(?,?,?,?);');
        $inserecliente -> bind_param('ssss', $nome, $email, $cpf, $servico);
        $inserecliente -> execute();
        $inseredemanda = $this->mysql->prepare('INSERT INTO demanda ( nome_demanda, operadora, problematica) VALUES(?,?,?);');
        $inseredemanda -> bind_param('sss', $nome_demanda, $operadora, $problematica );
        $inseredemanda -> execute();
    }

    public function editar(string $id, string $nome, string $email, string $cpf, string $servico, string $nome_demanda, string $operadora, string $problematica) : void{

        $editacliente = $this->mysql->prepare('UPDATE cliente SET nome = ?, email = ?,  cpf = ?, servico = ? WHERE id = ?');
        $editacliente-> bind_param('sssss', $nome, $email, $cpf, $servico, $id);
        $editacliente -> execute();
        $editademanda = $this->mysql->prepare('UPDATE demanda SET nome_demanda = ?, operadora = ?,  problematica = ? WHERE id = ?');
        $editademanda-> bind_param('ssss', $nome_demanda, $operadora, $problematica, $id);
        $editademanda -> execute();
    }

    public function remover (int $id) : void{

        $removerchamado = $this->mysql->prepare('DELETE FROM `demanda`, `cliente WHERE idDemanda =' . strval($id));
        $removerchamado -> bind_param('s', $id);
        $removerchamado-> execute();
    }

    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT idDemanda, idCliente, nome, email, cpf, servico, nome_demanda, operadora, problematica FROM `demanda`,`cliente`');
        $chamado = $resultado->fetch_all(MYSQLI_ASSOC);
        return $chamado;
    }

    public function encontrarPorId(string $idDemanda, string $idCliente) : array
    {
        $selecionachamado= $this->mysql->prepare("SELECT idDemanda, idCliente, nome, email, cpf, servico, nome_demanda, operadora, problematica FROM `demanda`, `cliente` WHERE id = ?");
        $selecionachamado->bind_param('ss', $idDemanda, $idCliente,);
        $selecionachamado->execute();
        $chamado = $selecionachamado->get_result()->fetch_assoc();
        return $chamado;
    } 
}  