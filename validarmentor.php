<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['id_trabajador'];
	$pass = $_POST['contra'];
	$password = base64_encode($pass);
	$sentencia = $conn->prepare('SELECT * FROM datostutores WHERE id_trabajador = ? and contra = ?;');
	$sentencia->execute([$usuario, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("El ID de trabajador o la contraseña ingresadas son incorrectas.\nVuelva a intentarlo.");
        window.location.assign("loginmentor.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['mentor'] = $datos->nombre_completo;
		header('Location: iniciomentor.php');
	}
?>