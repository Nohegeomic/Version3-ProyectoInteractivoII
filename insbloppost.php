<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "includes/dbh.inc.php";
session_start();

$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

if (!$result)
	die("Fatal Error");
$row = $result->fetch_array(MYSQLI_ASSOC);

$_SESSION['id'] = $row['ID'];

if (isset($_POST['submit'])) {
	$descripcion = $_POST["descripcion"];
	$chga = "wht whit this";
	$_SESSION['id'];
	if (count($_FILES) > 0) {
		//Aqui se hace la validacion si la funcion is_uploaded_fle es mayor que 0 se mete al if de lo contrario se mete al else 
		//y se direcciona al header.
		if (is_uploaded_file($_FILES['postImage']['tmp_name']) > 0) {
			require_once "includes/dbh.inc.php";
			$imgData = addslashes(file_get_contents($_FILES['postImage']['tmp_name']));
			$imageProperties = getimageSize($_FILES['postImage']['tmp_name']);
			$sql = "INSERT INTO posts(imagen, descripcion, tag, user_ID, imgType)
			VALUES('{$imgData}', '{$descripcion}', '{$chga}', '{$_SESSION['id']}', '{$imageProperties['mime']}')";
			$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
			if (isset($current_id)) {
				header("Location: main.php");
			}
		} else {
			//to-do hacer experiencia de usuario si no subio img decirle con un modal o algo por el estilos
			header("Location: main.php");
		}
	}
}
?>