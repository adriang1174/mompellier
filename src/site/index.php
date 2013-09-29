<?php
if (isset($_GET["accion"]))
	$accion = $_GET["accion"];
else
	$accion = "home" ;
$eventosTodos = new DOMDocument();
$eventosTodos->load( 'datos/eventosAdmin.xml' );

$doc = new DOMDocument();
if ( (isset($_GET["evento"])) && ($_GET["evento"]!="gracias") ) {
	$doc->load( 'datos/'.$_GET["aa"].'/'.$_GET["evento"].'/data.xml' );
} else {
	$doc->load( 'datos/'.$eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue.'/data.xml' );
}

$root='/';
function root() {
	echo '/';
}

function ponerTituloHTML() {
	global $doc;
	if (isset($_GET["evento"])) {
		echo $doc->getElementsByTagName('tituloHTML')->item(0)->nodeValue;
	} else {
		echo "Comunidad Residentes - Quimica Montpellier";
	}
}

function ponerTituloEvento() {
	global $doc;
	if ($doc->getElementsByTagName('nombreEvento')->item(0)) {
		if ($doc->getElementsByTagName('subTitulo')->item(0)) {
			$subTitulo='<div class="subtitulo ">'.$doc->getElementsByTagName('subTitulo')->item(0)->nodeValue.'</div>';
		} else {
			$subTitulo='';
		}
		echo '<div class="titulo">'.$doc->getElementsByTagName('nombreEvento')->item(0)->nodeValue.$subTitulo.'</div>';
	}
}

function nombreEvento() {
	global $doc;
	echo $doc->getElementsByTagName('subTitulo')->item(0)->nodeValue.$subTitulo;
}

function ponerTextoEvento() {
	global $doc;
	if ($doc->getElementsByTagName('textoEvento')->item(0)) {
		echo '<div class="bloque textoEvento">'.$doc->getElementsByTagName('textoEvento')->item(0)->nodeValue.'</div>';
	}
}

function ponerLugarFecha() {
	global $root;
	global $doc;
	if ($doc->getElementsByTagName('lugar')->item(0)) {
		echo '<div class="lugar">
				<div class="donde"><img src="'.$root.'img/iconoLugar.png" />'.$doc->getElementsByTagName('lugar')->item(0)->nodeValue.'</div>
				<div class="cuando">'.$doc->getElementsByTagName('diaNombre')->item(0)->nodeValue.' '.$doc->getElementsByTagName('dia')->item(0)->nodeValue.' de '.$doc->getElementsByTagName('mes')->item(0)->nodeValue.' de '.$doc->getElementsByTagName('ano')->item(0)->nodeValue.'</div>
			</div>';
	}
	 
}

function ponerHeaderImg() {
	global $eventosTodos;
	global $doc;
	if ( (isset($_GET["evento"])) && ($_GET["evento"]!="gracias") ) {
		echo 'datos/'.$_GET["aa"].'/'.$_GET["evento"].'/header.jpg';
	} else {
		echo 'datos/'.$eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue.'/header.jpg';
	}
}

function ponerLugarFechaContent() {
	global $doc;
	if ($doc->getElementsByTagName('mapa')->item(0)) {
		$mapa='<a class="botonGenerico" id="botonMapa" style="margin-left:20px" href="'.$doc->getElementsByTagName('mapa')->item(0)->nodeValue.'" >Ver Mapa</a>';
	} else {
		$mapa="";
	}
	if ($doc->getElementsByTagName('lugar')->item(0)) {
		echo'<span>'.$doc->getElementsByTagName('diaNombre')->item(0)->nodeValue.' '.$doc->getElementsByTagName('dia')->item(0)->nodeValue.' de '.$doc->getElementsByTagName('mes')->item(0)->nodeValue.' de '.$doc->getElementsByTagName('ano')->item(0)->nodeValue.'.</span>|<strong>'.$doc->getElementsByTagName('lugar')->item(0)->nodeValue.'</strong>|<span style="margin-left:5px; font-size:11px">'.$doc->getElementsByTagName('lugarDireccion')->item(0)->nodeValue.'</span>'.$mapa;
	}
}

function ponerLugarFotos() {
	global $eventosTodos;
	global $doc;
	if ($doc->getElementsByTagName('lugarFoto')->item(0)) {
		if (isset($_GET["evento"])) {
			$carpeta=$_GET["aa"].'/'.$_GET["evento"];
		} else {
			$carpeta=$eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue;
		}
		for ($i = 0; $i < $doc->getElementsByTagName('lugarFoto')->length; $i++) {
			echo '<img src="/datos/'.$carpeta.'/'.$doc->getElementsByTagName('lugarFoto')->item($i)->nodeValue.'" />';
		}
	}
}

function ponerSpeakers() {
	global $root;
	global $eventosTodos;
	global $doc;
	
	if ($doc->getElementsByTagName('speakers')->item(0)) {
		for ($i = 0; $i < $doc->getElementsByTagName('speakers')->length; $i++) {
			echo '<div class="speakers">';
			echo '<div class="titulo">'.$doc->getElementsByTagName('speakers')->item($i)->attributes->getNamedItem('titulo')->value.'</div>';
			
			if ($doc->getElementsByTagName('speakers')->item($i)->attributes->getNamedItem('tamano')) {
				$addClass="itemTamano".$doc->getElementsByTagName('speakers')->item($i)->attributes->getNamedItem('tamano')->value;
			} else {
				$addClass="";
			}
			
			if ($doc->getElementsByTagName('speakers')->item($i)->attributes->getNamedItem('alto')) {
				$altoSpeaker="style='height:".$doc->getElementsByTagName('speakers')->item($i)->attributes->getNamedItem('alto')->value."'";
			} else {
				$altoSpeaker="";
			}
			
			if (isset($_GET["evento"])) {
				$carpeta=$_GET["aa"].'/'.$_GET["evento"];
			} else {
				$carpeta=$eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue;
			}
			
			for ($j = 0; $j < $doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->length; $j++) {
				
				if ($doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->item($j)->getElementsByTagName('foto')->item(0)) {
					$fotoSpeaker=$root.'datos/'.$carpeta.'/'.$doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->item($j)->getElementsByTagName('foto')->item(0)->nodeValue;
				} else {
					$fotoSpeaker=$root.'img/speaker.jpg';
				}
				
				if ($doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->item($j)->getElementsByTagName('texto')->item(0)) {
					$textoSpeaker='<p>'.$doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->item($j)->getElementsByTagName('texto')->item(0)->nodeValue.'</p>';
				} else {
					$textoSpeaker='';
				}
				
				echo '<div class="item '.$addClass.'" '.$altoSpeaker.'>
						<p class="tit"><img src='.$fotoSpeaker.' />'.$doc->getElementsByTagName('speakers')->item($i)->getElementsByTagName('speaker')->item($j)->getElementsByTagName('nombre')->item(0)->nodeValue.'</p>
						'.$textoSpeaker.'
					</div>';
			}
			
			echo '</div>';
		}
	}
}

function ponerAlmanaque() {
	global $doc;
	if ($doc->getElementsByTagName('agenda')->item(0)) {
		echo'<div class="almanaque">
                <div class="iconoAlmanaque">
                    <div class="mes">'.$doc->getElementsByTagName('mes')->item(0)->nodeValue.'</div>
                    <div class="dia">'.substr($doc->getElementsByTagName('dia')->item(0)->nodeValue, 0, 2).'</div>
                </div>
				'.$doc->getElementsByTagName('diaNombre')->item(0)->nodeValue.' <strong>'.$doc->getElementsByTagName('dia')->item(0)->nodeValue.'</strong> de<br />
				<strong>'.$doc->getElementsByTagName('mes')->item(0)->nodeValue.'</strong> de '.$doc->getElementsByTagName('ano')->item(0)->nodeValue.'
			</div>';
	}
}

function ponerAgenda() {
	global $doc;
	if ($doc->getElementsByTagName('agenda')->item(0)) {
		for ($i = 0; $i < $doc->getElementsByTagName('agenda')->length; $i++) {
			echo '<div class="agenda">
            	<div class="tit">'.$doc->getElementsByTagName('agenda')->item($i)->attributes->getNamedItem('titulo')->value.'</div>
                <div class="contenido">';
				
				for ($j = 0; $j < $doc->getElementsByTagName('agenda')->item($i)->getElementsByTagName('item')->length; $j++) {
					
					if ($doc->getElementsByTagName('agenda')->item($i)->getElementsByTagName('item')->item($j)->getElementsByTagName('aclaracion')->item(0)) {
						$aclaracion='<span class="aclaracion"></br>'.$doc->getElementsByTagName('agenda')->item($i)->getElementsByTagName('item')->item($j)->getElementsByTagName('aclaracion')->item(0)->nodeValue.'</span>';
					} else {
						$aclaracion='';
					}
					
					echo '<div class="fila">
						<div class="hora">'.$doc->getElementsByTagName('agenda')->item($i)->getElementsByTagName('item')->item($j)->getElementsByTagName('hora')->item(0)->nodeValue.'</div>
                        <div class="descripcion">'.$doc->getElementsByTagName('agenda')->item($i)->getElementsByTagName('item')->item($j)->getElementsByTagName('actividad')->item(0)->nodeValue.''.$aclaracion.'</div>
					</div>';
				}
				
            echo '</div></div>';
		}
	}
}

$eventoRealizado = array();
function ponerEventosRealizados() {	
	global $root;
	global $eventosTodos;
	global $doc;
	global $eventoRealizado;
	
	for ($i = 0; $i < $eventosTodos->getElementsByTagName('realizado')->length; $i++) {
		$eventoRealizado[$i] = new DOMDocument();
		$eventoRealizado[$i]->load( 'datos/'.$eventosTodos->getElementsByTagName('realizado')->item($i)->nodeValue.'/data.xml' );
	}
	
	$contador=0;
	$grupoCant=0;
	
	echo '<div class="grupo">';
	for ($i = 0; $i < $eventosTodos->getElementsByTagName('realizado')->length; $i++) {
		$contador=$contador+1;
		
		if ($contador>3) {
			$contador=1;
			$grupoCant=$grupoCant+1;
			$leftNuevo=810*$grupoCant;
			echo '</div>';
			echo '<div class="grupo" style="left:'.$leftNuevo.'px">';
		}
		
		if ($eventoRealizado[$i]->getElementsByTagName('fotoEvento')->item(0)) {			
			$fotoEvento='datos/'.$eventosTodos->getElementsByTagName('realizado')->item($i)->nodeValue.'/'.$eventoRealizado[$i]->getElementsByTagName('fotoEvento')->item(0)->nodeValue;
		} else {
			$fotoEvento='img/eventoRealizadoFoto.jpg';
		}
		
		if ($eventoRealizado[$i]->getElementsByTagName('diaRealizado')->item(0)) {			
			$diaRealizado=$eventoRealizado[$i]->getElementsByTagName('diaRealizado')->item(0)->nodeValue;
		} else {
			$diaRealizado=$eventoRealizado[$i]->getElementsByTagName('dia')->item(0)->nodeValue;
		}
		
		echo '<a class="bloque" href="'.$root.$eventosTodos->getElementsByTagName('realizado')->item($i)->nodeValue.'" target="_blank">	
				<div class="iconoAlmanaque">
					<div class="mes">'.$eventoRealizado[$i]->getElementsByTagName('mes')->item(0)->nodeValue.'</div>
					<div class="dia">'.$diaRealizado.'</div>
				</div>
				
				<div class="foto" style="background-image:url('.$root.$fotoEvento.')"></div>
				
				<p class="tit">'.$eventoRealizado[$i]->getElementsByTagName('subTitulo')->item(0)->nodeValue.'</p>
				<p style="font-size:14px; font-weight: bold">'.$eventoRealizado[$i]->getElementsByTagName('dia')->item(0)->nodeValue.' de '.$eventoRealizado[$i]->getElementsByTagName('mes')->item(0)->nodeValue.' de '.$eventoRealizado[$i]->getElementsByTagName('ano')->item(0)->nodeValue.'.</p>
				<p>'.$eventoRealizado[$i]->getElementsByTagName('textoRealizado')->item(0)->nodeValue.'</p>
				<p>
					<div class="botonMasInfo" >+ Info</div>
				</p>
				
				<div class="fb-like" data-href="https://www.facebook.com/ComunidadResidentesArgentina" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
				
				<div style="clear:both"></div>
			</a>';
	}
	echo '</div>';
}

function ponerNumeracionRealizados() {
	global $eventosTodos;
	global $doc;
	global $eventoRealizado;
	
	$numeros = ceil($eventosTodos->getElementsByTagName('realizado')->length/3);

	echo '<div id="flechaIzq"> &laquo; </div> <div class="numeros">';
	for ($i = 0; $i < $numeros; $i++) {
		echo '<div class="boton" id="num'.$i.'">'.($i+1).'</div>';
	}
	echo '</div> <div id="flechaDer"> &raquo; </div>';
}


$eventoProximo = array();
function ponerProximosEventos() {
	global $root;
	global $eventosTodos;
	global $doc;
	global $eventoProximo;
	
	for ($i = 0; $i < $eventosTodos->getElementsByTagName('proximo')->length; $i++) {
		$eventoProximo[$i] = new DOMDocument();
		$eventoProximo[$i]->load( 'datos/'.$eventosTodos->getElementsByTagName('proximo')->item($i)->nodeValue.'/data.xml' );
	}
	
	for ($i = 0; $i < $eventosTodos->getElementsByTagName('proximo')->length; $i++) {
		echo '<a class="eventoProx" href="'.$root.$eventosTodos->getElementsByTagName('proximo')->item($i)->nodeValue.'" target="_blank">
					<div class="flecha">
						<p class="nombre">'.$eventoProximo[$i]->getElementsByTagName('subTitulo')->item(0)->nodeValue.'</p>
						<p class="lugar">'.$eventoProximo[$i]->getElementsByTagName('lugar')->item(0)->nodeValue.'</p>
						<p class="txt">'.$eventoProximo[$i]->getElementsByTagName('dia')->item(0)->nodeValue.' de '.$eventoProximo[$i]->getElementsByTagName('mes')->item(0)->nodeValue.' de '.$eventoProximo[$i]->getElementsByTagName('ano')->item(0)->nodeValue.'</p>
					</div>
				</a>';
	}
}

function ponerBotonProximo() {
global $eventosTodos;
echo  '<a href="'.$eventosTodos->getElementsByTagName('botonProximo')->item(0)->nodeValue.'" target="_blank" class="botonEventoProximo"></a> ';
}

function inscripcionAbierta() {
	//Indica si esta la inscripcion abierta para el evento
	global $doc;
	global $accion;
	//$inscripcion = 	(!empty($doc->getElementsByTagName('inscripcion')))?$doc->getElementsByTagName('inscripcion')->item(0)->nodeValue:"0";
	$inscripcion = $doc->getElementsByTagName('inscripcion')->item(0)->nodeValue;
	if($inscripcion == "1" and $accion=="home")
		return true;
	else 
		return false;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php ponerTituloHTML() ?></title>
<meta name="Description" content="Comunidad Residentes. Un espacio de participación para médicos residentes que te informa sobre jornadas, encuentros de capacitación y perfeccionamiento académico." />

<link rel="icon" href="<?php root() ?>img/favicon.ico" type="image/x-icon"> 

<meta property="og:image" content="http://www.comunidadresidentes.com.ar/img/logoFB.jpg" />
<meta property="og:title" content="Comunidad Residentes - Quimica Montpellier" />
<meta property="og:url" content="http://www.comunidadresidentes.com.ar" />
<meta property="og:description" content="" />

<link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE]>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:700italic' rel='stylesheet' type='text/css'>
<![endif]-->

<link href='http://fonts.googleapis.com/css?family=Asap:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE]>
<link href='http://fonts.googleapis.com/css?family=Asap:400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Asap:400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Asap:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Asap:700italic' rel='stylesheet' type='text/css'>
<![endif]-->

<link href="<?php root() ?>estilos.css" rel="stylesheet" type="text/css" />

<!-- Jquery -->
<script type="text/javascript" src="<?php root() ?>scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php root() ?>scripts/jquery.color.js"></script>
<script type="text/javascript" src="<?php root() ?>scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php root() ?>scripts/jquery.easing.compatibility.js"></script>

<!-- jAlert -->
<script src="<?php root() ?>jquery.alerts-1.1/jquery.alerts.js"></script>
<link href="<?php root() ?>jquery.alerts-1.1/jquery.alerts.css" rel="stylesheet" type="text/css" />

<!-- ColorBox -->
<script src="<?php root() ?>colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" href="<?php root() ?>colorbox/colorbox.css" />

<script type="text/javascript" src="<?php root() ?>scripts/funciones.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42561438-1', 'comunidadresidentes.com.ar');
  ga('send', 'pageview');
</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- header top -->
<div id="header">
	<a href="<?php root() ?>" ><img src="<?php root() ?>img/logoHeader.png" id="logoHeader" style="border:0" /></a>
	<div id="datosHeader">
		<img src="<?php root() ?>img/logoMontpellierHeader.png" style="margin-right:20px" />
		<a href="https://www.facebook.com/ComunidadResidentesArgentina" target="_blank" class="botonRedes redesFacebook"></a>
        <a href="https://twitter.com/ResidentesArg" target="_blank" class="botonRedes redesTwitter"></a>
        <!--<a href="#" target="_blank" class="botonRedes redesYoutube"></a>-->
        <div class="texto">Los conceptos que se expresen en esta comunidad son de <strong>exclusiva responsabilidad del/los autor/es</strong> y no involucran necesariamente el pensamiento de Quìmica Montpellier S.A.</div>
    </div>
</div>


<!-- Container -->
<div id="container">
	    
        <!-- Container Header -->
        <div class="header" style="background-image:url(<?php root() ?><?php ponerHeaderImg() ?>)">
            <div class="sombra"></div>
    <?php if (isset($_GET["aa"])) { ?>   
		     <a class="pestana" href="/">
                <div class="left"></div><div class="middle"><div class="texto">&laquo; volver</div></div><div class="right"></div>
            </a>         
    <?php } else { ?>
            <div class="pestana">
                <div class="left"></div><div class="middle"><div class="texto">próximo evento</div></div><div class="right"></div>
            </div>    
	<?php } ?>                                    
            <?php ponerTituloEvento() ?>
            <?php ponerLugarFecha() ?>
            <?php if(inscripcionAbierta() and isset($_GET["aa"])) 
			      { ?>
						<a href="<?php echo $root.$_GET['aa']."/".$_GET['evento']."/" ?>inscripcion" class="botonInscribite"></a>
			<?php } 
				  if(inscripcionAbierta() and !isset($_GET["aa"])) 
				  { ?>
						<a href="<?php echo $root.$eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue."/" ?>inscripcion" class="botonInscribite"></a>				  
			<?php } ?>						
            <?php if(inscripcionAbierta()) 
			      { ?>
            			<div class="botonComparti">
            <?php }else{ ?>
                        <div class="botonComparti" style="top:122px; -webkit-border-radius: 5px; border-radius: 5px;">
            <?php } ?>
            	<span>Compartí</span>
            	<!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_linkedin"></a>
                <a class="addthis_button_email"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51e975a969dbd262"></script>
                <!-- AddThis Button END -->
            </div>
        </div>
    
    <!-- Container Columna izq -->    
    <div class="columnaIzq">
    
    	<?php 
    		if ($accion=="inscripcion" or $accion=="gracias") { ?>
        
        	<!-- Formulario de Inscripcion -->
            <div class="bloque formulario">
				<?php
				if (isset($_GET["aa"]))
						$idEvento = $_GET["aa"]."/".$_GET["evento"];
				else
						$idEvento = $eventosTodos->getElementsByTagName('actual')->item(0)->nodeValue;
				?>
           		<form action="/<?= $idEvento ?>/inscripcion" method="post" enctype="multipart/form-data" name="formInscribise" id="formInscribise">
				<div class="titulo" style="margin-bottom:20px">Formulario de Inscripción</div>
                <p>
                	<span>Nombre</span><input id="nombre" name="nombre" type="text" class="campo" />
                    <span>Apellido</span><input id="apellido" name="apellido" type="text" class="campo" />
				</p>
                <p>
                	<span>DNI</span><input id="dni" name="dni" type="text" class="campo" />
                    <span>Teléfono</span><input id="telefono" name="telefono" type="text" class="campo" />
                </p>
                <p>
                	<span>E-mail</span><input id="email" name="email" type="text" class="campo" />
                    <span>Matricula Nº - Nac</span><input id="matriculaNac" name="matriculaNac" type="text" class="campo" />
				</p>
                <p>
                	<span>Matricula Nº - Prov</span><input id="matriculaProv" name="matriculaProv" type="text" class="campo" />
                	<span>Condición</span>
					<select id="condicion" name="condicion" class="campo" style="width:238px">
					</select>
                </p>
                <p>
                	<span>Especialidad</span>
                    <select id="especialidad" name="especialidad" class="campo" style="width:238px">
					</select>
					<span>Institución</span>
					<select id="institucion" name="institucion" class="campo" style="width:238px">
					</select>
				</p>
                <p>
                	<span>Localidad</span><input id="localidad" name="localidad" type="text" class="campo" />
                    <span>Provincia</span><input id="provincia" name="provincia" type="text" class="campo" />
                    <input id="nombreEvento" name="nombreEvento" type="hidden" value="<?php nombreEvento() ?>" />
					<input id="idEvento" name="idEvento" type="hidden" value="<?= $idEvento ?>" />
				</p>
                <?php require_once('recaptcha-php-1.11/recaptchalib.php');
				$publickey = " 	6LeSE-USAAAAAGHq9mrDbk3OjeJU54R4Jo0LJfHM "; // you got this from the signup page
				echo recaptcha_get_html($publickey); ?>

				<noscript>
					<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeSE-USAAAAAGHq9mrDbk3OjeJU54R4Jo0LJfHM " height="300" width="500" frameborder="0"></iframe><br>
					<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
					<input type="hidden" name="recaptcha_response_field" value="manual_challenge">
				</noscript>

                <p style="text-align:right; padding:30px 23px; border-top: solid 1px #cccccc; margin-top:20px;"><a class="botonGenerico" style="padding:13px 22px" id="botonInscribirse">INSCRIBIRSE ></a></p>
                </form>
            </div>
            
            <?php if ($_POST){
				require_once('recaptcha-php-1.11/recaptchalib.php');
				$privatekey = "6LeSE-USAAAAAPsA9Jrfk-XxPKv6E9ypRl9Aurg2";
				$resp = recaptcha_check_answer ($privatekey,
					$_SERVER["REMOTE_ADDR"],
					$_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);				
				if (!$resp->is_valid) {
					echo '<script>
					$("#nombre").val("'.$_POST["nombre"].'");
					$("#apellido").val("'.$_POST["apellido"].'");
					$("#dni").val("'.$_POST["dni"].'");
					$("#telefono").val("'.$_POST["telefono"].'");
					$("#email").val("'.$_POST["email"].'");
					$("#matriculaNac").val("'.$_POST["matriculaNac"].'");
					$("#matriculaProv").val("'.$_POST["matriculaProv"].'");
					populateEspec("'.$_POST['especialidad'].'");
					populateCond("'.$_POST['condicion'].'");
					populateInst("'.$_POST['institucion'].'");
					$("#condicion").val("'.$_POST["condicion"].'");
					$("#especialidad").val("'.$_POST["especialidad"].'");
					$("#institucion").val("'.$_POST["institucion"].'");
					$("#localidad").val("'.$_POST["localidad"].'");
					$("#provincia").val("'.$_POST["provincia"].'");
					jAlert("<strong>El Captcha ingresado no es correcto.<br>Por favor vuelva a introducirlo.</strong>", "Alerta");
					</script>';
				} else { 	// registramos en la base
							$errorDB = false;
							$link = mysqli_connect('localhost', 'uv9007', 'V*d*o*3037!','uv9007_registracionea');
							if (mysqli_connect_errno()) {
							$errorDB = true;
							}
							//$action = $_REQUEST['a'];
							$apellido       = mysqli_real_escape_string($link, utf8_decode($_REQUEST['apellido']));
							$nombre 	    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['nombre']));
							$dni			= mysqli_real_escape_string($link, $_REQUEST['dni']);
							$especialidad   = mysqli_real_escape_string($link, utf8_decode($_REQUEST['especialidad']));
							$hospital		= mysqli_real_escape_string($link, utf8_decode($_REQUEST['institucion']));
							$situacion		= mysqli_real_escape_string($link, utf8_decode($_REQUEST['condicion']));
							$telefono		= mysqli_real_escape_string($link, $_REQUEST['telefono']);
							$mail			= mysqli_real_escape_string($link, $_REQUEST['email']);
							$matricula		= mysqli_real_escape_string($link, $_REQUEST['matriculaNac']);
							$matricula_prov = mysqli_real_escape_string($link, $_REQUEST['matriculaProv']);

							$idCurso = $_REQUEST['idEvento'];
							$sql = "insert into participantes (Apellido,Nombre,Dni,especialidad,Hospital,Situacion,Telefono,Mail,Matricula,MatriculaProv) 
							values('{$apellido}','{$nombre}','{$dni}','{$especialidad}','{$hospital}','{$situacion}','{$telefono}','{$mail}','{$matricula}','{$matricula_prov}')";
							$res = mysqli_query($link,$sql);
							$idParticipante = mysqli_insert_id($link);

							$sql = "insert into participantescursos (idParticipante,idCurso,asistio)
							values({$idParticipante},'{$idCurso}','0')";
							$res = mysqli_query($link,$sql);
							// mandamos el mail
							require("send/class.phpmailer.php");
							$mail = new PHPMailer();
							$mail->From = "contacto@comunidadresidentes.com.ar";
							$mail->FromName = "Comunidad Medico Residente";
							$mail->AddAddress("contacto@comunidadresidentes.com.ar");
							$mail->WordWrap = 50; // set word wrap to 50 characters
							$mail->IsHTML(true); // set email format to HTML
							$mail->ContentType = "text/html";
							$mail->CharSet = "UTF-8";
							$mail->Subject = "Inscripcion de " . $_POST["nombre"] . " " . $_POST["apellido"];
							$mail->Body = "<font face=Verdana, Arial, Helvetica, sans-serif color=#666666 size=2>
							<strong>Nombre del Evento: </strong>" . $_POST["nombreEvento"] ."<br><br>
							<strong>Nombre: </strong>" . $_POST["nombre"] ."<br>
							<strong>Apellido: </strong>" . $_POST["apellido"] ."<br>
							<strong>Telefono: </strong>" . $_POST["telefono"] . "<br>
							<strong>Email: </strong>" . $_POST["email"] . "<br>
							<strong>Nº Matricula - Nac.: </strong>" . $_POST["matriculaNac"] . "<br>
							<strong>Nº Matricula - Prov.: </strong>" . $_POST["matriculaProv"] . "<br>
							<strong>Condicion: </strong>" . $_POST["condicion"] . "<br>
							<strong>Especialidad: </strong>" . $_POST["especialidad"] . "<br>
							<strong>Institucion: </strong>" . $_POST["institucion"] . "<br>
							<strong>Localidad: </strong>" . $_POST["localidad"] . "<br>
							<strong>Provincia: </strong>" . $_POST["provincia"] . "<br>
							</font>";
							if ($errorDB)
							{
								$mail->Body .= "<br><strong>Atención: Se ha producido un error en la base de datos y esta inscripción no ha sido incorporada, salvo que el residente haya completado un nuevo formulario </strong>";
							}

							$mailOK = $mail->Send();
							// mandamos el mail de confirmacion
							$mail = new PHPMailer();
							$mail->From = "contacto@comunidadresidentes.com.ar";
							$mail->FromName = "Comunidad Medico Residente";
							$mail->AddAddress($_POST["email"]);
							$mail->WordWrap = 50; // set word wrap to 50 characters
							$mail->IsHTML(true); // set email format to HTML
							$mail->ContentType = "text/html";
							$mail->CharSet = "UTF-8";
							$mail->Subject = "Confirmación de Inscripcion";
							// Retrieve the email template required 
							$message = file_get_contents('http://www.comunidadresidentes.com.ar/mailing/confirmacion/index.html'); 
							$nombre = $_POST["nombre"]." ".$_POST["apellido"];
							$titulo_evento = $doc->getElementsByTagName('subTitulo')->item(0)->textContent;
							$fecha_evento = $doc->getElementsByTagName('diaNombre')->item(0)->textContent.' '.$doc->getElementsByTagName('dia')->item(0)->textContent.' de '.$doc->getElementsByTagName('mes')->item(0)->textContent.' de '.$doc->getElementsByTagName('ano')->item(0)->textContent;
							$lugar = $doc->getElementsByTagName('lugar')->item(0)->textContent;
							$lugarDireccion = $doc->getElementsByTagName('lugarDireccion')->item(0)->textContent;
							// Replace the % with the actual information 
							$message = str_replace('%nombre%', $nombre, $message); 
							$message = str_replace('%titulo_evento%', $titulo_evento, $message); 
							$message = str_replace('%fecha_evento%', $fecha_evento, $message); 
							$message = str_replace('%lugar%', $lugar, $message); 
							$message = str_replace('%lugarDireccion%', $lugarDireccion, $message); 
							//Set the message 
							$mail->Body = $message; 
							//$mail->AltBody(strip_tags($message)); 
							$mail->Send();
							if(!$mailOK or $errorDB) {
											echo "<script>  	populateEspec('');
											populateCond('');
											populateInst('');
											jAlert('<strong>Ha habido un problema con su inscipción.</strong>', 'Por favor intente nuevamente');
											</script>";
							} else {	
									echo "<script>location.href='http://www.comunidadresidentes.com.ar/".$idEvento."/gracias';</script>";
							}

							}
			}
			else{
					echo "<script>	populateEspec('');
								populateCond('');
								populateInst('');
					  </script>";
			}

			?>
            
			<?php if ($accion=="gracias") {
					echo "<script>	populateEspec('');
								populateCond('');
								populateInst('');
								jAlert('<strong>El Formulario ha sido enviado correctamente.</strong>', 'Muchas gracias por inscribirse');
					  </script>";

				} ?>
            
        <?php } else { ?>
        	
            <?php if (!isset($_GET["aa"])) { ?>
            <div class="bloque textoPrincipal">
            <p>Es la idea de nuestra comunidad proponer <strong>un espacio de participación para médicos residentes</strong>, donde puedas interactuar con tus pares y <strong>permanezcas informado sobre jornadas,  encuentros de capacitación y perfeccionamiento.</strong></p>
            </div>
            <?php } ?>
            
            
            <!-- Columna Izq Lugar y Fecha -->   
            <div class="fechaLugar bloque"><?php ponerLugarFechaContent() ?></div>
            
            <!-- Columna Izq fotos -->
            <div class="bloque" style="text-align:center"><?php ponerLugarFotos() ?></div>
            
            <!-- Columna Izq texto -->
            <?php ponerTextoEvento() ?>
            
            
            <!-- Columna Izq Speakers -->
            <div class="bloque" ><?php ponerSpeakers() ?></div>
            
            <!-- Columna Izq Agenda -->
            <div class="bloque" >
                <?php ponerAlmanaque() ?>
                <?php ponerAgenda() ?>
            </div>
            
        <?php } ?>

	</div> <!-- Fin Columna Izq -->
	
    
	<!-- Container Columna Derecha -->
    <div class="columnaDer">
    	
        <!-- Columna Der Proximo Evento -->
        <?php ponerBotonProximo() ?>
    	<a href="https://www.facebook.com/ComunidadResidentesArgentina" target="_blank" class="botonComunidad"></a>
    	
        <?php if (!isset($_GET["aa"])) { ?>
        
        <!-- Columna Der Proximos Eventos -->
    	<div class="widget">
        	<div class="tit">Próximos eventos</div>
            <?php ponerProximosEventos() ?>
        </div>
        
        <?php } ?>

       	<!-- Columna Der Suscribirse al News -->
        <a href="http://eepurl.com/Ei4pz" target="_blank" class="botonNewsletter"></a> 
       	
        <?php if (!isset($_GET["aa"])) { ?>
        
        <!-- Columna Der Redes Sociales -->
        <div class="widget">
            <div class="tit">formá parte de<br /><strong>nuestra comunidad!!!</strong></div>
            <div class="right comunidad">
            	<a href="https://www.facebook.com/ComunidadResidentesArgentina" target="_blank" class="botonRedes redesFacebook"></a>
                <a href="https://twitter.com/ResidentesArg" target="_blank" class="botonRedes redesTwitter"></a>
                <!--<a href="#" target="_blank" class="botonRedes redesYoutube"></a>-->
            </div>
        </div>
        <?php } ?>
        
        
        
    </div> <!-- Fin Columna Der -->
    
    <div style="clear:both"></div>
    
    <?php if (!isset($_GET["aa"])) { ?>
    
    <div class="division"></div>
    
    <!-- Container Eventos Realizados -->
	<div class="eventosRelizados">
		<div class="titulo">Eventos <strong>Realizados</strong></div>
        <div class="eventosContainer">
        	<div id="eventosSlider">
            	<?php ponerEventosRealizados() ?>
            </div>
            <div id="numeracion"><?php ponerNumeracionRealizados() ?></div>
        </div>
	</div>
    
    <?php } ?>
    
</div>

<div id="footer">
	<div class="contenido">
    	<div class="col" style="padding-left:27px">
        	<img src="<?php root() ?>img/logoFooter.png" />
            <div class="texto">
            	Los conceptos que se expresen en esta comunidad son de exclusiva responsabilidad del/los autor/esy no involucran necesariamente el pensamiento de Quìmica Montpellier S.A.
            </div>
        </div>
        <div class="col">
        	<div class="titulo">Formá parte de nuestra comunidad!!!</div>
            <a href="https://www.facebook.com/ComunidadResidentesArgentina" target="_blank" class="botonRedes redesFacebook"></a>
			<a href="https://twitter.com/ResidentesArg" target="_blank" class="botonRedes redesTwitter"></a>
            <div class="titulo"><img src="<?php root() ?>img/iconoMail.gif" /><a href="mailto:contacto@comunidadresidentes.com.ar?subject=Consulta desde comunidadresidentes.com.ar" class="mailFooter" >contacto@comunidadresidentes.com.ar</a></div>
			<!--<a href="#" target="_blank" class="botonRedes redesYoutube"></a>-->
        </div>
        <div class="col" style="border-right:none">
        	<img src="<?php root() ?>img/logoMontpellierFooter.png" style="padding-top:20px" />
            <div class="aclaracion">2001 - 2009  Química Montpellier S.A. Todos los derechos reservados.</div>
        </div>
    </div>
</div>

</body>
</html>
