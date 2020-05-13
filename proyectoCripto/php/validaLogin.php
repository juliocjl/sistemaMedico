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
        $filasPM = mysqli_num_rows($verifica_usuario_medico);


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
        }elseif ($filasPM > 0 ) {
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
                if($row['tipoPersonal'] == 'Tecnico' || $row['tipoPersonal'] == 'Administrativo' || $row['tipoPersonal'] == 'Otro'){
                    echo "La contraseña es correcta <br/>";
                    session_start();
                    echo " El usuario es correcto <br/>";
                    $_SESSION['usuario'] = $usuario;
                    header("location:sesiones/sesionPS.php"); 
                }else{
                    echo "La contraseña es correcta <br/>";
                    session_start();
                    echo " El usuario es correcto <br/>";
                    $_SESSION['usuario'] = $usuario;
                    header("location:sesiones/sesionPM.php");  
                }
            }
            mysqli_close($conexion); //Se cierra conexion
        }
?>
       
