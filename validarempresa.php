<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['rfc'];
	$pass = $_POST['contra'];
	$password = base64_encode($pass);
	$sentencia = $conn->prepare('SELECT * FROM datosempresas WHERE rfc = ? and contra = ?;');
	$sentencia->execute([$usuario, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("El RFC de la empresa o la contraseña ingresadas son incorrectas.\nVuelva a intentarlo.");
        window.location.assign("loginempresa.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['empresa'] = $datos->razonsocial;
		header('Location: inicioempresa.php');
	}
?>