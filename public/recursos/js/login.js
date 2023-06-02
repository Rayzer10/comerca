const boton = document.querySelector(".boton-login")
boton.addEventListener("click", (event) =>{
    const user = document.querySelector("[name=username]").value
    const pass = document.querySelector("[name=password]").value
    event.preventDefault()
    $.ajax({
        url: "Login/login",
        type: "POST",
        data: ("username="+user+"&password="+pass),
        success:function(resp){
            if(resp == "true")
                window.location = "tablero"
            else
                alertify.alert('<b>Mensaje</b>', '<center>'+resp+'</center>');
        }
    })
})

