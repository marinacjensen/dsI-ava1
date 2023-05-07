<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['user'];
$conexao = mysqli_connect("localhost", "root", "", "marina");
$query = "SELECT * FROM cartuchos WHERE id_user=$id";
$resultado = mysqli_query($conexao, $query); 

include('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P','mm', 'A4');

$pdf->setTitle('Relatório - Usuário');

$pdf->AddPage();

$html = "
    <h3>Jogos de $nome</h3>
  <table>
    <tr style=\"font-weight: bold\">
      <th>Nome</th>
      <th>Sistema</th>
      <th>Ano</th>
    </tr>
";

while($linha = mysqli_fetch_array($resultado)){
    $html .= "<tr>
    <td>$linha[nome]</td>
    <td>$linha[sistema]</td>
    <td>$linha[ano]</td>
    </tr>";
}

$html .= "</table>";

$pdf->writeHTML($html);
$pdf->Output();
?>