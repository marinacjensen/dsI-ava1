<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['user'];

if ($nome !== 'admin') {
    header('Location:/inicio.php');
}

$conexao = mysqli_connect("localhost", "root", "", "marina");
$query = "SELECT * FROM usuarios ORDER BY nome";
$resultado = mysqli_query($conexao, $query); 

include('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P','mm', 'A4');

$pdf->setTitle('Relatório - Administrador');
$pdf->AddPage();

$html = " ";

while($linha = mysqli_fetch_array($resultado)){
    if ($linha['nome'] === 'admin') continue;

    $userid = $linha['id'];
    $sql = "SELECT * FROM cartuchos WHERE id_user = $userid";
    $resultcart = mysqli_query($conexao, $sql);

    $html .= "<h3>Jogos de $linha[nome]</h3>
    <table>
    <tr style=\"font-weight: bold\">
    <th>ID</th>
    <th>Nome</th>
    <th>Sistema</th>
    <th>Ano</th>
    </tr>
    ";
    while($linhacart = mysqli_fetch_array($resultcart)) {
        $html .= "<tr>
        <td>$linhacart[id]</td>
        <td>$linhacart[nome]</td>
        <td>$linhacart[sistema]</td>
        <td>$linhacart[ano]</td>
        </tr>";
    }
    $html .= "</table>";
}

$pdf->writeHTML($html);
$pdf->Output();
?>