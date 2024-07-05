

//Comprueba si el id de usuario existe en la BD.
$("#nombreUsuario").on("focusout", function(){
    let login = $("#nombreUsuario").val();
    $.ajax({
        url : 'compruebaDisponibilidad.php',
        data : {idUsuario : login },
        type : 'GET',
        dataType: "json",
    })
        .done(function(response){
            console.log(response)
            // Una forma de mostrar el response con stringify
            // document.querySelector("div").innerHTML = JSON.stringify(response);

            if (response.length == 1){
                $("#resultadoComprobacionUsuario").text(" ERROR!!! El usuario Existe en la BD");
                $("#resultadoComprobacionUsuario").show(1000);
                $("#resultadoComprobacionUsuario").addClass("error");
            }else{
                $("#resultadoComprobacionUsuario").hide(1000);
            }
        })
        .error = response => {
        console.log("Erorr!!!!!")
    }
});


//*********************************************************************************
//Filtro para la BD. Muestra los profesores que son de un tipo
$("#especialidad").on("change", function(){
    let especialidad = $("#especialidad :selected").val();
    $.ajax({
        url : 'mostrarProfesor.php',
        data : {tipo : especialidad},
        type : 'GET',
        dataType : 'json',
    })
        .done(function(response) {
            mostrarProfesores(response);
        })
        .error = response => {
        console.log("Erorr!!!!!")
    }
});



//Funcion para Mostrar contenido del response en una tabla
function mostrarProfesores(response){
    $("#tablaResultado > tbody").empty();

    //Recorre el resonse para mostrar resultados
    for(let i = 0; i<response.length ; i++) {
        console.log(response[i]['idProfesor']);
        let tr_str = "<tr>" +
            "<td>" + (i+1) + "</td>" +
            '<td>' + response[i]['idProfesor'] + '</td>' +
            "<td>" + response[i]['nombre'] + "</td>" +
            "<td>" + response[i]['apellidos'] + "</td>" +
            "<td>" + response[i]['telefono'] + "</td>" +
            "<td>" + response[i]['password'] + "</td>" +
            "<td>" + response[i]['tipo'] + "</td>" +
            "</tr>";
        $("#tablaResultado tbody").append(tr_str);
    }
}
