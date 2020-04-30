function validarP() {
    var nombre = document.getElementById('nombre').value;/*,
    apellido1 = document.getElementById('apellido1').value, 
    apellido2 = document.getElementById('apellido2').value
    correo = document.getElementById('correo').value, exp = /\w+@\w+\.[a-z]/
    pass = document.getElementById('pass').value,
    sexo = document.getElementById('sexo').value, 
    curp = document.getElementById('curp').value, 
    edad = document.getElementById('edad').value,
    estadoCiv = document.getElementById('estado').value,
    sanguineo = document.getElementById('sanguineo').value
    altura = document.getElementById('altura').value, 
    peso= document.getElementById('peso').value,
    area = document.getElementById('area').value,
    fecha = document.getElementById('fecha').value
    ; */


    if ( nombre === "" || nombre.length > 30 || nombre.length < 4) {
        alert("Verificar el campo nombre. ");
        return false;
    }/*
    else if (apellido1 === "" || apellido2 === "" || apellido1.length > 30 || apellido2.length > 30){
            alert("Verificar los campos apellido.");
            return false;
    }else if( !(exp.test(correo)) ){
        alert("Verificar Correo");
        return false;
    }else if(pass === "" || pass > 50 || pass < 8){
        alert("Constraseña invalida")
        return false;
    }else if(sexo === ""){
        alert("Debe seleccionar un genero");
        return false;
    }else if( curp > 18 && curp < 18 ){
        alert("Curp incorrecta");
        return false;
    } else if(estadoCiv === ""){
        alert("Ingrese su estado civil");
        return false;
    } else if ( edad <= 0 || edad > 130){
        alert("Edad incorrecta");
        return false;
    } else if ( sanguineo === "") {
        alert("Seleccione un grupo sanguineo");
        return false;
    }else if(altura<0 || altura > 3 || peso < 0 || peso > 400 ){
        alert("Altura o peso incorrectos");
        return false;
    }else if(fecha ==="" || area ==="" ){
        alert("Rellene campo fecha y area");
        return false;
    }*/
    else{
        alert("Formulario llenado correctamente");
    }
}