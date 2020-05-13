<?php 
    session_start();    
    $varSesion = $_SESSION['usuario'];


    if($varSesion == null || $varSesion== ""){
        echo "No tiene acceso a esta pagina";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="shortcut icon" type="image/x-icon" href="icono.ico">
    <link rel="stylesheet" href="../../css/estilos2.css">
</head>

<body>
    <div class="contenido">
        <header class="cabecera">
            <h1>Usuario: <?php echo $varSesion ?></h1>
        </header>
    

        <div class="opciones">
            <a target="_blank" href="datosTrabajador.php"> Ver Datos del trabajador</a>
            <br/>
            <br/>
            <a href="cerrarSesion.php"> Cerrar sesion </a>
        </div>
        <br /> <br />
        <footer>
                Derechos reservados </br>
                <time datetime="12-04-2020"> Publicado 12/04/2020 </time>
        </footer>
 </div>   
</body>
</html>