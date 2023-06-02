
//Alertify theme boostrap

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";

/* ########################################################################################## */

//CONFIGURACION DEL DATATABLE

$(document).ready(function () {
$("#example").DataTable({
    responsive: true,
    lengthMenu: [
    [6, 10, 25, -1],
    [6, 10, 25, "All"],
    ],
    scrollCollapse: true,
    info: false,
    ordering: false,
    dom: "ftipr",
    language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
    },
    oAria: {
        sSortAscending:
        ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
    },
});
})

/* ########################################################################################## */

let ux = window.location.pathname
let url = ux.split("/")

/* ########################################################################################## */

const menu = document.querySelectorAll(".menu > ul > li")
menu.forEach(elemt => {
    if(elemt.dataset.name != undefined){
        if(url[2] == elemt.dataset.name)
            elemt.classList.add("active")
    }
})

/* ########################################################################################## */

const form = document.querySelector(".form")
const agregar = document.querySelector(".agregar")
if(agregar != null){
    agregar.addEventListener("click", (event) =>{
        event.preventDefault()
        let vocal
        let valor = {}

        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select');

        selects.forEach(e => {
            if(e.value!="")
                valor[e.name] = e.value
        })
        
        inputs.forEach(e =>{
            if(e.classList.contains('select-input') == false){
                if(e.value!="")
                    valor[e.name] = e.value
            }
    
        })
        
        if(url[2] == "categoria" || url[2] == "marca") {vocal = "a"} else {vocal = "e"}

       /*  alertify.confirm('<b>Mensaje</b>', '<center>¿Desea agregar est'+vocal+' nuev'+vocal+' '+url[2]+'?</center>', function(){  */
            /* form.submit() */
            $.post('/'+url[1]+'/'+url[2]+'/agregar', valor , function(resp){
                alertify.alert("<b>Mensaje</b>", "<center>"+resp+"</center>", function(){
                    window.location.reload();
                })
            })
       /*  }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'}); */
    })
}

/* ########################################################################################## */

const actualizar = document.querySelector(".actualizar")
if(actualizar != null){
    actualizar.addEventListener("click", (event) =>{
        event.preventDefault()

        let valor = {}

        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select');

        selects.forEach(e => {
            if(e.value!="")
                valor[e.name] = e.value
        })
        
        inputs.forEach(e =>{
            if(e.classList.contains('select-input') == false){
                if(e.value!="")
                    valor[e.name] = e.value
            }
    
        })
       /*  alertify.confirm('<b>Mensaje</b>', '<center>¿Esta seguro que desea actualizar estos datos?</center>', function(){  */
            $.post('/'+url[1]+'/'+url[2]+'/actualizar', valor , function(resp){
                alertify.alert("<b>Mensaje</b>", "<center>"+resp+"</center>", function(){
                    window.location.reload();
                })
            })
       /*  }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'}); */
    })
}

/* ########################################################################################## */

const options = { timeZone: 'America/Caracas', year: 'numeric', month: 'numeric', day: 'numeric' };
const fecha = new Date().toLocaleDateString('es-VE', options);

const dia = new Date().getDate();
const mes = new Date().getMonth() + 1; // Sumamos 1 porque getMonth() devuelve un número entre 0 y 11
const anio = new Date().getFullYear();


/* ########################################################################################## */

function unique(data, callback) {
    let table 
    url[2] == 'producto' ? table = 'productos' : table = url[2]
    $.post('/'+url[1]+'/system/unique', { dato: data.valor, tabla: table, campo: data.campo }, function(r){
        data = JSON.parse(r)
        data.verify == true ? document.querySelector('.'+table+'-unique').innerHTML = "Ya esta registrado en la base de datos" : document.querySelector('.'+table+'-unique').innerHTML = ""
        callback(data.verify)
    })

}