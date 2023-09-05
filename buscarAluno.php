<?php
    $nome = "";
    $email = "";
    $periodo = "";
    $matricula = "";

    $busca = 0;

    $arqAluno = fopen ("alunos.txt", "r")  or die ("Erro ao ler arquivo.");
    $linhas[] = fgets($arqAluno);

    $i=0;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar aluno</title>

        <style>
            table, th, tr, td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            table {
                width: 25%;
            }

            td {
                text-align: center;
            }

        </style>
    </head>
    <body>
        <h1>Buscar Aluno</h1>
        <form action="buscarAluno.php" method="POST">
            Coloque a matrícula do aluno:<input type="number" name="matricula">
            <br><br>
            <input type="submit" value="Buscar">
        </form>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                    <th>Período</th>
                </tr>
            </thead>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $termoPesquisa = $_POST['matricula'];

        while (!feof($arqAluno)) {
            $linhas[] = fgets($arqAluno);
            $dados = explode(";", $linhas[$i]);
            $matricula = $dados[2];

            if ($termoPesquisa == $matricula) {
                $nome = $dados[0];
                $email = $dados[1];
                $periodo = $dados[3];
    
                $busca = 1;

                echo "<tr>";
                echo "<td>". $nome ."</td>";
                echo "<td>". $email ."</td>";
                echo "<td>". $matricula ."</td>";
                echo "<td>". $periodo ."</td>";
                echo "</tr>";

                $busca = 1;
            }
            $i++;
        }
        fclose ($arqAluno);
    }
    
?>
        </table>
        <?php echo "Foi encontrado: " . $busca . " alunos" ?>
    </body>
</html>