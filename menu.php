

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/carousel.css" type="text/css">
    <link rel="stylesheet" href="css/iconos.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Bar london</title>
</head>

<body>

    <header class="top-navbar">
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="index.html">
                <img id="logo" src="img/logo-bar.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="acerca.html">Acerca de Nosotros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Otros</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="empleados.html">Empleados</a>
                            <a class="dropdown-item" href="galeria.html">Galeria</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="reseñas.html">Reseñas</a>
                            <a class="dropdown-item" href="opiniones.html">Opiniones</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contactenos.html">Contactenos</a></li>
                    <li id="entrar-admin">
                        <a href="" target="_blank" data-toggle="modal" data-target="#exampleModalScrollable">
                            <img src="img/icon-admin.png" height="35px" alt="">
                        </a>
                    </li>
                    <li id="salir-admin" style="display:none">
                        <a href="php/cerrar-sesion.php">
                            <img src="img/cerrar-sesion.png" height="35px" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="banner-menu">
            <div class="banner-content-menu">
                <h1>Menu Especial</h1>
                <a href="#">Promociones</a>
            </div>
        </section>
    </header>

    

    <div id="ls-productos" class="row">
        <aside class="col-12 col-md-4">
            <section class="col-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <form action="" method="get" name="form-list">
                    
                    <button id="btn-buscar" class="nav-link" type="submit" name="categoria" value="Todo" >Todo</button> 
                    <button id="btn-buscar" class="nav-link" type="submit" name="categoria" value="Bebidas Alcoholicas">Bebidas Alcholicas</button> 
                    <button id="btn-buscar" class="nav-link" type="submit" name="categoria" value="Bebidas no Alcoholicas">Bebidas no Alcoholicas</button> 
                    <button id="btn-buscar" class="nav-link" type="submit" name="categoria" value="Comidas Rapidas">Comidas Rapidas</button> 
                </form>
                    
                </div>
            </section>
        </aside>
        <div class=" col-12 col-md-8 ">
            <div class="container ">
            </div>
            <div id="productos" class="row ">
<?php

$conexion = @mysqli_connect('localhost','root','');

if(!$conexion){
?>  
  <script>
    alert("No se pudo conectar con el servidor");
    </script>
<?php
}else{
    $base=@mysqli_select_db($conexion,'inventario-web');
    
    if(!$base){
?>
     <script>   
     alert("No se encontró la base de datos");
    </script>
<?php    
    }
}
    if(isset($_GET['categoria'])) {
     
    $categoria=$_GET['categoria'];

    if($categoria=='Todo'){
        $sql="SELECT * FROM producto";
    }else{
    $consulta_id = "SELECT * FROM categoria WHERE nombre='$categoria'";


    $resultado=@mysqli_query($conexion,$consulta_id) ;

    $vari =mysqli_fetch_array($resultado) ;
    

    $id_categoria=$vari['id'];
    $sql="SELECT * FROM producto WHERE id_categoria='$id_categoria'";
    }
    $lista = @mysqli_query($conexion,$sql);

    $i=1;

while($mostrar=mysqli_fetch_array($lista)){

    echo("<div class='btnProducto col-6 col-md-3' data-carta='{$i}'>
            <div class='our-team'>
                <div class='pic'>
                        <img src='{$mostrar['url_img']}' width='100' height='100'>
                    <ul class='social'>
                        <h4 class='title'> Descripción</h4>
                        <span class='post'>{$mostrar['descripcion']}</span>
                    </ul>
                </div>
                <div class='team-content'>
                    <h3 class='title'>Precio</h3>
                    <span class='post'>{$mostrar['precio']}</span>
                </div>
            </div>
        </div>  
    ");
    echo("<div class='btnProducto col-6 col-md-3' data-carta='{$i}'>
            <div class='our-team'>
                <div class='pic'>
                        <img src='{$mostrar['url_img']}' width='100' height='100'>
                    <ul class='social'>
                        <h4 class='title'> Descripción</h4>
                        <span class='post'>{$mostrar['descripcion']}</span>
                    </ul>
                </div>
                <div class='team-content'>
                    <h3 class='title'>Precio</h3>
                    <span class='post'>{$mostrar['precio']}</span>
                </div>
            </div>
        </div>  
    ");
    echo("<div class='btnProducto col-6 col-md-3' data-carta='{$i}'>
            <div class='our-team'>
                <div class='pic'>
                        <img src='{$mostrar['url_img']}' width='100' height='100'>
                    <ul class='social'>
                        <h4 class='title'> Descripción</h4>
                        <span class='post'>{$mostrar['descripcion']}</span>
                    </ul>
                </div>
                <div class='team-content'>
                    <h3 class='title'>Precio</h3>
                    <span class='post'>{$mostrar['precio']}</span>
                </div>
            </div>
        </div>  
    ");
    echo("<div class='btnProducto col-6 col-md-3' data-carta='{$i}'>
            <div class='our-team'>
                <div class='pic'>
                        <img src='{$mostrar['url_img']}' width='100' height='100'>
                    <ul class='social'>
                        <h4 class='title'> Descripción</h4>
                        <span class='post'>{$mostrar['descripcion']}</span>
                    </ul>
                </div>
                <div class='team-content'>
                    <h3 class='title'>Precio</h3>
                    <span class='post'>{$mostrar['precio']}</span>
                </div>
            </div>
        </div>  
    ");
    

    $i=$i+1;    
    
}
}else{
    echo(" ");
}
?>
            </div>
        </div>
    </div>
    <div id="add-producto" style="display: none">
        <a href="" target="_blank" data-toggle="modal" data-target="#modal-agregar-producto">
            <p>Agregar Producto
                <img src="img/add-producto.png" height="50px" alt="">
            </p>
        </a>
    </div>

    <footer class="mainfooter " role="contentinfo ">

        <div class="footer-middle ">
            <div class="container ">
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-fb40b734-605e-4250-bbd6-48e924e79440"></div>
                <div class="row ">
                    <div class="col-md-3 col-sm-6 ">
                        <!--Column1-->
                        <div class="footer-pad ">
                            <h4>Heading 1</h4>
                            <ul class="list-unstyled ">
                                <li>
                                    <a href="# "></a>
                                </li>
                                <li><a href="# ">Payment Center</a></li>
                                <li><a href="# ">Contact Directory</a></li>
                                <li><a href="# ">Forms</a></li>
                                <li><a href="# ">News and Updates</a></li>
                                <li><a href="# ">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <!--Column1-->
                        <div class="footer-pad ">
                            <h4>Heading 2</h4>
                            <ul class="list-unstyled ">
                                <li><a href="# ">Website Tutorial</a></li>
                                <li><a href="# ">Accessibility</a></li>
                                <li><a href="# ">Disclaimer</a></li>
                                <li><a href="# ">Privacy Policy</a></li>
                                <li><a href="# ">FAQs</a></li>
                                <li><a href="# ">Webmaster</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <!--Column1-->
                        <div class="footer-pad ">
                            <h4>Heading 3</h4>
                            <ul class="list-unstyled ">
                                <li><a href="# ">Parks and Recreation</a></li>
                                <li><a href="# ">Public Works</a></li>
                                <li><a href="# ">Police Department</a></li>
                                <li><a href="# ">Fire</a></li>
                                <li><a href="# ">Mayor and City Council</a></li>
                                <li>
                                    <a href="# "></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <h4>Follow Us</h4>
                        <ul class="social-network social-circle ">
                            <li><a href="# " class="icoFacebook " title="Facebook "><i class="fa fa-facebook "></i></a></li>
                            <li><a href="# " class="icoLinkedin " title="Linkedin "><i class="fa fa-linkedin "></i></a></li>
                            <li><a href="# " class="icoLinkedin " title="Twitter "><i class="fa fa-twitter "></i></a></li>
                            <li><a href="# " class="icoLinkedin " title="Instagram "><i class="fa fa-instagram "></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12 copy ">
                        <p class="text-center ">&copy; Copyright 2019 - Company Name. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Credenciales de Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
                </div>
                <div id="modal-card" class="container">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-ingreso" action="php/validar-admin.php" method="post">
                                <div class="form-group">
                                    <label for="validation01">Usuario</label> <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario">
                                </div>
                                <div class="form-group">
                                    <label for="validation01">Contraseña</label> <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="password">
                                </div>
                                <input type="submit" class="btn btn-success" value="Ingresar" name="agregar">
                            </form>

                            <script>
                                window.$_GET = new URLSearchParams(location.search);
                                var mod = $_GET.get('modal');
                                var div = document.getElementById('add-producto');
                                var log = document.getElementById('entrar-admin');
                                var salir = document.getElementById('salir-admin');

                                if (mod > 0) {
                                    div.style.display = 'block';
                                    log.style.display = 'none';
                                    salir.style.display = 'block';
                                } else {
                                    div.style.display = 'none';
                                    log.style.display = 'block';
                                    salir.style.display = 'none';
                                }
                            </script>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregar-producto" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-producto" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-agregar-producto">Credenciales de Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
                </div>
                    <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-agregar" action="php/agregarProducto.php" method="post">
                                <div class="form-group">
                                    <label for="validation01">Nombre</label> <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="validation01">Descripción</label> <input type="text" class="form-control" placeholder="Ingrese Descripción" name="descripcion">
                                </div>
                                <div class="form-group">
                                    <label for="validation01">Precio</label> <input type="number" class="form-control" placeholder="Ingrese Precio" name="precio">
                                </div>
                                <div class="form-group">
                                    <select name="id-categoria">
                                        <label>Categoria</label>
                                        <option value="1" name="id-categoria">Comidas Rapidas</option> 
                                        <option value="2" name="id-categoria">Bebidas Alcoholicas</option>
                                        <option value="3" name="id-categoria">Bebidas no Alcoholicas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <img id="img-preview" src="" height="300px" width="100%">
                                    <div class="card-footer">
                                        <input type="file" id="img-uploader" name="url-img" value="">
                                        <progress id="img-upload-bar" value="0" max="100" style="width: 100%"></progress>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validation01">url</label> <input id="in-url" type="text" class="form-control" placeholder="Ingrese Descripción" name="url" value=" " >
                                </div>
                                    <input type="submit" class="btn btn-success" value="Ingresar" name="agregar">
                            </form>
                            
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="js/cargarImagen.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>

</body>

</html>
<?php
?>