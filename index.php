<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ./includes/login.php");
    die();
    
    

}



?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
</head>

<body id="page-top">

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
<form  action="" method="POST">

                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                  <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel"  id="telefono" name="telefono" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector..">
                             
                            </div>
                      
                        
       
                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="registrar">
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                        

                        </form>

<script src="./package/dist/sweetalert2.all.js"></script>
<script src="./package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var nombre 	= $('#nombre').val();
			var correo 		= $('#correo').val();
			var telefono = $('#telefono').val();
			var password 	= $('#password').val();
			var rol	= $('#rol').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: '../includes/validar.php',
					data: {nombre: nombre,correo: correo, telefono: telefono,password: password, rol: rol},
					success: function(data){
					Swal.fire({
								'title': '¡Mensaje!',
								'text': data,
                                'icon': 'success',
                                'showConfirmButton': 'false',
                                'timer': '1500'
								}).then(function() {
                window.location = "user.php";
            });
							
					} ,
                    
					error: function(data){
						Swal.fire({
								'title': 'Error',
								'text': data,
								'icon': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
    
	
</script>
</body>
</html>