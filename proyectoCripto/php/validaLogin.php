<?php
    //if (isset($_POST('submit') )) {
        include 'conexion.php';

        $usuario = $_POST['usuario'];
        $passLogin = $_POST['passLog'];

        echo "<br /> $usuario : ".$passLogin . "<br />";
        
        //Se verifica primero que no exista un usuario con la misma curp, correo o rfc
        //  Se realiza consulta a tabla de pasientes
        $consultaPaciente = "SELECT * FROM pacientes WHERE correo = '$usuario'";
        $verifica_usuario_paciente = mysqli_query($conexion, $consultaPaciente);
        $filasPacientes = mysqli_num_rows($verifica_usuario_paciente);
        echo $filasPacientes. "<br />";

        //  Se realiza consulta a tabla de pasientes
        $consultaMedicos = "SELECT * FROM personalmedico WHERE correo = '$usuario'";
        $verifica_usuario_medico = mysqli_query($conexion, $consultaMedicos);
        $filasMedicos = mysqli_num_rows($verifica_usuario_medico);

        //  Se realiza consulta a tabla de pasientes
        $consultaSecundario = "SELECT * FROM personalsecundario WHERE correo = '$usuario'";
        $verifica_usuario_secundario = mysqli_query($conexion, $consultaSecundario);
        $filasSecundarios = mysqli_num_rows($verifica_usuario_secundario);


        if ( $filasPacientes > 0){
            $row = $verifica_usuario_paciente -> fetch_assoc();
            //while ($row = $verifica_usuario_paciente -> fetch_assoc() ){
              //var_dump($row);
            //}
            $hash = trim($row['pass']);
            echo "<br />". $hash . "<br />";
            
            if( !(password_verify($passLogin, $hash)) ){
                echo "El usuario no existe m";
                exit;
            }
            else{
                echo "La contraseña es correcta <br/>";
                session_start();
                echo " El usuario es correcto <br/>";
                $_SESSION['usuario'] = $row['correo'];
                header("location:sesiones/sesionPaciente.php");  
            }
            mysqli_close($conexion); //Se cierra conexion
        }elseif ($filasMedicos > 0 ) {
            $row = $verifica_usuario_medico -> fetch_assoc();
            //while ($row = $verifica_usuario_paciente -> fetch_assoc() ){
              //var_dump($row);
            //}
            $hash = trim($row['pass']);
            echo "<br />". $hash . "<br />";
        
            if( !(password_verify($passLogin, $hash)) ){
                echo "El usuario no existe m";
                echo "<br /> Hola: ". $row['nombre'] . "<br />";
                exit;
            }
            else{
                echo "La contraseña es correcta <br/>";
                session_start();
                echo " El usuario es correcto <br/>";
                $_SESSION['usuario'] = $usuario;
                header("location:sesiones/sesionMedico.php");  
            }
            mysqli_close($conexion); //Se cierra conexion
        }elseif ($filasSecundarios > 0 ) {
            # code...
        }

        /*
        //Se comparan las contraseñas
        /*if ( $filasPacientes > 0){
            session_start();
            /**Se comparan las contraseñas, se aplica comparacion para cifrar pass almacenado y el introducido*/
            //$passCifrada = /**funcion para cifrara passLogin */;
          /*      echo " El usuario es correcto ";
                $_SESSION['usuario'] = $usuario;
                header("location:sesiones/sesionPaciente.php");    
        }/*elseif($filasMedicos > 0){
            session_start();
            /**Se comparan las contraseñas, se aplica comparacion para cifrar pass almacenado y el introducido*/
            //$passCifrada = /**funcion para cifrara passLogin */;
            /*if ($verifica_usuario_paciente == $passLogin) {
                //echo " <script> alert("El usuario existe"); </script> ";
                $_SESSION['usuario'] = $usuario;
                header("sesiones/sesionMedico.php");    
            }else{
                echo "Contraseña incorrecta";
                exit;
            }
        }elseif ($filasSecundarios > 0) {
            session_start();*/
            /**Se comparan las contraseñas, se aplica comparacion para cifrar pass almacenado y el introducido*/
            //$passCifrada = /**funcion para cifrara passLogin */;
           /* if ($verifica_usuario_paciente == $passLogin) {
                //echo " <script> alert("El usuario existe"); </script> ";
                $_SESSION['usuario'] = $usuario;
                header("sesiones/sesionSecundario.php");    
            }else{
                echo "Contraseña incorrecta";
                exit;
            }
        }*/
        
    //}else{ 
//}

/*
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Verificacion </title>
    <link rel="shortcut icon" type="image/x-icon" href="icono.ico">
    <link rel="stylesheet" href="../css/estilos2.css">
</head>

<body>
    <div class="contenido">
        <header class="cabecera">
            <h1>
                Datos almacenados correctamente
            </h1>
        </header>

        <form>
            <input type="button" value="Pagina de inicio">
        </form>

    </div>
</body>
</html>
*/
?>