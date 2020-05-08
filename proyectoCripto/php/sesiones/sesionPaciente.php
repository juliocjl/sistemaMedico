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
            <h1>Bienvenido: <?php echo $varSesion ?></h1>
        </header>
    

        <div class="opciones">
            <a target="_blank" href="expediente.php"> Ver Expediente</a>
            <br/>
            <br/>
            <a href="cerrarSesion.php"> Cerrar sesion </a>
        </div>
 </div>   
</body>
</html>