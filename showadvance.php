
  <?php
  $con = mysqli_connect('localhost', 'joanmarto', '12345');

  if (!$con) {
    die('Error de conexión: ' . mysqli_connect_error());
  }

  mysqli_select_db($con, "eleccionescyl");
  $sql = "SELECT municipio.provincia, SUM(p_av) AS Primer_Avance, SUM(s_av) AS Segundo_Avance FROM municipio JOIN
    mesa ON municipio.cod_mun=mesa.cod_mun AND municipio.municipio=mesa.municipio
    GROUP BY municipio.provincia
    ORDER BY Segundo_Avance DESC;";
  $result = mysqli_query($con, $sql);

  $stack = array();
  while ($row = mysqli_fetch_array($result)) {
    $data = array("Provincia"=>$row['provincia'], "Primer Avance"=>$row['Primer_Avance'], "Segundo Avance"=>$row['Segundo_Avance']);
    array_push($stack, $data);
  }
  echo json_encode($stack);
  mysqli_close($con);
  ?>