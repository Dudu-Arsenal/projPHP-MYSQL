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
        $nome = $_POST["nome"] ?? null;
        $senha = $_POST["senha"] ?? null;
        var_dump($_POST);

        if ($nome && $senha){
            $sql = "INSERT INTO login.nomeSenha(nome, senha) values ('$nome', '$senha')";
            $result = mysqli_query($mysqli, $sql);
            header('Location: index.html');
        } else {
            echo "<br>Tem lugar vazio ai";
        }
    ?>

    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome"><br>
        <label for="senha">Senha</label>
        <input type="text" name="senha"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>