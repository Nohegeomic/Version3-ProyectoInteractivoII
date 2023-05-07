<?php
include 'Calendar.php';
$calendar = new Calendar(date('Y-m-d'));
//Ejemplo de como poner un evento en el calendario linea 5
// $calendar -> add_event('fox mccloud', '2023-05-25',1,'blue');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		<link href="Calendario.css" rel="stylesheet" type="text/css">
		<link href="calendar.css" rel="stylesheet" type="text/css">


		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">

		


    	<title>Calendario</title>

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

				<!--Esto esta comentado por la falta de imagen -->
                    <!--<a href="perfil.html" class="logo">
                         <img src="<?php echo $fileSRC;?>" class="img-fluid">
                         <span class="nav-item"><?php echo $_SESSION['Nom']." ".$_SESSION['Apel'];?></span>
                    </a>-->
                </li>
                <li class="nav-2"><a href="main.php" class="icon-sidebar">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li class="nav-3"><a href="Calendario.php" class="icon-sidebar">
                    <i class="fas fa-calendar "></i>
                    <span class="nav-item">Calendario</span>
                </a></li>
                <li class="nav-4">
                	<!--BOTON PARA MODAL SUBIR PUBLICACION -->
                	<a href="#" type="button" data-toggle="modal" data-target="#subir-publicacion" class="icon-sidebar">
                    <i class="fas fa-plus"></i>
                    <span class="nav-item">Agregar publicacion</span>
                	</a>
            	</li>
                <li class="nav-4">
                	<a href="#" type="button" data-toggle="modal" data-target="#subir-historia" class="icon-sidebar">
                    <i class="fas fa-plus"></i>
                    <span class="nav-item">Subir Historia</span>
                	</a>
                </li>
                <li class="nav-5"><a href="#" class="icon-sidebar log-out" onclick="botonSalir()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Cerrar Sesion</span>
                </a></li>
            </ul>
        </nav>








        <!--Pop up de botonSalir -->
        <div id="ventanaSalir" class="modal container-fluid" style="display: none;">
            <div class="contenidoSalir">
                <h4>¿Estás seguro que quieres cerrar sesión?</h4>
                <div class="opcionesSalir">
                    <a href="index.php" class="botonSi">SI</a>
                    <a onclick="botonSalir()" href="#" class="botonNo">NO</a>
            </div>
            </div>
        </div>







		<section id="columnacentral">


            <!----------------------Barra de Busqueda----------------------->
            <div class="container-fluid">
                <div class="busqueda">
                    <input id="taskInput" type="text" placeholder="Buscar...">
                </div>
            </div>



           
            <section id="content home">

			<?=$calendar?>

            </section>

        </section>





		
		
	</body>
</html>