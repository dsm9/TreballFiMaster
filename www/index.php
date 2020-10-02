<?php 
	include 'control/util.php';

	validarSession(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js" dir="ltr" lang="ca" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enquesta virtual - Anàlisis i revisió de comentaris</title>
<meta name="Description"
content="">
<meta name="KeyWords"
content="">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37442547-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script language="Javascript" type="text/javascript">
	imagenes = new Array("Master_2013_0001.jpg",
	"Master_2013_0004.jpg", "Master_2013_0005.jpg", "Master_2013_0006.jpg",
	"Master_2013_0007.jpg", "Master_2013_0008.jpg", "Master_2013_0027.jpg",
	"Triptic0007.jpg"
	);
	
//	setTimeout("rotacion()", 1 * 1000)
	
	function rotacion() {
		indicePosicion = Math.floor(Math.random() * 8) + 1;
		indiceImagen = Math.floor(Math.random() * imagenes.length);
		nuevaImagen = "img/" + imagenes[indiceImagen];
//		alert(indicePosicion  + "->" + nuevaImagen);
		if (!imagenUsada(nuevaImagen)) {
			document.getElementById("imagen" + indicePosicion).src = nuevaImagen;
			}
		
		setTimeout("rotacion()", 2 * 1000);
	}
	
	function imagenUsada(nuevaImagen) {
//		alert("imagenUsada: " + nuevaImagen);
		usada = false;
		cont = 1;
		while ((cont <= 8) && (!usada)) {
alert(cont + " - " + document.getElementById("imagen" + cont).src + " - " + nuevaImagen);
			if ( document.getElementById("imagen" + cont).src == nuevaImagen) {
				usada = true;
				}
			cont++;
		}
		return usada;
	}
</script>
<link href="css/gesmyr.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" valign="top">
		<?php include 'cabecera.php'; ?>	</td>
  </tr>
  <tr>
    <td width="150" valign="top" bgcolor="#E0E0FF">
		<?php include 'menu.htm'; ?>	</td>
    <td valign="top" class="PaginaCentral" >
      <p>
  <!--	Inicio parte particular 	-->
        
        
        
        
        
</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	
    <p align="center" class="Cabecera">Màster en Enginyeria en Informàtica </p>
    <p align="center" class="Cabecera">Treball Final de Màster </p>
    <p align="center" class="Texto">Anàlisis i revisió de comentaris de l'Enquesta Virtual </p>  
    <!--   <p align="center" class="Texto">Dins d'aquesta p&agrave;gina trobareu la informaci&oacute; actualitzada de les vostres prendes, intervencions i molt m&eacute;s.</p> -->
<!--       <p align="center" class="Texto">Escolliu una opci&oacute; al men&uacute; lateral. </p> -->
	
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
  <!--	Fin parte particular	 -->	
    
    </td>
  </tr>
  <tr>
  	<td colspan="2">
		<?php include 'pie.htm'; ?>	</td>
  </tr>
</table>
</body>
</html>
