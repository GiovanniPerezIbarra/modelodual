<?php
	session_start();
	if(!isset($_SESSION['aceptado'])){
		header('Location: index.php');
	}elseif(isset($_SESSION['aceptado'])){
		include 'con_db.php';
		$sentencia = $conn->query('SELECT * FROM padron;');
		$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	}
?>
 <?php
    include 'con_db.php';
    if(isset($_POST['submit'])){
        $matricula = $_POST["matricula"];
        $carrera = $_POST['carrera'];
        $sentencia = $conn->prepare('SELECT * FROM padron WHERE matricula = ?;');
        $sentencia->execute([$matricula]);
        $datos = $sentencia->fetch(PDO::FETCH_OBJ);
        if($datos === false){
            ?>
            '<script type="text/javascript">
            alert("La matricula ingresada no está asociada a ninguna cuenta.");
            window.location.assign("subircartas.php");
            </script>';
            <?php
        }elseif($sentencia->rowCount()==1){
            $num_archivos=count($_FILES['file']['name']);
            for($i=0; $i<=$num_archivos; $i++){
                if(!empty($_FILES['file']['name'][$i])){
                    $pname = $matricula."-".rand(1,1000)."-".$_FILES["file"]["name"][$i];
                    $tipo=$_FILES["file"]['type'][$i];
                    $tname = $_FILES["file"]["tmp_name"][$i];
                    $ruta = 'archivos/'.$_POST["matricula"];
                    if(!file_exists($ruta)){
                        mkdir($ruta, 0777); 
                    }
                    $uploads_dir = 'archivos/'.$_POST["matricula"];
                    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $sql = "INSERT into archivosaceptados(matricula, carrera, archivo, extension) VALUES('$matricula','$carrera','$pname','$tipo')";
                    $resultado = $conn->prepare($sql); 
                    if($resultado->execute()){
                        ?>
                        '<script type="text/javascript">
                        alert("Los archivos se subieron exitosamente.");
                        window.location.assign("inicioaceptado.php");
                        </script>';
                        <?php
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("Hubo un error.")';
                        echo '</script>';
                    }       
                }else{
                    ?>
                    '<script type="text/javascript">
                    alert("No se seleccionó alguno de los archivos.");
                    window.location.assign("subircartas.php");
                    </script>';
                    <?php
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Subir archivos</title>
        <link rel="stylesheet" type="text/css" href="css/cartas.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="script.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
        <style>
   body {
      background-image: url("img/fondotesi.png");
      -moz-background-size: cover;
      -ms-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: bottom center;
    }
</style>
    </head>
    <body class="grid-container">
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <img src="img/tesi.png" alt="" class="image">
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <main class="main">
                <h4>Tu barra de avance se llena conforme acredites las etapas.</h4>
                <!-- multistep form -->
<form id="msform" method="POST" enctype="multipart/form-data">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Carta de aceptación</li>
		<li>Plan de rotación</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Carta de aceptación</h2>
		<h3 class="fs-subtitle">Paso 1</h3>
		<input class="controls" type="text" name="matricula" placeholder="Ingrese su matricula"/>
        <h3 class="fs-subtitl">Seleccione la carrera:</h3>
    
            <select class="control" name="carrera">
                <option>ING. EN SISTEMAS<br></option>
                <option>ING. BIOMEDICA<br></option>
                <option>ING. INFORMATICA<br></option>
                <option>ING. ELECTRONICA<br></option>
                <option>ING. AMBIENTAL<br></option>
                <option>LIC. EN ADMINISTRACION<br></option>
                <option>LIC. EN ARQUITECTURA<br></option>
             </select><br><br>
    	<input class="controls" type="file" name="file[]"/>
		<input type="button" name="next" class="next action-button" value="Siguiente"/>
	</fieldset>	
	<fieldset>
		<h2 class="fs-title">Plan de rotación</h2>
		<h3 class="fs-subtitle">Paso 2</h3>
		<input class="controls" type="file" name="file[]"/>
		<input type="button" name="previous" class="previous action-button" value="Atrás" />
		<input type="submit" name="submit" class="submit action-button" value="Subir"/>
	</fieldset>
	</form>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
            <ul class="boton">
                <li><a href="inicioaceptado.php">Inicio</a></li>
            </ul>
            </main>
            <sidebar class="sidebar">
                <ul>
                    <li><a href="https://www.facebook.com/TESIOficial/" target="_blank" class="icon-facebook"></a></li>
                    <li><a href="https://www.instagram.com/tesioficial/" target="_blank" class="icon-instagram"></a></li>
                    <li><a href="https://twitter.com/TESIOficial/" target="_blank" class="icon-twitter"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCBRZpGRpPlmOqv2c-OehMmA" target="_blank" class="icon-youtube"></a></li>
                    <li><a href="https://www.linkedin.com/school/tesi-ixtapaluca/" target="_blank" class="icon-linkedin2"></a></li>
                    <li><a href="mailto:dir_dixtapaluca@tesi.edu.mx" target="_blank" class="icon-mail2"></a></li>
                </ul>
            </sidebar>
    </body>
</html>
<script>
	//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(".next").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});
$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});
</script>