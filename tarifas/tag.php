<?php 

include "../model/conexion.php";



$sql=" select * from eventos" ;

$query  = mysqli_query($mysqli, $sql);

while ($row = mysqli_fetch_array($query)) { // busca en la bbdd los eventos y trae los datos

     $id=$row['id'];
     $fecha=$row['fecha'];
     $hora=$row['hora'];
     $portico=$row['id_portico'];
     $categoria=$row['categoria'];
     $autopista=$row['autopista'];
     $patente=$row['patente'];
     $Ndia = (date('N', strtotime($fecha))) ;
       
        $sql0="SELECT * FROM `festivos` WHERE dia='$fecha'"; // consulta  si la fecha corresponde a un dia festivo
        $query0  = mysqli_query($mysqli, $sql0);

        if($row = mysqli_fetch_array($query0)){

             $dia="S";
        }else{

            switch ($Ndia){
                case ($Ndia<= 5):  $dia="L-V";  // consulta si la fecha es un dia habil
                break;
                case (6):  $dia ="S"; // consulta si la fecha es un dia Sabado
                break;
                case (7):  $dia="D"; // consulta si la fecha es un dia Domingo
                break;
            }
        
            
        }

        include"./tarifa.php"; // consulta las tarifas correspondiente si es un dia habil, sabdo/festivo o domingo
    }
