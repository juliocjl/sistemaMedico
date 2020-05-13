<?php
    include 'conexion.php';

    $nombre = $_POST["nombre"];    
    $apellido1 =$_POST['apellido1'];
    $apellido2 =$_POST['apellido2'];
    $correo=$_POST['correo'];
    $pass=$_POST['pass'];
    $tipoPersonal=$_POST['tipoPersonal'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $telefono=$_POST['telefono'];
    $curp=$_POST['curp'];
    $rfc=$_POST['rfc'];
    $area=$_POST['area'];

 //Se verifica primero que no exista un usuario con la misma curp y correo
    $verifica_usuario = mysqli_query($conexion, "SELECT * FROM pacientes WHERE correo = '$correo'");
    if ( mysqli_num_rows($verifica_usuario) > 0){
        echo "El usuario ya existe en el registro";
        exit;
    }else{
        /**Se cifra la contraseña */
        $passCifrado = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

        /*  Se insertan los datos del formulario en la base de datos */ 
        $comando="INSERT INTO personalmedico(nombre, apellidoP, apellidoM, correo, pass, 
                                            tipoPersonal, direccion, cp, telefono, curp, rfc, area) 
                            VALUES('$nombre','$apellido1', '$apellido2', '$correo', '$passCifrado', 
                            '$tipoPersonal', '$direccion','$cp', '$telefono', '$curp', '$rfc', '$area')";

        $ejecutar = mysqli_query($conexion, $comando);

        if (!$ejecutar) {
            echo "Error al guardar datos";
        } else{
            echo '<script> alert("datos guardados correctamente"); <script/>';
            
            header("location:../../../index.html"); 
        }
    }

    mysqli_close($conexion); //Se cierra conexion

?>
