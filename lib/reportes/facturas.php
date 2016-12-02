<?php
session_start();
    require_once('../pdf/mpdf.php');

    include('../../models/datos.php');
    include('../../models/funciones.php');
    //$nombreTabla = 'carrito'.$_SESSION["id"];
    $id = $_SESSION["id"];

    //$query = "SELECT * FROM $nombreTabla";
    //$query2 = "SELECT SUM(precio) as sum FROM $nombreTabla";
    $query3 = "SELECT * FROM pedidos  WHERE id_user = $id ";
    $query4 = "SELECT * FROM usuarios WHERE id = $id ";

    $con = mysqli_connect($host,$user,$password,$base);
    //$result2=mysqli_query($con,$query2);
    $result3=mysqli_query($con,$query3);
    $result4=mysqli_query($con,$query4);
    //$row= mysqli_fetch_array($result2);
    $row3= mysqli_fetch_array($result3);
    $row4= mysqli_fetch_array($result4);

    $html =  '<header><h2>Librerias shakespeare</h2></header>';
    $html .=  '<div class="datosUser">';
    $html .=  '<p><span>Fecha:'.$row3['fecha'].'</p>';
    $html .=  '<p><span>Nombre:'.$row4['nombre'].''.$row4['apellido'].'</span></p>';
    $html .=  '<p><span>Dirección:'.$row3["direccion"].'</span></p>';
    $html .=  '<p><span>Teléfono:'.$row3["telefono"].'</span></p>';
    $html .=  '</div>';
    //if($result=mysqli_query($con,$query)){
      $html .=  '<span class="glyphicon glyphicon-tag" aria-hidden="true">Importe total</span>';
      $html .= '<div class=" table-responsive">';
      $html .= '<table style="color:black;" class="table">';
      //$html .='<th>Descripcion</th>';
      //$html .='<th>Precio</th>';
      //while($fila = @mysqli_fetch_array($result)){

        //$html .='<tr>';
        //$html .='<td>'.$fila["nombre"].'</td>';
        //$html .='<td>'.$fila["precio"].'</td>';
        //$html .='</tr>';

    //  }
      $html .= '</table>';
      $html .= '</div>';
      $html.='<h3 style="color:green;">Total: $'.$row3["total"].'</h3>';
      $html.='<footer><p>www.shakespearelibrerias.com</p></footer>';
//}



    $mpdf = new mPDF('c','A4');
    $css = file_get_contents('css/style.css');
    $mpdf->writeHTML($css,1);
    $mpdf->writeHTML($html);
    $mpdf->Output('reporte.pdf','I');

 ?>
