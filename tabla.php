<?php

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/tabla.css">
    <title>Documento PDF</title>
</head>
<header>
    <div class="logo">
        <img class="gps" src="http://localhost/masTag/img/masgps.svg">

    </div>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrap">
                    <div class="widget">
                        <div class="fecha">
                            <p id="diaSemana" class="diaSemana">Martes</p>
                            <p id="dia" class="dia">27</p>
                            <p>de </p>
                            <p id="mes" class="mes">Octubre</p>
                            <p>del </p>
                            <p id="year" class="year">2015</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</header>

<body>

    <div class="container">
        <div class="col-md-12">
            <h1>Reporte de Tag</h1>
        </div>
    </div>


    <div class="container">
        <div class="col-md-12 col-xl-12">
            <h4 class="nombre">Nombre de Usuario: Carlos</h4>
            <h4 class="entrega">Entrega: 00 / 00 / 0000</h4>
            <h4 class="devuelta">Recepción : 00 / 00 / 0000</h4>
        </div>
    </div>

    <!-- <div class="container"> -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Patente</th>
                    <th>Tarifa</th>
                    <th>Historial</th>
                    <th>Autopista</th>
                    <th>Pórticos</th>
                    <th>Monto total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include "./model/conexion.php";

                $sql = " select * from eventos";
                $total = 0;
                $query  = mysqli_query($mysqli, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    $pat = $row['patente'];
                    $fecha = $row['fecha'];
                    $autopista = $row['autopista'];
                    $valor = $row['valor'];
                    $detalle = $row['detalles'];
                    $tarifa = $row['tarifa'];
                    $total = $total + $valor;

                    echo "<tr>";
                    echo "<td>$pat</td>";
                    echo "<td>$tarifa</td>";
                    echo "<td>$fecha</td>";
                    echo "<td>$autopista</td>";
                    echo "<td>$detalle</td>";
                    echo "<td>$ $valor</td>";
                    echo "</tr>";
                }

                ?>

                <tr class="tr-total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row" style="background-color: white;
                            color: #000 ;">TOTAL</th>
                    <?php
                    echo "<td style='background-color: white; color: #000 ;'><strong>$ $total</strong></td>";
                    ?>
                </tr>
            </tbody>
        </table>

        
        <i><h4 class="gracias">Gracias por preferirnos</h4></i>

        <script src="script.js"></script>

</body>
<footer class="footer">
    <div class="logowit">
        <!-- <img class="wit" src="http://localhost/masTag/img/masgps.svg">
    </div> -->
</footer>

</html>

<?php

$html = ob_get_clean();


?>