<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost', 'joanmarto', '12345');

if (!$con) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_select_db($con, "eleccionescyl");
$sql = "SELECT partido, SUM(voto.votos) AS Total_Votos FROM municipio JOIN
mesa ON municipio.provincia='".$q."' AND municipio.cod_mun=mesa.cod_mun AND municipio.municipio=mesa.municipio JOIN
voto ON mesa.cod_mesa=voto.cod_mesa
GROUP BY partido
ORDER BY Total_Votos DESC";
$result = mysqli_query($con, $sql);

$stack = array();
while ($row = mysqli_fetch_array($result)) {
    $data = array("Partido" => $row['partido'], "Total_Votos" => $row['Total_Votos']);
    array_push($stack, $data);
}
echo json_encode($stack);
mysqli_close($con);
