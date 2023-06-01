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
                        }
                        ?>
                        </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>