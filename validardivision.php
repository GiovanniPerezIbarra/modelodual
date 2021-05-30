<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['id'];
	$pass = $_POST['contra'];
	$password = base64_encode($pass);
	$sentencia = $conn->prepare('SELECT * FROM datosdivision WHERE id_empleado = ? and contra = ?;');
	$sentencia->execute([$usuario, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("El ID de empleado o la contraseña ingresadas son incorrectas.\nVuelva a intentarlo.");
        window.location.assign("loginjefatura.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['division'] = $datos->nombre;
		$_SESSION['yo'] = $datos->carrera;
		header('Location: iniciodivision.php');
	}
?>