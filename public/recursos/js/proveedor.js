const btn_agregar = document.querySelector(".agregar");
if(btn_agregar != null)
  btn_agregar.disabled = true

function verify_prove() {
    let array_input = []
    let inputs = document.querySelectorAll("input")
    inputs.forEach(e => {
        e.value === "" ? v = null : v = e.value
        array_input.push(v)
    })

    console.log(array_input[0])
    if(array_input.includes(null)){
        document.querySelector(".msg_campos").classList.add("mb-4")
        document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
    }else{
        document.querySelector(".msg_campos").classList.remove("mb-4")
        document.querySelector(".msg_campos").innerHTML = ""
    }
    unique({valor: array_input[0], campo: 'rif'}, function(result) {
      if(array_input.includes(null) || result == true)
          btn_agregar.disabled = true
      else 
        btn_agregar.disabled = false
    })
}


const btn_actualizar = document.querySelector(".actualizar");
if(btn_actualizar != null)
  btn_actualizar.disabled = true

function verify_provee() {
  let array_input = []
  let inputs = document.querySelectorAll("input")
  inputs.forEach(e => {
      e.value === "" ? v = null : v = e.value
      array_input.push(v)
  })
  if(array_input.includes(null)){
      document.querySelector(".msg_campos").classList.add("mb-4")
      document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
  }else{
      document.querySelector(".msg_campos").classList.remove("mb-4")
      document.querySelector(".msg_campos").innerHTML = ""
  }

  if(array_input.includes(null))
    btn_actualizar.disabled = true
  else 
    btn_actualizar.disabled = false
}

/* ########################################################################################## */

const boton = document.querySelector(".btn-delete")

if(boton != null){
  boton.addEventListener("click", () =>{
    const rif = document.querySelector("[name=rif_delete]").value
      alertify.confirm("<b>Mensaje</b>", "<center>¿Esta seguro que desea eliminar estos datos?</center>", function(){
        $.ajax({
          url:'/'+url[1]+'/proveedor/eliminar',
          type:"POST",
          data: ("rif="+rif),
          success:function(resp){
            if(resp == "true"){
              alertify.alert("<b>Mensaje</b>", "<center>Eliminado con éxito</center>", function(){
                  window.location.reload()
              })
            }
          } 
        })
      }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'})
  })
}