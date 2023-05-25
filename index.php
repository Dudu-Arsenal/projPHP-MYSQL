<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <?php 
        include("conexao.php");

        if (isset($_POST["nome"]) || isset($_POST["senha"])){

        $nome = $_POST["nome"];
        $senha = $_POST["senha"];

        if (strlen($nome) == 0){
            echo "Preencha seu email";
        } else if (strlen($senha) == 0){
            echo "Preencha sua senha";
        } else {

            $sql_code = "SELECT * FROM nomesenha where nome = '$nome' and senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL ". $mysqli->error);

            $qnt = $sql_query->num_rows;

            if($qnt == 1){
                $user = $sql_query->fetch_assoc();
                header("Location: perfil.php");
            } else {
                echo "Falho ao logar: Nome ou senha incorretos";
            }

        }
        // if ($nome && $senha){
        //     $sql = "INSERT INTO login.nomeSenha(nome, senha) values ('$nome', '$senha')";
        //     $result = mysqli_query($mysqli, $sql);
        //     header('Location: index.html');
        // } else {

        // }
    }
    ?>

    <form method="post">
        <h1>Acesse sua conta</h1>
        <label for="nome">Nome</label>
        <input type="text" name="nome"><br>
        <label for="senha">Senha</label>
        <input type="text" name="senha"><br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>