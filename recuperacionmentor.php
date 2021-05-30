<?php
	require 'mail/PHPMailer.php';
	require 'mail/SMTP.php';
	require 'mail/Exception.php';
	require 'mail/OAuth.php';
	include_once 'con_db.php';
	$correo = $_POST['correo'];
	$sentencia = $conn->prepare('SELECT * FROM datostutores WHERE correo = ?;');
	$sentencia->execute([$correo]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	if($datos === false){
		?>
        '<script type="text/javascript">
        alert("El correo ingresado no se encuentra asociado a ninguna cuenta.\nVuelva a intentarlo.");
        window.location.assign("recuperarmentor.php");
        </script>';
        <?php
	}elseif($sentencia->rowCount()==1){
		$_SESSION['contra'] = $datos->contra;
		try {
        	$emailTo = $correo;
			$subject = utf8_decode('Recuperación del código de acceso');
			$body = utf8_decode('La contraseña asociada a este correo electrónico es: ') . base64_decode($_SESSION['contra']);
			$fromemail = 'modelodual21@gmail.com';
			$fromname = utf8_decode('Eduación DUAL');
			$passwordemail = 'Modelo2021Dual';
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->isSMTP();
			$mail->SMTPDebug = 1;                                  
	    	$mail->Host = 'smtp.gmail.com';                           
	    	$mail->Port = 587; 
	    	$mail->SMTPAuth = 'login';
	    	$mail->SMTPSecure = 'tls';
            $mail->SMTPAuth=true;
	    	$mail->Username = $fromemail;
	    	$mail->Password = $passwordemail;
	    	$mail->setFrom($fromemail, $fromname);
	    	$mail->addAddress($emailTo);
	    	$mail->isHTML(true);
	    	$mail->Subject = $subject;
	    	$mail->Body = $body;
            $mail->SMTPDebug = 0;
	    	if(!$mail->send()){
	    		?>
                '<script type="text/javascript">
                alert("El correo electrónico no pudo ser enviado.");
                window.location.assign("recuperarmentor.php");
                </script>';
                <?php
	    	}else{
	    		?>
                '<script type="text/javascript">
                alert("El correo fue enviado exitosamente.\nRevise su bandeja de entrada.");
                window.location.assign("loginmentor.php");
                </script>';
                <?php
	    	}
		} catch (Exception $e) {
				
		}
	}
?>