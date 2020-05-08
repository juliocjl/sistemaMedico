<?php
    session_start();    
    $varSesion = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesion</title>
</head>
<body>
    <h1> Hasta Pronto <?php echo $varSesion ?></h1>
</body>
</html>



<?php
    session_destroy();
    echo "hasta pronto";
    header("location:../../../index.html");
?>