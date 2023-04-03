<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Administrador</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <nav class="nav-adm">
	<div class="nav_title">Bem-vindo(a), administrador!</div>
	<ul class="nav_list">
		<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
	</ul>
	</nav>
    <div id="box">
        <div id="form">
            <form action="pesquisa-cartucho.php" method="post">
                <label for="pesquisa">Nome do cartucho:</label>
                <input type="text" name="pesquisa" id="pesquisa" class="form"><br>
                <button type="submit" name="submit">Pesquisar</button>
            </form>
            <form action="pesquisa-sistema.php" method="post">
                <label for="pesquisa-s">Nome do sistema:</label>
                <input type="text" name="pesquisa-s" id="pesquisa-s" class="form"><br>
                <button type="submit" name="submit">Pesquisar</button>
            </form>
        </div>    
    </div>
</body>
</html>