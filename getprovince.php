<?php
    $q = intval($_GET['q']);

    $con = mysqli_connect('localhost', 'joanmarto', '12345');

    if (!$con) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    mysqli_select_db($con, "eleccionescyl");
    $sql = "SELECT DISTINCT provincia  FROM Municipio";
    $result = mysqli_query($con, $sql);

    echo "<option>Provincia:</option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>".$row['provincia']."</option>";
    }
    mysqli_close($con);
?>