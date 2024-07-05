<!doctype html>
<html>
    <head>
        <title>Poblar Select con jQuery, Select2 PDO MySQL</title>
        
        <meta charset="UTF-8">
        <!-- jQuery -->
        <script src='assets/js/jquery-3.4.1.min.js' type='text/javascript'></script>

        <!-- Styles -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
      <div class="main">
            <h1>Select Buscador Usuarios</h1>
                <select id='usuarios' name="usuarios" style='width: 200px;'>
                    <option value='0'>- Buscar usuarios -</option>
                </select>
          </div>


        <script>
            //CARGAR DENTRO DEL CAMPO SELECT LOS NOMBRES DE LOS PROFESORES COMO OPTION dentro del select
            $(window).on("load", function(){
                $.ajax({
                    url : 'proceso.php',
                    type : 'GET',
                    dataType: "json"
                })
                    .done( function(response){
                        let nombre = null;
                        for (let i = 0; i < response.length; i++){
                            nombre = response[i]['nombre'];
                            $('#usuarios').append($('<option>', {
                                value: nombre,
                                name : nombre,
                                id : nombre,
                                text : nombre
                            }));
                        }
                    })
            });
        </script>
    </body>
</html>