<!Doctype html>
<html>

<head>
    <title>DataDashboard</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class= "navbar-color-txt">
        <nav class= "navbar navbar-light justify-content-between navbar-bg">
            <a class= "navbar-brand navbar-color-txt" href="#">Data Dashboard</a>
            <div class="form-inline">
                <a class="navbar-brand navbar-color-txt" href="https://www.uib.es/es/">UIB</a>
                <a class="navbar-brand navbar-color-txt" href="https://datos.gob.es/es/catalogo/a07002862-resultado-electoral-2022">Data Source</a>
            </div>
        </nav>
    </div>
    <div>
        <h1>Data Dashboard</h1>
    </div>
    <div>
        <?php
        // $q = intval($_GET['q']);

        $con = mysqli_connect('localhost', 'joanmarto', '12345');

        if (!$con) {
            die('Error de conexión: ' . mysqli_error($con));
        }

        mysqli_select_db($con, "eleccionescyl");
        $sql = "SELECT partido, SUM(votos) AS Total_Votos FROM voto 
        GROUP BY partido 
        ORDER BY Total_Votos DESC";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo "<p>" . $row['partido'] . $row['Total_Votos'] . "</p>";
        }
        mysqli_close($con);
        ?>
    </div>
</body>

</html>