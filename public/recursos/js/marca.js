function editar(valor){
    $.post('/'+url[1]+'/'+url[2]+'/editar', { id: valor }, function(data){
        resp = JSON.parse(data)
        let nombre = resp.nombre.charAt(0).toUpperCase() + resp.nombre.slice(1);
        document.querySelector('[name=emarca]').value = nombre
        document.querySelector('[name=id]').value = resp.id
    })
}

/* ########################################################################################## */


function eliminar(valor){
    alertify.confirm("<b>Mensaje</b>", "<center>¿Esta seguro que desea eliminar estos datos?</center>", function(){
        $.post('/'+url[1]+'/'+url[2]+'/eliminar', { id: valor }, function(resp){
            if(resp == "true"){
                alertify.alert("<b>Mensaje</b>", "<center>Eliminado con éxito</center>", function(){
                    window.location.reload()
                })
            }
        })
    }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'})
}

/* ########################################################################################## */

const botton_a = document.querySelector(".agregar")

if(botton_a != null)
    botton_a.disabled = true

function validara(data){
    unique({valor: data.value, campo: data.name}, function(result) {
        if(data.value == "" || result == true)
            botton_a.disabled = true
        else
            botton_a.disabled = false 
    });
}

/* ########################################################################################## */

const botton_e = document.querySelector(".actualizar")

function validare(data){
    if(data.value == "")
        botton_e.disabled = true
    else
        botton_e.disabled = false
}