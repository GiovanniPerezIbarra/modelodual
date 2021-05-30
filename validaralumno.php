<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['matricula'];
	$pass = $_POST['contra'];
	$password = base64_encode($pass);
	$sentencia = $conn->prepare('SELECT * FROM datosalumnos WHERE matricula = ? and contra = ?;');
	$sentencia->execute([$usuario, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("La matricula o la contraseña ingresadas son incorrectas.\nVuelva a intentarlo.");
        window.location.assign("loginalumno.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['alumno'] = $datos->nombre_completo;
		header('Location: inicioalumno.php');
	}
?>