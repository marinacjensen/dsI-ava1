<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
    session_start();
    $user = $_SESSION['user'];
    if ($_SESSION['user'] == 'admin') {
        header('Location:administrador.php');
    }
?>
    <nav class="nav">
		<div class="nav_title">Bem-vindo(a), <?php echo $_SESSION['user']?>!</div>
		<ul class="nav_list">
            <li class="nav__item"><a href="insert-cart.php" style="color:black;">Registrar Cartucho</a></li>
			<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
		</ul>
	</nav>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Sistema</th>
      <th class = "tela">Tela<th>
      <th class = "ano">Ano<th>
    </tr>
  </thead>
  <tbody>

<?php
  $id = $_SESSION['id']; 
  $conexao = mysqli_connect("localhost","root","","marina"); 
  $query = "SELECT * FROM cartuchos WHERE id_user = $id";
  $resultado = mysqli_query($conexao, $query);
  while($linha = mysqli_fetch_array($resultado)){
    echo "<tr><td>".$linha['nome']."</td>
    <td>".$linha['sistema']."</td>
    <td class = 'tela'><img src='".$linha['tela']."'></td>
    <td class = 'ano-td'>".$linha['ano']."</td> </tr>";
  }
?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
