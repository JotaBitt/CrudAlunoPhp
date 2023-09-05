<?php
        $matricula = "";
		$periodo = "";
		$nome = "";
        $email = ""

        $arquivoAluno = fopen("alunos.txt", "r") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arquivoAluno);

?>
<!DOCTYPE html>
<html>
<head>
     <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Lista alunos:</h1>
<table>
<tr>
    <th>Nome</th>
    <th>Email<th>
    <th>Matrícula<th>
    <th>Período<th>
</tr>
<?php
    $x=0;
    while (!feof($arquivoAluno)) {
			$linhas[] = fgets($arquivoAluno);
			$colunaDados = explode(";", $linhas[$x]);
			$nome = $colunaDados[0];
			$email = $colunaDados[1];
			$matricula = $colunaDados[2];
            $periodo = $colunadados[3];
            echo "<tr>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $matricula . "</td>";
            echo "<td>" . $periodo . "</td>";
            echo "</tr>";
			
    }
    fclose($arquivoAluno);
?>
</table>
    <tr style ="text-align: center">
    <td><?php echo $nome ?></td>
    <td><?php echo $email ?></td>
    <td><?php echo $matricula ?></td>
    <td><?php echo $periodo ?></td>
    <?php $x++;
 }
 
?>
</tr>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
