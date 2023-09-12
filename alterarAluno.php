<?php
    $nome = "";
    $email = "";
    $matricula = "";
    $periodo = "";

    $msg = "";

    $arqAluno = fopen("alunos.txt", "r") or die ("Erro ao abrir arquivo!");
    $novoArq = fopen("novoAlunos.txt", "w") or die ("Erro ao criar NOVO Arquivo.");
    $linhas[] = fgets($arqAluno);

    $i = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $termoPesquisa = $_POST["busca"];

        while(!feof($arqAluno)) {

            $linhas[] = fgets($arqAluno);
            $dados = explode(";", $linhas[$i]);
            $matricula = $dados[2];
        
            if ($termoPesquisa == $matricula) {
                $nome = $_POST["novoAluno"];
                $email = $_POST["novoEmail"];
                $periodo = $_POST["novoPeriodo"];
                $matricula = $_POST["novaMatricula"];
    
                $linha = "nome;email;matricula;periodo\n";
                $linha = $nome . ";" . $email . ";" . $matricula . ";" . $periodo . "\n";
                $msg = "aluno alterado com sucesso!";
                fwrite($novoArq, $linha);
    
            } else {
                $nome = $dados[0];
                $email = $dados[1];
                $periodo = $dados[3];
                
                $linha = "nome;email;matricula;periodo";
                $linha = $nome . ";" . $email . ";" . $matricula . ";" . $periodo;
                fwrite($novoArq, $linha);
            }
            $i++;
        }
        copy("novoAlunos.txt", "alunos.txt");
        fclose($arqAluno);
        fclose($novoArq);
        unlink("novoAlunos.txt");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar aluno</title>

</head>
<body>
    <h1>Alterar</h1>
    <form action="alterarAluno.php" method="POST">      
    Coloque a matrícula do aluno: <input type="number" name="busca">
    
    <br>
    <?php echo $msg ?>
    <br>
    <h2>Insira os novos dados do aluno</h2>
        Nome do Aluno: <input type="text" name="novoAluno" placeholder="João Pedro">
        <br><br>
        Email: <input type="email" name="novoEmail" placeholder="joao@gmail.com">
        <br><br>
        Matrícula: <input type="text" name="novaMatricula" placeholder="123">
        <br><br>
        Período: <input type="number" name="novoPeriodo" placeholder="4">
        <br><br>
        <input type="submit" value="Concluir">
    </form>
</body>
</html>