function validarLogin() {

    var correo = document.getElementById('usuario').value, exp = /\w+@\w+\.[a-z]/,
    curp = document.getElementById('usuario').value,
    rfc = document.getElementById('usuario').value,
    pass = document.getElementById('pass').vcorreo
    ;
   
    
    if ( !(exp.test(correo) || correo===""){
        alert("Usuario incorrecto");
        return false;
    }else if(pass === "" || pass > 50 || pass < 8){
        alert("Constraseña invalida");
        return false;
    }else if( curp>19 || curp<18 || curp=== "" ){
        alert("Revisar usuaio");
        return false;
    } else if(rfc === ""  || rfc>13 || rfc<12){
        alert("Revisar usuario");
        return false;
    }
}