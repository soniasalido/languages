<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Actualizar varias filas con CheckBox en PHP usando Ajax | BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Actualizar varias filas con CheckBox en PHP usando Ajax</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
   <div class="table-responsive">  
    <form method="post" id="update_form">
<div align="right" style="margin:5px;">
    <button name="multiple_update" id="multiple_update" class="btn btn-primary">Actualizacion Multiple</button>
</div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <th width="4%"></th>
                                <th width="18%">Nombres</th>
                                <th width="22%">Direccion</th>
                                <th width="14%">Genero</th>
                                <th width="13%">Area</th>
                                <th width="8%">Edad</th>
                                <th width="11%">Estado</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </form>
   </div>  
  </div>
 
<script>
    //CARGAR DENTRO DEL CAMPO SELECT LOS NOMBRES DE LOS PROFESORES COMO OPTION dentro del select
    $(window).on("load", function(){
        cargarDatos();

        //FUNCION QUE CARGA LOS DATOS NADA MÁS LOAD PAGINA
        function cargarDatos(){
            $.ajax({
                url:"cargarDatos.php",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                    let html = '';
                    for(let count = 0; count < data.length; count++)
                    {
                        html += '<tr>';
                        html += '<td><input type="checkbox" id="'+data[count].id+'" data-idProfesor="'+data[count].idProfesor+'" data-nombre="'+data[count].telefono+'" data-genero="'+data[count].genero+'" data-area="'+data[count].area+'" data-edad="'+data[count].edad+'" data-estado="'+data[count].estado+'" class="check_box"  /></td>';
                        html += '<td>'+data[count].nombres+'</td>';
                        html += '<td>'+data[count].direccion+'</td>';
                        html += '<td>'+data[count].genero+'</td>';
                        html += '<td>'+data[count].area+'</td>';
                        html += '<td>'+data[count].edad+'</td>';
                        html += '<td>'+data[count].estado+'</td></tr>';
                    }
                    $('tbody').html(html);
                }
            });
        }

        //FUNCION QUE CUANDO HACE ACTÚA CUANDO SE HACE CLICK SOBRE UN  CHECKBUTTON
        $(document).on('click', '.check_box', function(){
            var html = '';
            if(this.checked)
            {
                html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-nombres="'+$(this).data('nombres')+'" data-direccion="'+$(this).data('direccion')+'" data-genero="'+$(this).data('genero')+'" data-area="'+$(this).data('area')+'" data-edad="'+$(this).data('edad')+'" data-estado="'+$(this).data('estado')+'" class="check_box" checked /></td>';
                html += '<td><input type="text" name="nombres[]" class="form-control" value="'+$(this).data("nombres")+'" /></td>';
                html += '<td><input type="text" name="direccion[]" class="form-control" value="'+$(this).data("direccion")+'" /></td>';
                html += '<td><select name="genero[]" id="genero_'+$(this).attr('id')+'" class="form-control"><option value="'+$(this).data("genero")+'">'+$(this).data("genero")+'</option>  <option value="Masculino">Masculino</option><option value="Femenino">Femenino</option></select></td>';
                html += '<td><input type="text" name="area[]" class="form-control" value="'+$(this).data("area")+'" /></td>';
                html += '<td><input type="text" name="edad[]" class="form-control" value="'+$(this).data("edad")+'" /></td>';
                html += '<td><input type="text" name="estado[]" class="form-control" value="'+$(this).data("estado")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
            }
            else
            {
                html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-nombres="'+$(this).data('nombres')+'" data-direccion="'+$(this).data('direccion')+'" data-genero="'+$(this).data('genero')+'" data-area="'+$(this).data('area')+'" data-edad="'+$(this).data('edad')+'" data-estado="'+$(this).data('estado')+'" class="check_box" /></td>';
                html += '<td>'+$(this).data('nombres')+'</td>';
                html += '<td>'+$(this).data('direccion')+'</td>';
                html += '<td>'+$(this).data('genero')+'</td>';
                html += '<td>'+$(this).data('area')+'</td>';
                html += '<td>'+$(this).data('edad')+'</td>';
                html += '<td>'+$(this).data('estado')+'</td>';
            }
            $(this).closest('tr').html(html);
            $('#genero_'+$(this).attr('id')+'').val($(this).data('genero'));
        });


        //FUNCION QUE ACTUALIZA EL LISTADO CUANDO SE HACE CLICK EN EL BOTON SUBMIT
        $('#update_form').on('submit', function(event){
            event.preventDefault();
            if($('.check_box:checked').length > 0)
            {
                $.ajax({
                    url:"ActualizacionMultiple.php",
                    method:"POST",
                    data:$(this).serialize(),
                    success:function()
                    {
                        alert('Registro(s) Actualizado(s).');
                        fetch_data();
                    }
                })
            }
        });

    });
</script>

      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>