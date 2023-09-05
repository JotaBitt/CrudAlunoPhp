    <?php
      $msg="";
        error_reporting(0);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $aluno = $_POST["aluno"];
                $email = $_POST["email"];
                $matricula = $_POST["matricula"];
                $periodo = $_POST["periodo"];
      
              $msg = "Deu tudo certo";
              
                $arquivo = fopen("alunos.txt","a+") or die ("Problema ao criar arquivo");
                
                $linha = "nome;email;matrícula;período\n";
                $linha = $aluno . ";" . $email . ";" . $matricula . ";" . $periodo . "\n";

                fwrite($arquivo,$linha);
                fclose($arquivo);
            }
      
    ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de aluno</title>
</head>
<body>
    <h1>Registro de aluno</h1>
    <form action="index.php" method="POST">      
        Nome do Aluno: <input type="text" name="aluno" id="aluno" placeholder="João Pedro">
        <br><br>
        Email: <input type="email" name="email" id="email" placeholder="joao@gmail.com">
        <br><br>
        Matrícula: <input type="text" name="matricula" id="matricula" placeholder="123">
        <br><br>
        Período: <input type="number" name="periodo" id="periodo" placeholder="4">
        <br><br>
        <input type="submit" value="Concluir">
    </form>
  <?php echo $msg ?>
    <br>
</body>
</html>
