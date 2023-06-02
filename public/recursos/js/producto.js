const btn_agregar = document.querySelector(".agregar");

if(btn_agregar != null){
  btn_agregar.disabled = true
  var names = ['codigo', 'nombre', 'fecha', 'fecha_vencimiento', 'cantidad', 'categoria', 'marca']
  names.forEach(e =>{
    document.querySelector("[name="+e+"]").disabled = true
  })
}

function rif_prov(){
    names.forEach(e =>{
        document.querySelector("[name="+e+"]").disabled = false
    })
}

function verify_prod() {
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

    unique({valor: array_input[3], campo: 'codigo'}, function(result) {
      if(array_input.includes(null) || result == true)
          btn_agregar.disabled = true
      else 
        btn_agregar.disabled = false
    })
}

/* ########################################################################################## */

const btn_actualizar = document.querySelector(".actualizar");

if(btn_actualizar != null)
  btn_actualizar.disabled = true

function verify_prode() {
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

/* const boton = document.querySelector(".btn-delete")

if(boton != null){
  boton.addEventListener("click", () =>{
    const codigo = document.querySelector("[name=codigo_delete]").value
      alertify.confirm("<b>Mensaje</b>", "<center>¿Esta seguro que desea eliminar estos datos?</center>", function(){
        $.ajax({
          url:'/'+url[1]+'/producto/eliminar',
          type:"POST",
          data: ("codigo="+codigo),
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
} */

function eliminar(valor){
  let codigo = valor
  alertify.confirm("<b>Mensaje</b>", "<center>¿Esta seguro que desea eliminar estos datos?</center>", function(){
    $.ajax({
      url:'/'+url[1]+'/producto/eliminar',
      type:"POST",
      data: ("codigo="+codigo),
      success:function(resp){
        if(resp == "true"){
          alertify.alert("<b>Mensaje</b>", "<center>Eliminado con éxito</center>", function(){
              window.location.reload()
          })
        }
      } 
    })
  }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'})
}

/* ########################################################################################## */

function details(valor){
  let data
  let result = ""
  $.post('/'+url[1]+'/producto/details', { codigo: valor }, function(resp){
    data = JSON.parse(resp)
    result +=`
      <div class="row">
        <div class="col col-md-4"><b>CÓDIGO</b></div>
        <div class="col col-md-4"><b>CANTIDAD</b></div>
        <div class="col col-md-4"><b>FECHA</b></div>
      </div>
    `
    data[0].forEach(e =>{
      result += `
        <div class="row">
          <div class="col col-md-4">${e.codigo.toUpperCase()}</div>
          <div class="col col-md-4">${e.cantidad}</div>
          <div class="col col-md-4">${e.fecha}</div>
        </div>
      `
    })
    document.querySelector('.detailsresp'+valor).innerHTML = result
  })
}

/* ########################################################################################## */

window.onload = function() {
  const botonesVendidos = document.querySelectorAll('.btn-vendidos');
  botonesVendidos.forEach(boton => {
    boton.disabled = true; 
  });
}

function validar(data){
    const boton = document.querySelectorAll('.btn-vendidos')
    boton.forEach(e =>{
      if(e.dataset.codigo == data[1] && data[0].value!="")
        e.disabled = false
      else
        e.disabled = true
    })
}

function sale(codigo){
  var ven = document.querySelector("[name=vendidos"+codigo+"]")
  var nombre = document.querySelector("[name=nombre"+codigo+"]")
  let datos = {'codigo': codigo, 'nombre': nombre.value, 'venta': ven.value }
  $.ajax({
    url:'/'+url[1]+'/producto/ventas',
    type:"POST",
    data: (datos),
    success:function(resp){
      if(resp == "false"){
        document.querySelector(".error-venta"+codigo).innerHTML = "La cantidad ingresada no puede ser mayor a la que esta en el almacén"
        document.querySelector(".result-venta"+codigo).innerHTML = ""
      }else{
        document.querySelector(".error-venta"+codigo).innerHTML = ""
        document.querySelector(".result-venta"+codigo).innerHTML = "Venta registrada exitosamente"
      }
    }
  })
}

/* ########################################################################################## */

const btn_descar = document.querySelector(".btn-descar")
if(btn_descar!=null){
  btn_descar.disabled = true

  function vedescar(data){
    data.value != "" ? btn_descar.disabled = false : btn_descar.disabled = true
  }

  btn_descar.addEventListener('click', (event) =>{
    let valor = {}
    event.preventDefault()
    
    const textarea = document.querySelectorAll('textarea');

    if(textarea!=null){
      textarea.forEach(e => {
          if(e.value!="")
              valor[e.name] = e.value
      })
    }
    valor['codigo'] = document.querySelector('[name=codigo]').value
    console.log(valor)
    $.post('/'+url[1]+'/producto/adddescar', valor , function(resp){
      console.log(resp)
      alertify.alert("<b>Mensaje</b>", "<center>"+resp+"</center>", function(){
          window.location.href = '/'+url[1]+'/producto'
      })
    })

  })
}


/* ########################################################################################## */

if(url[2]+"/"+url[3] == "producto/formulario" || url[2]+"/"+url[3] == "producto/editar"){
  var datepickerTranslated = document.querySelector('.datepicker-translated');
  new mdb.Datepicker(datepickerTranslated, {
      title: "Seleccione la Fecha",
      monthsFull: [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
      ],
      monthsShort: [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
      ],
      weekdaysFull: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysNarrow: ["D", "L", "M", "M", "J", "V", "S"],
      okBtnText: "Ok",
      clearBtnText: "Limpiar",
      cancelBtnText: "Cancelar",
      min: new Date(anio, mes - 9, dia + 1),
      max: new Date(anio, mes - 1, dia + 1),
  });

  var datepickerTranslated = document.querySelector('.datepicker-v');
  new mdb.Datepicker(datepickerTranslated, {
      title: "Seleccione la Fecha",
      monthsFull: [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
      ],
      monthsShort: [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
      ],
      weekdaysFull: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysNarrow: ["D", "L", "M", "M", "J", "V", "S"],
      okBtnText: "Ok",
      clearBtnText: "Limpiar",
      cancelBtnText: "Cancelar",
      min: new Date(anio, mes - 9, dia + 1)
  });
}

