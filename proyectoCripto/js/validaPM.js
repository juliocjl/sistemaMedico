function validarPM() {
    var nombre = document.getElementById('nombre').value;/*,
    apellido1 = document.getElementById('apellido1').value, 
    apellido2 = document.getElementById('apellido2').value
    correo = document.getElementById('correo').value, exp = /\w+@\w+\.[a-z]/
    pass = document.getElementById('pass').value,
    personal = document.getElementById('personal').value, 
    direccion = document.getElementById('direccion').value,
    cp = document.getElementById('cp').value,
    curp = document.getElementById('curp').value,
    rfc = document.getElementById('rfc').value,
    tipoPersonal = document.getElementById('tipoPersonal'),
    area = document.getElementById('area').value
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
    }else if(personal === ""){
        alert("Debe seleccionar un genero");
        return false;
    }else if( curp > 19 || curp < 18 ){
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