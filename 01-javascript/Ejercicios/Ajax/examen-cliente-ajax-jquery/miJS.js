
//**********************************************************************************************************************
//Comprueba si el id de usuario existe en la BD.
$("#idProfesor").on("focusout", function(){
    let login = $(this).val();
    $.ajax({
        url : 'compruebaDisponibilidad.php',
        data : {idProfesor : login },
        type : 'POST',
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


//**********************************************************************************************************************
//Filtro para la BD. Muestra los profesores que son de un tipo
$("#profEspecialidad").on("change", function(){
    let especialidad = $("option:selected",this).val();
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
            "<td>" + response[i]['sede'] + "</td>" +
            "<td>" + response[i]['sedeExamen'] + "</td>" +
            "</tr>";
        $("#tablaResultado tbody").append(tr_str);
    }
}


//*********************************************************************************
//POR AJAX -> Guardar información recogida en el formulario en un BD a través de ajax
$("#ajax").on("click", function(evt){
    evt.preventDefault();


    //Recogemos los valores del formulario
    let especialidades = [];

    let idProfesor = $("#idProfesor").val();

    let sede = $("#sede option:selected").text();

    $("input:checkbox:checked").each(function(){
        especialidades.push($(this).val());
    })

    let sedeExamen = $("input[name='sedeExamen']:checked").next().text();
    alert (sedeExamen);

    let password = $("#password").val();

    // Realizamos la peticón AJAX de inserción en la BD
    $.ajax({
        url: 'insertarProfesor.php',
        data: {
            "idProfesor"    : idProfesor,
            "sede"          : sede,
            "sedeExamen"    : sedeExamen,
            "tipo"          : especialidades[0],
            "password"      : password
        },
        type:   'POST',
        dataType : 'json',
    })
        .done(function(response) {
            alert('OK');
        })
        .error = response => {
        console.log("Erorr!!!!!")
    }
})


//*********************************************************************************
//POR FETCH -> Guardar información recogida en el formulario en un BD a través de fetch
$("#fetch").on("click", function(evt){
    evt.preventDefault();
    let especialidades = [];
    $("input:checkbox:checked").each(function(){
        especialidades.push($(this).val());
    })

    let data = new FormData();
    data.append('idProfesor' , $("#nombreUsuario").val());


    fetch ('crear-usuario.php', {
        method: 'POST',
        body: data,
    })
        // Converting to JSON
        .then(response => response.json())
        .then(data => {
            //Se crea el profesor y se guarda el ID en una cookie
            console.log(data);
        })
        .catch(function(evt) {
            console.log(evt);
            alert("ERROR!!!. Usuario no creado. Intentalo con otro ID.");
        });
})




