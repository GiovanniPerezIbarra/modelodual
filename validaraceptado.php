<?php
	session_start();
	include_once 'con_db.php';
	$usuario = $_POST['matricula'];
	$sentencia = $conn->prepare('SELECT * FROM padron WHERE matricula = ?;');
	$sentencia->execute([$usuario]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("La matricula o la contraseña ingresadas son incorrectas.\nVuelva a intentarlo.");
        window.location.assign("loginaceptado.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['aceptado'] = $datos->Nombre_p;
		$_SESSION['yo'] = $datos->matricula;
		header('Location: inicioaceptado.php');
	}
?>