<?php
 //conectar con servidor
 $conectar = @mysqli_connect('localhost','root','');
 
 //verificar conexion
 if(!$conectar){
     echo"No se pudo conectar con el servidor";
 }else{
     $base=@mysqli_select_db($conectar,'prueba');
     if(!$base){
         echo"No se encontró la base de datos";
     }
 }

//recuperar variables
 $nombre=$_POST['nombre'];
 $correo=$_POST['correo'];
 $mensaje=$_POST['mensaje'];

 //sentencia sql
 $sql="INSERT INTO datos VALUES('$nombre','$correo','$mensaje')";

 //ejecutar senetencia
 $ejecutar=@mysqli_query($conectar,$sql);

if(!$ejecutar){
    echo"Hubo Algun Error";
}else{
    echo"Datos Guardados correctamente<br><a href='index.html'>Volver</a>";
}

?>
