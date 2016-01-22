<?php 
	/**
	* Sino existe la variable mostrarMapa la ponemos por defecto a false.
	* If not exists the var mostrarMapa, put false by default
	*/
	if(!isset($mostrarMapa) $mostrarMapa = false; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>InstaLogin PHP - Instagram API Intergation With PHP</title>
<?php 

	/**
	* Incluimos el JS de Google Maps si la variable para mostrar mapa es true.
	* Include JS of Google Maps if VAR to show map is true.
	*/

	if($mostrarMapa)
	{
?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>

</head>
<?php 
	/**
	* Si la variable de mostrarMapa es true, inicializamos el mapa de Google al cargar el body.
	* If mostrarMapa var is true, initilize Google maps after load body.
	*/
?>
<body <?php if($mostrarMapa) echo 'onload="initialize()"'; ?>>
<div id="container">

	<div id="header">
	<br>
       	<img src="<?php echo $_SESSION['Thumbnail'];?>" alt="Imagen de perfil" width="60" height="60" />
        <h2>Bienvenido <?php echo $_SESSION['FullName']; ?></h2>
    </div>   
       
    <br><br>