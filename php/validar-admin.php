<?php
$usuario=$_POST['usuario'];
$clave=$_POST['password'];

echo("a");
//conectar con servidor
$conexion = @mysqli_connect('localhost','root','');

//verificar conexion
if(!$conexion){
    echo"No se pudo conectar con el servidor";
    echo("asise");
}else{
    $base=@mysqli_select_db($conexion,'inventario-web');
    echo("anoseaaaa");
    if(!$base){
        echo"No se encontró la base de datos";
    }
}
$consulta="SELECT * FROM admin WHERE usuario='$usuario' and password='$clave'";
$resultado=@mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location:../menu.html?modal=1");
}else{
    echo("Error de autenticación");
    header("location:../index.html");
}

?>