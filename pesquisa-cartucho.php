<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de cartucho</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style2.css">
</head>
<body>
    <nav class="nav-adm">
	<div class="nav_title">Bem-vindo(a), administrador!</div>
	<ul class="nav_list">
        <li class="nav__item"><a href="administrador.php" style="color:black;">Home</a></li>
		<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
	</ul>
	</nav>
    <div id="box">
        <h3>Resultado:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome do cartucho</th>
                    <th>Nome do usuário</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $cartucho = $_POST['pesquisa'];
        $conexao = mysqli_connect("localhost", "root", "", "marina");
        $query = "SELECT u.nome, ca.id_user, ca.nome FROM cartuchos ca LEFT JOIN usuarios u ON u.id = ca.id_user WHERE ca.nome='$cartucho'";
        $resultado = mysqli_query($conexao, $query);
        while($linha = mysqli_fetch_array($resultado)){
            echo "<tr><td>".$linha["nome"]."</td>
            <td>".$linha["0"]."</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>