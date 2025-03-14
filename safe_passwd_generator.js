function safepasswd(longitud){
    longitud = 18;
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz@#$%^&*_+";
    let passwd = "";
    for (let i = 0; i < longitud; i++){
      passwd += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
    }
    return passwd;
  }
  
  safepasswd();

  //No usado en la aplicación, posible implementación en un futuro para generar contraseñas seguras para los usuarios.