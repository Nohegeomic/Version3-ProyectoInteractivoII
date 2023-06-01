<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'includes/funciones.inc.php';
require_once 'includes/dbh.inc.php';

$sqlpost = "SELECT ID,titulo_evento, desc_evento, foto_evento, fecha_ini_evento, fecha_final_evento FROM eventos_posts ORDER BY ID DESC";
$resultpost = mysqli_query($conn, $sqlpost);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>ArtVault</title>
</head>

<body>
<nav id="navbar-side">
            <ul>
                <li>
                    <a href="main.php" class="logo-sidebar">
                        <img src="images/unitec_mini.png" class="img-fluid logo-unitec" alt="unitec_mini">
                    </a>
                </li>
                <li class="nav-1">
                    <a href="perfil.html" class="logo">
                        <img src="images/baba.jpg" class="img-fluid">
                         /*<span class="nav-item"><?php echo $_SESSION['Nom']." ".$_SESSION['Apel'];?></span>*/
                    </a>
                </li>
                <li class="nav-2"><a href="main.php" class="icon-sidebar">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li class="nav-2"><a href="#" class="icon-sidebar">
                    <a href="#" type="button" data-toggle="modal" data-target="#agregar-Evento" class="icon-sidebar">
                    <i class="fas fa-plus"></i>
                    <span class="nav-item">Agregar Evento Angel Penudo</span>
                </a></li>

                <!-- BOTON PARA MODAL SUBIR PUBLICACION
                <a href="#" type="button" data-toggle="modal" data-target="#subir-publicacion" class="icon-sidebar">
                    <i class="fas fa-plus"></i>
                    <span class="nav-item">Agregar publicacion</span>
                </a> -->


            </ul>
        </nav>
        <section id="columnacentral">
                        <?php
                        while ($row = mysqli_fetch_array($resultpost)) {
                        ?>
                            <div class="container publicacion">
                                    <div class="row post-header">
                                        <article class="col-2">
                                        <img src="images/baba.jpg" class="img-fluid">
                                            <!-- <img src="<?php //echo $row['foto_evento'];?>" class="img-fluid post-profile" alt="Profile-user"> -->
                                        </article>
                                        <article class="col-10 container-fluid">
                                        <h1 class="titulo"><?php echo $row['titulo_evento']; ?></h1> <!aqui va el titulo!>
                                                <p><?echo $row['desc_evento']?></p> <!aqui va la descripcion!>
                                        </article>
                                    </div>
                                    
                                    <div class="post-img">
                                        <img src="imgvista_evento.php?image_id=<?php echo $row['ID']?>" class="img-fluid"  width="300" height="300"> <!de aqui salen las fotos!>
                                    </div>

                                    <div class="container" >
                                        <p>Fecha de inicio <?php echo $row ['fecha_ini_evento']?></p> 
                                        <p>Fecha de finalizacion <?php echo $row ['fecha_final_evento']?></p>
                                        <p>Descripcion rapida de lo que va a tomar el evento <?php echo $row ['desc_evento']?></p>
                                    </div>
                            </div>
                        <?php
                        }?>
        </section>

        <!-- POP UP EVENTO NUEVO-->

        <div class="modal fade" id="agregar-Evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

			<div class="modal-dialog m-container" role="document">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="ion-ios-close"><i class="fas fa-times"></i></span>
				  </button>

					<div class="modal-content m-content">
					    <div class="modal-body p-4 p-md-5">


					    	<form method="post" action="INTOEVENTS.php" class="form-container" enctype="multipart/form-data">
                                <div class = "container Nombre de Evento">
                                    <h1 class = "titulo">Nombre del Evento</h1>
                                    <textarea name="descripcion" rows="5" cols="30"></textarea>
                                </div>
			                    <div class="container subir-img">
			                        <h1 class="titulo">Subir imagen</h1>
			                            <div class="container upload-container" >
                                              <!-- Se agrego el required para que el usuario este forzado a agregar una img -->
				                              <input type="file" name="postImage" class="uploadFile" value="Upload Photo" required>
			                        	</div>
			                    </div>
			                    <div class="container post-descripcion">
			                        <label for="descripcion"><b>Descripción del post</b></label>
			                        <br>
			                        <textarea name="descripcion" rows="5" cols="30"></textarea>
			                        <br>
			                        
			                    </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-blue">Listo</button>
			                    <input href="#" type="submit" data-dismiss="modal" aria-label="Close" value="Cancelar" class="btn-red cerrar">
              				</form>

			            </div>
				    </div>
			</div>
		</div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>