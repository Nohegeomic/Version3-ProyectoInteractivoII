<?php

include('db.php');

$CORREO=$_POST['correo'];
$CONTRASENIA=$_POST['contrasenia'];


$consulta = "SELECT* FROM usuarios where correo = '$CORREO' and contrasenia ='$CONTRASENIA' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:main.html");

}else{
    include("index.html");
    ?>
    <h1>ERROR DE AUTENTIFICACION</h1>
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>