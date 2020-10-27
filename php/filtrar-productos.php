<?php

$categoria = $_GET['categoria'];

//conectar con servidor
$conexion = @mysqli_connect('localhost','root','');

//verificar conexion
if(!$conexion){
    echo"No se pudo conectar con el servidor";
}else{
    $base=@mysqli_select_db($conexion,'inventario-web');
    
    if(!$base){
        echo"No se encontró la base de datos";
    }
}

$consulta_id = "SELECT * FROM categoria WHERE descripcion='$categoria'";

$resultado=@mysqli_query($conexion,$consulta_id);
$vari =mysqli_fetch_array($resultado);

$id_categoria=$vari['id_categoria'];
$sql="SELECT * FROM producto WHERE id_categoria='$id_categoria'";
$lista = @mysqli_query($conexion,$sql);

$aux ="";

while($mostrar=mysqli_fetch_array($lista)){

    $aux = $aux. "<div class='btnProducto col-6 col-md-3' data-carta='1'>
    <img class='img-thumbnail'  src='img/img-prueba.jpg'  />
    </div>";

    /*echo("ID: {$mostrar['id']} <br />");
    echo("Nombre: {$mostrar['nombre']} <br />");
    echo("Descripcion: {$mostrar['descripcion']} <br />");
    echo("Categoria: {$mostrar['id_categoria']} <br />");*/
}

?>