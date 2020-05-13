<?php

    session_start();    
    //$varSesion = $_SESSION['usuario'];
    include '../conexion.php';
    $paciente = $_POST['busqueda'];

    $consulta = "SELECT * FROM pacientes WHERE numExpediente = '$paciente'";
    //$resultado = $mysqli->query($consulta);
    $resultado = mysqli_query($conexion, $consulta);
    $filasExp = mysqli_num_rows($resultado);
    


    if($filasExp > 0 ){
        $row = $resultado -> fetch_assoc();
        echo "La contraseña es correcta <br/>";
        session_start();
        echo " El expediente existe <br/>";
        $_SESSION['usuario'] = $row['correo'];
        header("location:expediente.php");  
    }else{
        echo "<br/>"."El usuario no existe";
        header('location:sesionPM.php');
    }
?>