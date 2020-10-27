<?php

 $conexion = @mysqli_connect("localhost","root","");

 $nombre=$_POST['nombre'];
 echo($nombre);
 $descripcion=$_POST['descripcion'];
 echo($descripcion);
 $url_img=$_POST['url-img'];
 echo($url_img);
 $precio=$_POST['precio'];
 echo($precio);
 $categoria=$_POST['id-categoria'];
 echo($categoria);

 $base = @mysqli_select_db($conexion,"inventario-web");

 $consulta="INSERT INTO producto VALUES ('$nombre','$descripcion','$url_img','$precio','$categoria')";

 $resultado=@mysqli_query($conexion,$consulta);

if(!$resultado){
    ?>
    <script>
    alert("Hubo algún error, no se pudo registrar");
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Hubo algún error, no se pudo registrar");
    </script>
    <?php
}
?>