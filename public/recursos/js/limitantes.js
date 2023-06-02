// JavaScript Document
function limitar(e, contenido, caracteres) {
    // obtenemos la tecla pulsada
    var unicode = e.keyCode ? e.keyCode : e.charCode;
  
    // Permitimos las siguientes teclas:
    // 8 backspace
    // 46 punto
    // 13 enter
    // 9 tabulador
    // 37 izquierda
    // 39 derecha
    // 38 subir
    // 40 bajar
    if (
      unicode == 8 ||
      unicode == 46 ||
      unicode == 13 ||
      unicode == 9 ||
      unicode == 37 ||
      unicode == 39 ||
      unicode == 38 ||
      unicode == 40
    )
      return true;
  
    // Si ha superado el limite de caracteres devolvemos false
    if (contenido.length >= caracteres) return false;
  
    return true;
  }
  
  function soloNumeros(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    /* /\d/ */
    return /^-?\d+(?:,\d+)?$/.test(String.fromCharCode(keynum));
  }
  
  function soloLetras_space(e) {
    var key = window.event ? window.event.keyCode : e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    return /^[a-zA-Z\u00C0-\u017F-\u002E\s]+$/.test(tecla);
  }
  
  function soloLetras(e) {
    var key = window.event ? window.event.keyCode : e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    return /^[a-zA-Z\u00C0-\u017F]+$/.test(tecla);
  }
  
  function sinespacios(e) {
    key = e.keyCode || e.which;
    if (key == 32) return false;
  }
  
  function blockleft(e) {
    key = e.keyCode || e.which;
    if (key == 37) return false;
  }

  function Mayus(input){
    input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1).toLowerCase() 
  }
  