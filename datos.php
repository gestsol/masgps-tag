<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title> MásGps</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="logo">
                    <img class="gps" src="./img/masgps.svg">
                </div>
            </div>
            <div class="col-md-4">
                <h1><span style="color:#EFDD12">Reporte</span><span style="color:#ffff"> de Tag</span></h1>
            </div>
            <div class="col-md-4">
            <a href="index.html"><H5 class="cerrar" style="color: #EFDD12;">Cerrar Sesión</H5></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div >
            <form class="searchform cf">
                

                
                
                 <input type='text' id='datos' name='plate' placeholder='Ingrese Patente'  >
                
               


                <input type="date" id="start" name="inicio"  >

                <input type="date" id="finish" name="fin"  >
                <button type="submit">Buscar</button>


            </form>
        </div>
    </div>

    </div>
    <div class="container">
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

                        

                        if(isset($_GET['plate'])){

                            $pat=$_GET['plate'];

                            $sql=" select * from eventos where patente='$pat'" ;

                            if (($_GET['inicio']<>'') && ($_GET['fin']<>'')){

                                $inicio=$_GET['inicio'];

                                $fin=$_GET['fin'];

                                $sql=" select * from eventos where patente='$pat' and fecha between '$inicio' and '$fin'  " ;
                            }

                        }else{

                            $sql=" select * from eventos " ;
                        }
                       
                     
                      
                        $total=0;
                        $query  = mysqli_query($mysqli, $sql);

                        if(mysqli_num_rows($query)>0){
                        
                        while ($row = mysqli_fetch_array($query)){

                            $pat=$row['patente'];
                            $fecha=$row['fecha'];
                            $autopista=$row['autopista'];
                            $valor=$row['valor'];
                            $detalle=$row['detalles'];
                            $tarifa=$row['tarifa'];
                            $total=$total + $valor;
                            
                            echo"<tr>";
                            echo "<td>$pat</td>";
                            echo "<td>$tarifa</td>";
                            echo"<td>$fecha</td>";
                            echo"<td>$autopista</td>";
                            echo"<td>$detalle</td>";
                            echo"<td>$ $valor</td>";
                            echo"</tr>";
                            
                        } } else{

                            echo"<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo"<td></td>";
                            echo"<td>*No se encontraron datos para su busqueda*</td>";
                            echo"<td></td>";
                            echo"<td></td>";
                            echo"</tr>";
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="correo"><span style="color:#EFDD12">Ingrese algún
                        Correo</span><span style="color:#ffff">
                        electrónico</span></h4>
                <form action="mailto:contacto@lineadecodigo.com" method="post" name="form1">
                    <input id="nombre" name="nombre" type="text" placeholder="ejemplo.correo@email.com" /><br>
                    <input class="botons" name="Submit" type="submit" value="Enviar" />
                </form>
            </div>
            <div class="col-md-4">
                <!-- <h4 class="total"><span style="color:#EFDD12">Pórticos</span><span style="color:#ffff"> totales : XX -->
                </h4>
                <h4 class="total"><span style="color:#EFDD12">Tags</span><span style="color:#ffff"> usados : XX</h4>
            </div>
            <div class="col-md-4">
                <a href="test.php"><button class="impri">Download</button></a>
            </div>
        </div>
    </div>
    <footer>
        <div class="logowit">
            <img class="wit" src="./img/logo-wit-azul.svg">
        </div>


    </footer>
    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>