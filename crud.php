<?php
include("conecta.php");
$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];


// Se clicou no botão INSERIR:
if(isset($_POST["inserir"]) )
{
    $comando = $pdo->prepare("INSERT INTO alunos VALUE($matricula,'$nome',$idade)");
    $resultado = $comando->execute();
    header("Location: index.html");
}

// Se clicou no botão excluir:
if(isset($_POST["excluir"]) )
{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("Location: index.html");
}

// Se clicou no botão ALTERAR:
if(isset($_POST["alterar"]) )
{
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("Location: index.html");
}

// Se clicou no botão LISTAR:
if(isset($_POST["listar"]) )
{
    $comando = $pdo->prepare("SELECT * FROM alunos");
    $resultado = $comando->execute();

    while ($linhas = $comando->fetch() )
    {
        $m = $linhas["matricula"]; // Nome da coluna XAMPP
        $n = $linhas["nome"]; // Nome da coluna XAMPP
        $i = $linhas["idade"]; // Nome da coluna XAMPP
        echo("Matricula: $m Nome: $n Idade: $i <br>");
    }
}

?>  