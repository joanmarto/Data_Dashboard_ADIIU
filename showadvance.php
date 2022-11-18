<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
    $q = strval($_GET['q']);

    $con = mysqli_connect('localhost', 'joanmarto', '12345');

    if (!$con) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    mysqli_select_db($con, "eleccionescyl");
    $sql = "SELECT SUM(p_av) AS Primer_Avance, SUM(s_av) AS Segundo_Avance FROM municipio JOIN
    mesa ON provincia='".$q."' AND municipio.cod_mun=mesa.cod_mun AND municipio.municipio=mesa.municipio
    ORDER BY Segundo_Avance DESC;";
    $result = mysqli_query($con, $sql);

    echo "<table>
        <tr>
        <th>Primer Avance</th>
        <th>Segundo Avance</th>
        </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Primer_Avance'] . "</td>";
        echo "<td>" . $row['Segundo_Avance'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($con);
    
?>
</body>
</html>

