<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['user'];

if ($nome !== 'admin') {
    header('Location:/inicio.php');
}

$conexao = mysqli_connect("localhost", "root", "", "marina");
$query = "SELECT h.id, h.nome, h.sistema, h.ano, h.user, h.date, u.nome FROM historico h LEFT JOIN usuarios u ON u.id = h.user ORDER BY h.date DESC";
$resultado = mysqli_query($conexao, $query); 

include('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P','mm', 'A4');

$pdf->setTitle('Histórico de exclusão');

$pdf->AddPage();

$html = "<h3>Jogos excluídos</h3>
<table>
<tr style=\"font-weight: bold\">
<th>ID - Jogo</th>
<th>Nome</th>
<th>Sistema</th>
<th>Ano</th>
<th>Usuário</th>
<th>Data de remoção</th>
</tr>
";

while($linha = mysqli_fetch_array($resultado)){
    $html .= "<tr>
    <td>$linha[id]</td>
    <td>$linha[1]</td>
    <td>$linha[sistema]</td>
    <td>$linha[ano]</td>
    <td>$linha[nome]</td>
    <td>$linha[date]</td>
    </tr>";
}

$html .= "</table>";

$pdf->writeHTML($html);
$pdf->Output();

?>