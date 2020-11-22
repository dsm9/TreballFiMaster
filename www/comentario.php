	<?php 
//	include 'basedatos.php';
	include 'control/util.php';
//	include 'control/login_control.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Enquesta virtual - An&agrave;lisi i revisi&oacute; de comentaris</title>
	<meta name="Description" content="" />
	<meta name="KeyWords" content="" />
	<link href="css/tfm.css" rel="stylesheet" type="text/css" />
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
<!-- Datatables CSS -->
	<link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.css" />

<!-- JQuery -->
	<script type="text/javascript" charset="utf8" src="datatables/js/jquery.js"></script>

<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="datatables/js/jquery.dataTables.js"></script>

	<script type="text/javascript" language="javascript" class="init">
<!--
$(document).ready(function() {
			$('#Lista').DataTable( {
				"language": {	url: "datatables/localisation/catala.json"	}
			} );
		} );

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
	
<!-- , "order": [[4, "desc"]] -->
</head>

<body link="#000080" vlink="#800000" dir="ltr" lang="es-ES" onload="MM_preloadImages('img/cerrar32.gif')" xml:lang="es-ES">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="7" valign="top" bgcolor="#F0F0F0">&nbsp;
		<?php include 'cabecera.php'; ?>    </td>
  </tr>
  <!--	Inicio parte particular 	-->
  <tr>
  <tr><td valign="top" class="PaginaCentral" >
     <table width="100%" border="0" cellpadding="2" cellspacing="0">
	 <tr>
    <td colspan="2" class="EtiquetaTitulo">Campanya:</td>
    <td class="TituloPagina">18-19 Assignatura-professor m&agrave;sters P 1r S (101) </td>
    <td colspan="2" class="EtiquetaTitulo">Tipus campanya: </td>
    <td class="TituloPagina">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
    <td class="EtiquetaTitulo">Data exportaci&oacute;: </td>
    <td class="TituloPagina">2019-10-18 12:45:32</td>
    <td class="TituloPagina"><a href="lista.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('btnVolver','','img/cerrar32.gif',1)"><img src="img/cerrar32_up.gif" alt="Tornar" name="btnVolver" width="32" height="32" border="0" id="btnVolver" /></a></td>
	 </tr>
	 <tr>
	   <td class="EtiquetaSubtitulo">sid:</td>
	   <td class="SubtituloPagina">1028</td>
	   <td class="SubtituloPagina">2018-19 - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14117 - ENSENYAMENT DE LA COMPET&Egrave;NCIA CULTURAL I DESENVOLUPAMENT DE LA INTERCULTURALITAT I LA MEDIACI&Oacute; - 2 - Teo2Oline ENSENYAMENT DE LA COMPET&Egrave;NCIA CULTURAL I DESENVOLUPAMENT</td>
	   <td class="EtiquetaSubtitulo">Codi pregunta: </td>
	   <td class="SubtituloPagina">P0202</td>
	   <td class="SubtituloPagina">COMENTARIS SOBRE {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}: (aspectes positius / aspectes de millora)</td>
	   <td class="EtiquetaSubtitulo">tid:</td>
	   <td class="SubtituloPagina">1</td>
	   <td class="EtiquetaSubtitulo">&nbsp;</td>
	   </tr>
  </table>
  <br/>
  <form id="datos" name="datos" method="post" action="ficha_101.php"><br />

    <table border="0" align="center" cellpadding="5" cellspacing="0" class="TablaComentario">
	  <tr>
	    <td class="EtiquetaComentario">Comentari original:		</td>
		<td colspan="2">
		  <textarea name="textarea" cols="80" rows="10" readonly="readonly" class="CampoComentario">es necesario realizar tantos dias de deontologia??? se han dedicado ha leer el puñetero codigo!!!! para eso!!! me quedo en casa y lo leo YO!!!! que para algo se leer solita!!!!

5 horas!!!! con una hora de media `parte!!!! PARA QUE COÑOO ???????? hagan la classe de 4 horas y 15 minutos descanso, que no necesitas tanto tiempo para comerte el bocadillo e ir al bar!!! la gente trabaja ja a estas alturas!!! quiere ir por faena, y descansar, descansamos en NUESTRA CASA!!!!!!!!!!!!!!asi que esa hora ESTUPIDA que dejan entre medio........ ningun sentido.

Despues los profesores, terminan a las 8 igualmente, y estna una hora alli hablando de su vida ............. y no de su vida practica como abogados.......

Espavilad un poco!!!
		  </textarea>		</td>
		</tr>
	  <tr>
	    <td class="EtiquetaComentario">Tipus incid&egrave;ncia: </td>
	    <td colspan="2">
			  <select name="select" class="CampoComentario" id="classif">
				<option>&nbsp;</option>
				<option>No ha impartit classe</option>
				<option>Passar a assignatura</option>
				<option>Passar a professor</option>
				<option>Faltes d'ortografia</option>
				<option>Emoticones excessives</option>
				<option>Comentari problem&agrave;tic</option>
				<option selected="selected">Comentari ofensiu</option>
			  </select>
			  <br />
			  <select class="CampoComentario" id="classif2">
				<option>&nbsp;</option>
				<option>No ha impartit classe</option>
				<option>Passar a assignatura</option>
				<option>Passar a professor</option>
				<option>Faltes d'ortografia</option>
				<option  selected="selected">Emoticones excessives</option>
				<option>Comentari problem&agrave;tic</option>
				<option>Comentari ofensiu</option>
			  </select>  			</td>
	    </tr>
	  <tr>
	    <td class="EtiquetaComentario">Proposta soluci&oacute;: </td>
	    <td colspan="2"><select name="solucio1" class="CampoComentario" id="select2">
          <option>&nbsp;</option>
          <option>Substituir part de la frase</option>
          <option>Eliminar part de la frase</option>
          <option selected="selected">Eliminar frase completa</option>
          <option>Corregir faltes ortografia</option>
          <option>Eliminar Emoticones</option>
        </select>
	      <br/>
		  <select name="solucio2" class="CampoComentario" id="select">
	        <option>&nbsp;</option>
	        <option>Substituir part de la frase</option>
	        <option>Eliminar part de la frase</option>
	        <option >Eliminar frase completa</option>
	        <option>Corregir faltes ortografia</option>
	        <option selected="selected">Eliminar Emoticones</option>
	      </select>	      </td>
	    </tr>
	  <tr>
	    <td class="EtiquetaComentario">Comentari proposat: </td>
	    <td colspan="2"><textarea name="textarea2" cols="80" rows="10" class="CampoComentario">&Eacute;s necesario realizar tantos dias de deontologia? para eso me quedo en casa y lo leo yo que para algo se leer solita.
5 horas con una hora de media `parte. hagan la classe de 4 horas y 15 minutos descanso, que no necesitas tanto tiempo para comerte el bocadillo e ir al bar. La gente trabaja ja a estas alturas. Quiere ir por faena, y descansar, descansamos en nuestra casa. Asi que esa hora  que dejan entre medio, ningun sentido. 
Despues los profesores, terminan a las 8 igualmente, y est&aacute;n una hora alli hablando de su vida y no de su vida practica como abogados.
		  </textarea></td>
	    </tr>
	  <tr>
	    <td class="EtiquetaComentario">&nbsp;</td>
	    <td align="center"><input type="submit" name="Submit" value="Acceptar" /></td>
	    <td align="center"><input type="reset" name="Cancel" value="Cancel.lar" /></td>
	  </tr>
	</table>
	<p>&nbsp;</p>
      </form>
	
	<!--	Fin parte particular	 -->
  
    </td>
  </tr>
  <tr>
  	<td colspan="7">
		<?php include 'pie.htm'; ?>	</td>
  </tr>
</table>
</body>
</html>
