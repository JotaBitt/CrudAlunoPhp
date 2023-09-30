<?php
    $matricula = "";
    $email = "";
    $matricula = "";
    $periodo = "";

    $msg = "";

    $arqAluno = fopen("alunos.txt", "r") or die ("Falha ao abrir arquivo Aluno");
    $arqNovo = fopen ("novoAlunos.txt", "w+") or die ("Falha ao abrir arquivo Novo");

    $i = 0;
    $linhas[] = fgets($arqAluno);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $procurar = $_POST['procurar'];

        while (!feof($arqAluno)) {
            $linhas[] = fgets($arqAluno);
            $colunaDados = explode(";", $linhas[$i]);
            $matricula = $colunaDados[2];

            if ($matricula == $procurar) {
                $msg = "Aluno excluído!";

            } else {
                $nome = $colunaDados[0];
                $email = $colunaDados[1];
                $periodo = $colunaDados[3];
                $linha = $nome . ";" . $email . ";" . $matricula . ";" . $periodo;
                fwrite($arqNovo, $linha);
            }
            $i++;
        }
        copy("novoAlunos.txt", "alunos.txt");
        fclose($arqAluno);
        fclose($arqNovo);
        unlink("novoAlunos.txt");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Excluir aluno</title>
    </head>
    <body>
        <form action="excluirAluno.php" method="POST">
        Matricula: <input type="text" name="procurar">

        <input type="submit" value="Excluir">
        </form>
        <p><?php echo $msg ?></p>
    </body>
</html>