<?php

 $conexion = @mysqli_connect('localhost','root','');

if(!$conexion){
    ?>
    <script>
    alert("No se pudo conectar con el servidor");
    </script>
    <?php
}else{
    $base=@mysqli_select_db($conexion,'inventario');
    if(!$base){
    ?>
    <script>
    alert("No se encontró la base de datos");
    </script>
    <?php  
    }
}


 $nombre=$_POST['nombre'];
 $descripcion=$_POST['descripcion'];
 $url_img=$_POST['url'];
 $precio=$_POST['precio'];
 $categoria=$_POST['id-categoria'];

 $sql="INSERT INTO producto(nombre, descripcion, url_img, precio, id_categoria)  VALUES ('$nombre','$descripcion','$url_img','$precio','$categoria')";

 $ejecutar=@mysqli_query($conexion,$sql);

if(!$ejecutar){
    ?>
    <script>
    alert("Hubo algún error, no se pudo registrar");
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Datos guardados correctamente");
    </script>
    <?php
}
header("location:../menu.php?modal=1&categoria=Todo");
?>