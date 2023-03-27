<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="login">
        <h2>Bem-vindo(a)!</h2>
        <h3>Faça login ou <a href="registro.html">registre-se</a>.</h3>
        <div id="form">
            <form action="cliente.php" method="post">
                <label for="user">Usuário:</label>
                <input type="text" name="user" id="user" class="form"><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form"><br>
                <input type="submit" name="entrar" value="Entrar" class="button">
            </form>
        </div>
    </div>
</body>
</html>