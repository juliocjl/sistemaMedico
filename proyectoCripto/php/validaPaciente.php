<?php
    include 'conexion.php';


    $nombre = $_POST["nombre"];    
    $apellido1 =$_POST['apellido1'];
    $apellido2 =$_POST['apellido2'];
    $correo=$_POST['correo'];
    $pass=$_POST['pass'];
    $sexo=$_POST['sexo'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $telefono=$_POST['telefono'];
    $curp=$_POST['curp'];
    $rfc=$_POST['rfc'];
    $nss=$_POST['nss'];
    $edad=$_POST['edad'];
    $estado=$_POST['estado'];
    $hijos=$_POST['hijos'];
    $lugar=$_POST['lugar'];
    $drogas=$_POST['drogas'];
    $medicamentos=$_POST['medicamentos'];
    $sanguineo=$_POST['sanguineo'];
    $alergias=$_POST['alergias'];
    $altura=$_POST['altura'];
    $peso=$_POST['peso'];
    $malestar=$_POST['malestar'];
    $padecimiento=$_POST['padecimiento'];
    $padecimientoFamiliar=$_POST['padecimientoFamiliar'];
    $area=$_POST['area'];
    $tratamiento=$_POST['tratamiento'];
    $fecha=$_POST['fecha'];

 //Se verifica primero que no exista un usuario con la misma curp y correo
    $verifica_usuario = mysqli_query($conexion, "SELECT * FROM pacientes WHERE correo = '$correo'");
    if ( mysqli_num_rows($verifica_usuario) > 0){
        echo "El usuario ya existe en el registro";
        exit;
    }else{
        /**Se cifra la contraseña */
        $passCifrado = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

        /*  Se insertan los datos del formulario en la base de datos */ 
        $comando="INSERT INTO pacientes(nombre, apellidoP, apellidoM, correo, pass, genero, direccion, cp, telefono, 
                                    curp, rfc, nss, edad, edoCivil, numHijos, lugarNac, drogas, medicacion, sanguineo, 
                                    alergias, altura, peso, malestar, enfermedades, parientesEnf, area, tratamiento, fecha) 
                            VALUES('$nombre','$apellido1', '$apellido2', '$correo', '$passCifrado', '$sexo', '$direccion',
                                    '$cp', '$telefono', '$curp', '$rfc', '$nss', '$edad', '$estado', '$hijos', '$lugar', 
                                    '$drogas', '$medicamentos', '$sanguineo', '$alergias', '$altura','$peso', '$malestar',
                                    '$padecimiento', '$padecimientoFamiliar', '$area','$tratamiento','$fecha')";

        $ejecutar = mysqli_query($conexion, $comando);

        if (!$ejecutar) {
            echo "Error al guardar datos";
        } else{
            echo "<script> alert('datos guardados correctamente'); <script/>";
            
            header("location:../../../index.html"); 
        }
    }

    mysqli_close($conexion); //Se cierra conexion

?>
