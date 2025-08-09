<?php
$host = "localhost"; 
$usuario = "root";   
$senha = "";        
$banco = "cuidarplus"; 

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_errno) {
    die("Falha na conexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
