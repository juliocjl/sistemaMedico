<?php

    //se conecta con la base de datos
    $conexion= mysqli_connect('localhost:3307','root','', sistemamedico);

        if ($conexion->connect_error){
            echo "No se puede conectar";
            //die($conectar->connect_error);
        }else
            echo "conectado correctamente";
