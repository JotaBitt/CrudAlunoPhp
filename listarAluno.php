<?php 
    $nome = "";
    $email = "";
    $matricula = "";
    $periodo = "";

    $arquivoAluno = fopen("alunos.txt", "r") or die ("Erro ao abrir arquivo");

    $x = 0;
    $linhas[] = fgets($arquivoAluno);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h1>Alunos:</h1>
        <table style = "width:30%">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Matrícula</th>
            <th>Email</th>
        </tr>
<?php
    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
        $dados = explode(";", $linhas[$x]);
        $nome = $dados[0];
        $email = $dados[1];
        $matricula = $dados[2];
        $periodo = $dados[3];
?>

<tr style="text-align: center;">
    <td><?php echo $nome?></td>
    <td><?php echo $email?></td>
    <td><?php echo $matricula?></td>
    <td><?php echo $periodo?></td>
</tr>

<?php $x++;
}
?>
</tr>
</table>
