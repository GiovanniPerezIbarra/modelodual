<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['id'];
	$pass = $_POST['contra'];
	$password = base64_encode($pass);
	$sentencia = $conn->prepare('SELECT * FROM datosvinculacion WHERE id_empleado = ? and contra = ?;');
	$sentencia->execute([$usuario, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("El ID o la contraseña ingresados son incorrectos.\nVuelva a intentarlo.");
        window.location.assign("loginvinculacion.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['vinculacion'] = $datos->id_empleado;
		header('Location: iniciovinculacion.php');
	}
?>