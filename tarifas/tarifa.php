<?php 



$sql2="SELECT * FROM `hoario` WHERE `id_portico`='$portico' and `dia`='$dia'";  // consulta la tarifa del portico por el dia de uso


$query2  = mysqli_query($mysqli, $sql2);




if($query2->num_rows==0){  // revisa que exista tarifa de punta para ese dia 
    
    $tarifa='normal';
     $tarifa;


}else{

while ($row = mysqli_fetch_array($query2)){


     $h_inicio= $row['h-inicio'];
     $h_final= $row['h-final'];
     $tarifa= $row['tarifa'];
   
   

    if( $hora>=$h_inicio && $hora<=$h_final){  // compara la  hora del evento para saber si es horario normal o de punta

       
         $tarifa;
        break;

    }else {
       
        $tarifa='normal';
         $tarifa;
    }
}
}

$sql3="SELECT * FROM `tarifa` WHERE `id_portico`='$portico' and `tarifa`='$tarifa'and`categoria`=$categoria" ; // consulta el valor de la tarifa de acuerdo a la categoria del vehiculo



$query3  = mysqli_query($mysqli, $sql3);   


$row = mysqli_fetch_array($query3);

$valor=$row['valor'];

$detalle=$row['descripcion'];

$update="UPDATE `eventos` SET `tarifa` = '$tarifa', `valor`=$valor , `detalles`='$detalle' WHERE `eventos`.`id` = $id "; // realiza el update del valor y tarifa del evento
echo "<br>";
mysqli_query($mysqli, $update);  




echo "  El dia $fecha ($dia) y hora $hora y vehiculo  $patente , categoria '$categoria' y portico '$portico'  ($detalle) tiene un valor de $ $valor que corresponde a la tarifa '$tarifa' ";




?>