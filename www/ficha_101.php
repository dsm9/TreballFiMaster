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
    <td class="EtiquetaTitulo">Campanya:</td>
    <td class="TituloPagina">18-19 Assignatura-professor m&agrave;sters P 1r S (101) </td>
    <td class="EtiquetaTitulo">Tipus campanya: </td>
    <td class="TituloPagina">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
    <td class="EtiquetaTitulo">Data exportaci&oacute;: </td>
    <td class="TituloPagina">2019-10-18 12:45:32</td>
    <td class="TituloPagina"><a href="lista.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('btnVolver','','img/cerrar32.gif',1)"><img src="img/cerrar32_up.gif" alt="Tornar" name="btnVolver" width="32" height="32" border="0" id="btnVolver" /></a></td>
	 </tr>
  </table>
	 <form id="datos" name="datos" method="post" action="ficha_101.php"><br />

  	<div align="right">
       <label>
        <input name="Submit" type="submit" class="BotonGrande" value="Desar comentaris acceptats" style="cursor:pointer" />
        </label>	  
	</div>
	 	
  <table border="0" align="center" cellpadding="5" cellspacing="0" class="TablaResumen">
  <tr>
    <td><strong>Resum campanya:</strong> </td>
    <td>Enquestes:  </td>
    <td class="ValorResumen">114</td>
    <td>&nbsp;</td>
    <td>Enquestats:  </td>
    <td class="ValorResumen">1.489</td>
    <td>&nbsp;</td>
    <td> Respostes:  </td>
    <td class="ValorResumen">11.775</td>
    <td>&nbsp;</td>
    <td>Comentaris:  </td>
    <td class="ValorResumen">640</td>
  </tr>
  </table>  

	  <table width="99%" align="center">
	  <tr><td>
 	    <table cellspacing="0" cellpadding="0" id="Lista" class="display ListaComenta">
          <thead>
          <tr height="34">
            <td height="34"  >Descripci&oacute;</td>
            <td  >Codi pregunta</td>
            <td  >Pregunta</td>
            <td >Codi prof.</td>
            <td >Nom<br />
              professor/a</td>
            <td >Comentari original </td>
            <td >Tipus incid&egrave;ncia (Classificaci&oacute;) </td>
			<td>Proposta soluci&oacute;</td>
            <td >Comentari proposat</td>
            <td >Acceptar</td>
          </tr>
		  </thead>
		  <tbody>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Todo muy &uacute;til.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
			<td ><label>
              <textarea class="ListaComenta"  name="textarea" cols="50" rows="5"></textarea>
            </label></td>
            <td ><input type="checkbox" name="checkbox12" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Se preocupa mucho y se ocupa.    Responde enseguida. Se esfuerza en que aprendamos. Sus clases son amenas y    explica fenomenal. Es un profesor muy bueno.</td>
            <td >
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
			<td ><textarea class="ListaComenta" name="textarea2" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox122" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >El professor &eacute;s el m&eacute;s dedicat i    expert que hem tingut fins ara. Super col.laborador, sempre predisposat a    ajudar i resoldre dubtes i amb rapidesa. Fant&agrave;stic.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
			<td ><textarea class="ListaComenta" name="textarea3" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox123" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >&Eacute;s una assignatura complicada,    per&ograve; tot el material que el professor ha ficat a recursos facilita molt.    Presentacions, videos, tutorials....</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea6" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox124" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >&Eacute;s una assignatura que no &eacute;s    f&agrave;cil, per&ograve; el Xavier es preocupa perqu&egrave; l'entenguem, l'inter&egrave;s, l'ajuda que    d&oacute;na, la rapidesa en la qual contesta i les explicacions, fa que sigui m&eacute;s    f&agrave;cil. &Eacute;s un molt bon professor, l'assignatura millora per ell.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
			<td ><textarea class="ListaComenta" name="textarea7" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox125" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Molt bon mestre. Respon molt    r&agrave;pid i molt did&agrave;ctic</td>
            <td >
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option selected="selected">Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>			
            <td>&nbsp;</td>
			</td>
            <td >              <textarea class="ListaComenta" name="textarea4" cols="50" rows="5"></textarea>
              <br />
              (blanc)</td>
            <td ><label>
              <input type="checkbox" name="checkbox" value="checkbox" checked="checked" />
            </label></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M64 - MU en Recerca en Salut - 14064 - AN&Agrave;LISI DE DADES EN LA    INVESTIGACI&Oacute; EN SALUT 1 - 1 - Teo1 AN&Agrave;LISI DE DADES EN LA INVESTIGACI&Oacute; EN    SALUT 1</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Molt bon mestre. Atent, amb    respostes molt r&agrave;pides i molt did&agrave;ctic</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
			<td ><textarea class="ListaComenta" name="textarea5" cols="50" rows="5">Molt bon mestre. Atent, amb    respostes molt r&agrave;pides i molt did&agrave;ctic</textarea>
			(Rebut de comentari assignatura) 
			</td>
            <td ><label>
            <input type="checkbox" name="checkbox2" value="checkbox" checked="checked" />
</label></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12343 - VISUALITZANT LA    MULTICULTURALITAT - 1 - Teo1 VISUALITZANT LA MULTICULTURALITAT</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >He trobat a faltar una mica m&eacute;s    d'interacci&oacute; amb la professora. &Eacute;s una assignatura que m'interessa molt i    crec que han faltat f&ograve;rums on interaccionar sobre diferents temes.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea8" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox126" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12343 - VISUALITZANT LA    MULTICULTURALITAT - 1 - Teo1 VISUALITZANT LA MULTICULTURALITAT</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Me gust&oacute; mucho la postura de    todos, es interesante precisamente conocer los mundos que rodean y en los    cuales vivimos cada uno de nosotros.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea9" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox127" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12343 - VISUALITZANT LA    MULTICULTURALITAT - 1 - Teo1 VISUALITZANT LA MULTICULTURALITAT</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Me ha encantado e disfrutado    much&iacute;simo he aprendido mucho.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea10" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox128" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12343 - VISUALITZANT LA    MULTICULTURALITAT - 1 - Teo1 VISUALITZANT LA MULTICULTURALITAT</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Una excelente profesional. La    asignatura est&aacute; muy bien planteada y las actividades muy equilibradas y bien    planificadas</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea11" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox129" value="checkbox" /></td>
          </tr>
          <tr height="85">
            <td height="85"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12343 - VISUALITZANT LA    MULTICULTURALITAT - 1 - Teo1 VISUALITZANT LA MULTICULTURALITAT</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Tot i no ser el meu punt fort,    crec que les activitats han estat molt ben plantejades i s&oacute;n significatives.    Potser hauria fet m&eacute;s activitats de menys pes o petites entregues, sobretot    de la lectura d'Edward Said, la qual ha estat molt interessant per&ograve; penso que    es podria &quot;fraccionar&quot; i anar comentant entre tots i compartint la    visi&oacute;. Estic molt contenta amb l'assignatura i crec que m'ha aportat moltes    coses i m'ha fet &quot;una mica menys ignorant&quot; en alguns aspectes; per    tant la meva valoraci&oacute; &eacute;s molt positiva.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea12" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox1210" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - M37 - MU en Estudis de G&egrave;nere i Gesti&oacute; de Pol&iacute;tiques d'Igualtat - 14641    - HIST&Ograve;RIA DE LES RELACIONS DE G&Egrave;NERE - 1 - Teo1 HIST&Ograve;RIA DE LES RELACIONS DE    G&Egrave;NERE</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Pel que fa als aspectes positius    cal dir que estic molt satisfeta amb l'assignatura, tant amb la metodologia    treballada com amb les professores. Pel que fa a la metodologial&nbsp; l'he trobat molt interessant, ja que no ens    en donem compte que la nostra forma de parlar est&agrave; completament    masculinitzada, gr&agrave;cies a l'assignatura he pogut corregir alguns d'aquests    errors, tot i que em queda molt per treballar.&nbsp;<br/>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea4" cols="50" rows="5"><p>Pel que fa als aspectes positius    cal dir que estic molt satisfeta amb l'assignatura, tant amb la metodologia    treballada com amb les professores. Pel que fa a la metodologial&nbsp; l'he trobat molt interessant, ja que no ens    en donem compte que la nostra forma de parlar est&agrave; completament    masculinitzada, gr&agrave;cies a l'assignatura he pogut corregir alguns d'aquests    errors, tot i que em queda molt per treballar.&nbsp;</p>
              <p>Feedback r&agrave;pid i proper. Molt    interessant</p></textarea>
			  (Rebut de comentari professor)
			  </td>
            <td ><input type="checkbox" name="checkbox3" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - M37 - MU en Estudis de G&egrave;nere i Gesti&oacute; de Pol&iacute;tiques d'Igualtat - 14641    - HIST&Ograve;RIA DE LES RELACIONS DE G&Egrave;NERE - 1 - Teo1 HIST&Ograve;RIA DE LES RELACIONS DE    G&Egrave;NERE</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Feedback r&agrave;pid i proper. Molt    interessant</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option selected="selected">Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea14" cols="50" rows="5"></textarea>
              <br />
              (blanc)</td>
            <td ><input type="checkbox" name="checkbox4" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="102">
            <td height="102"  >2018-19    - 1 - M37 - MU en Estudis de G&egrave;nere i Gesti&oacute; de Pol&iacute;tiques d'Igualtat - 14641    - HIST&Ograve;RIA DE LES RELACIONS DE G&Egrave;NERE - 1 - Teo1 HIST&Ograve;RIA DE LES RELACIONS DE    G&Egrave;NERE</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Me habria gustado que se    profundizase m&aacute;s, especialmente el tema 3, que se queda un poco escaso; la    evaluaci&oacute;n creo que podr&iacute;a mejorarse ampliando la informaci&oacute;n dada en los    temas o con una gu&iacute;a estructurada del trabajo (lecturas concretas donde    apoyarse), ya que es principalmente un encargo de investigaci&oacute;n y si no    tienes formaci&oacute;n previa relacionada es complejo encontrar tanta informaci&oacute;n y    estructurarla adecuadamente en tan poco tiempo; no obstante, he aprendido    mucho y me ha gustado la asignatura&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea13" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox1211" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - M37 - MU en Estudis de G&egrave;nere i Gesti&oacute; de Pol&iacute;tiques d'Igualtat - 14641    - HIST&Ograve;RIA DE LES RELACIONS DE G&Egrave;NERE - 1 - Teo1 HIST&Ograve;RIA DE LES RELACIONS DE    G&Egrave;NERE</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Me ha gustado como ha enfocado    la asignatura y los temas propuestos, as&iacute; como los audiovisuales que nos ha    proporcionado, aunque el tema 3 me result&oacute; un poco corto; ha sido muy atento    y educado en todo momento, respondiendo r&aacute;pidamente a las consultas. Habr&iacute;a    preferido que la correcci&oacute;n de las actividades fuera un poco m&aacute;s r&aacute;pida&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea44" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox1212" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14286 - RECURSOS WEB I    TECNOLOGIES M&Ograve;BIL - 1 - Teo1 RECURSOS WEB I TECNOLOGIES M&Ograve;BIL</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >�\_(?)_/�</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option selected="selected">Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>

            <td ><textarea class="ListaComenta" name="textarea15" cols="50" rows="5"></textarea>
              <br />
              (blanc)</td>
            <td ><input type="checkbox" name="checkbox5" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14286 - RECURSOS WEB I    TECNOLOGIES M&Ograve;BIL - 1 - Teo1 RECURSOS WEB I TECNOLOGIES M&Ograve;BIL</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >No estoy de acuerdo con pedir    trabajos sobre los cuales no se han explicado las consignas</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea16" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12122" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14286 - RECURSOS WEB I    TECNOLOGIES M&Ograve;BIL - 1 - Teo1 RECURSOS WEB I TECNOLOGIES M&Ograve;BIL</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >L&rsquo;&uacute;ltim dia de classe vam acabar    1hora i 30m abans i poc contingut en aquesta &uacute;ltima classe. Pel que fa les    altres classes estic comforme.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea17" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12123" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14286 - RECURSOS WEB I    TECNOLOGIES M&Ograve;BIL - 1 - Teo1 RECURSOS WEB I TECNOLOGIES M&Ograve;BIL</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Classes poc preparades, a    excepci&oacute; de la primera classe, els continguts eren for&ccedil;a irrellevants.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea18" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12124" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Excelente profesora. Transmite    muy bien sus conocimientos.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea19" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12125" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >Muy buena profesora.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea20" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12126" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0203</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE3.value} {APELLIDO1PROFE3.value} {APELLIDO2PROFE3.value}:    (aspectes positius / aspectes de millora)</td>
            <td >3</td>
            <td ></td>
            <td >No he tenido contacto </td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option selected="selected">No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea21" cols="50" rows="5"></textarea>
              <br />
              (Eliminar fila) </td>
            <td ><input type="checkbox" name="checkbox6" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Las docentes que dictaron los    m&oacute;dulos de Derecho Internacional Humanitario y Nuevos Proceso Penales    considero que tienen un excelente manejo del tema y se desenvuelven muy bien    con los estudiantes, lastimosamente les dejaron muy pocas horas para dictar sus    temas.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option selected="selected">Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea22" cols="50" rows="5"></textarea>
              <br />
              (blanc)</td>
            <td ><input type="checkbox" name="checkbox7" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Excelente charla, se nota la    experiencia y el dominio del tema, aporta bastante en el desarrollo de la    materia y hace criticas muy apropiadas a cada uno de los contenidos de la    materia, lastimosamente solo fueron un par de horas. Ser&iacute;a mas sustancioso si    a ella se le dejara gran parte del desarrollo de las clases presenciales.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea22" cols="50" rows="5"><p>Excelente charla, se nota la    experiencia y el dominio del tema, aporta bastante en el desarrollo de la    materia y hace criticas muy apropiadas a cada uno de los contenidos de la    materia, lastimosamente solo fueron un par de horas. Ser&iacute;a mas sustancioso si    a ella se le dejara gran parte del desarrollo de las clases presenciales.</p>
              <p>Las docentes que dictaron los    m&oacute;dulos de Derecho Internacional Humanitario y Nuevos Proceso Penales    considero que tienen un excelente manejo del tema y se desenvuelven muy bien    con los estudiantes, lastimosamente les dejaron muy pocas horas para dictar sus    temas.&nbsp;</p></textarea>
			  (Rebut de comentari assignatura)
			  </td>
            <td ><input type="checkbox" name="checkbox8" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >Una docente impecable en sus    calidades profesionales y personales, tuvo un trato muy amable con nosotros    durante las dos semanas de clases, adem&aacute;s su charla result&oacute; muy amena y    refrescante de algunos temas ya olvidados del DIH.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea23" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12127" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0203</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE3.value} {APELLIDO1PROFE3.value} {APELLIDO2PROFE3.value}:    (aspectes positius / aspectes de millora)</td>
            <td >3</td>
            <td ></td>
            <td >El professor va realitzar comentaris despectius en reiterades ocasions referits al col&middot;lectiu LGTBI </td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option selected="selected">Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>			
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea24" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12128" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Creo que se deber&iacute;a facilitar    m&aacute;s material de estudio a trav&eacute;s de la plataforma, para que aquel que    quisiera pudiera profundizar m&aacute;s en la materia.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea25" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox12129" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Muy buena docente</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea26" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121210" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M31 - MU en Sistema de Just&iacute;cia Penal - 13302 - PROCESSOS JUDICIALS    PENALS - 1 - Teo1 PROCESSOS JUDICIALS PENALS</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >Habla mucho en los examen y eso es fruto de desconcentraci&oacute;n. Cuando hay otro profesor explicando interrumpe para hablar &eacute;l. </td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option selected="selected">Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>			
            <td ><textarea class="ListaComenta" name="textarea27" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121211" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14127 -    NOVES TECNOLOGIES APLICADES A L'ENSENYAMENT DE LE I L2 - 2 - Teo1Oline NOVES    TECNOLOGIES APLICADES A L'ENSENYAMENT DE LE I L2</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td>&nbsp;</td>
            <td >Aun no se ha cursado. No puedo    evaluar</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea28" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121212" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - MIF - MU en Incendis Forestals. Ci&egrave;ncia i Gesti&oacute; Integral - 12272 -    CAUSALITAT, FACTORS I MODELS D'AN&Agrave;LISI DEL RISC - 1 - Teo1 CAUSALITAT,    FACTORS I MODELS D'AN&Agrave;LISI DEL RISC</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Procurar que les classes m&eacute;s    avan&ccedil;ades de R siguin al final de la part pressencial quan ja haguem fet unes    hores b&agrave;siques del programa.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea29" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121213" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - MIF - MU en Incendis Forestals. Ci&egrave;ncia i Gesti&oacute; Integral - 12272 -    CAUSALITAT, FACTORS I MODELS D'AN&Agrave;LISI DEL RISC - 1 - Teo1 CAUSALITAT,    FACTORS I MODELS D'AN&Agrave;LISI DEL RISC</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Hubo un profesor que no sab&iacute;a a    lo que venia... con el tema del R. <br />
              Fant&aacute;stico el otro profesor del R</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea30" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121214" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - MIF - MU en Incendis Forestals. Ci&egrave;ncia i Gesti&oacute; Integral - 12272 -    CAUSALITAT, FACTORS I MODELS D'AN&Agrave;LISI DEL RISC - 1 - Teo1 CAUSALITAT,    FACTORS I MODELS D'AN&Agrave;LISI DEL RISC</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >Siempre disponible</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea31" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121215" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - MIF - MU en Incendis Forestals. Ci&egrave;ncia i Gesti&oacute; Integral - 12272 -    CAUSALITAT, FACTORS I MODELS D'AN&Agrave;LISI DEL RISC - 1 - Teo1 CAUSALITAT,    FACTORS I MODELS D'AN&Agrave;LISI DEL RISC</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Nivell b&agrave;sic de programaci&oacute; amb    R abans de tot.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea32" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121216" value="checkbox" /></td>
          </tr>
          <tr height="68">
            <td height="68"  >2018-19    - 1 - MIF - MU en Incendis Forestals. Ci&egrave;ncia i Gesti&oacute; Integral - 12272 -    CAUSALITAT, FACTORS I MODELS D'AN&Agrave;LISI DEL RISC - 1 - Teo1 CAUSALITAT,    FACTORS I MODELS D'AN&Agrave;LISI DEL RISC</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Asignatura muy interesante, con    profesor muy bien preparado en te&oacute;rica y pr&aacute;ctica. Muy intersante la salida a    campo a identificar vestigios en incendio real.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea33" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121217" value="checkbox" /></td>
          </tr>
          <tr height="102">
            <td height="102"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14117 -    ENSENYAMENT DE LA COMPET&Egrave;NCIA CULTURAL I DESENVOLUPAMENT DE LA    INTERCULTURALITAT I LA MEDIACI&Oacute; - 2 - Teo2Oline ENSENYAMENT DE LA COMPET&Egrave;NCIA    CULTURAL I DESENVOLUPAMENT</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Es totalmente in&uacute;til el hecho de    tener que grabarnos en video, con gente que no puede aparecer totalmente en    una actividad.&nbsp;</td>
            <td >
				<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
			<td>&nbsp;</td>
            <td ><textarea class="ListaComenta" class="ListaComenta" name="textarea34" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121218" value="checkbox" /></td>
          </tr>
          <tr height="102">
            <td height="102"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14117 -    ENSENYAMENT DE LA COMPET&Egrave;NCIA CULTURAL I DESENVOLUPAMENT DE LA    INTERCULTURALITAT I LA MEDIACI&Oacute; - 2 - Teo2Oline ENSENYAMENT DE LA COMPET&Egrave;NCIA    CULTURAL I DESENVOLUPAMENT</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >La mejor profesional del m&aacute;ster    sin duda. La que m&aacute;s y mejor caso hace a los de modalidad virtual. Creo que    otros profesores deber&iacute;an demostrar algo m&aacute;s de implicaci&oacute;n.<br />
                <br />
              Como cosa negativa, las actividades de video son inc&oacute;modas.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea35" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121219" value="checkbox" /></td>
          </tr>
          <tr height="102">
            <td height="102"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14117 -    ENSENYAMENT DE LA COMPET&Egrave;NCIA CULTURAL I DESENVOLUPAMENT DE LA    INTERCULTURALITAT I LA MEDIACI&Oacute; - 2 - Teo2Oline ENSENYAMENT DE LA COMPET&Egrave;NCIA    CULTURAL I DESENVOLUPAMENT</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >&quot;Una merda tan gran com tots els p&ograve;sters que hem fet junts &quot; </td>
			<td>Comentari ofensiu
			<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('btnModifClasif','','img/modif.gif')"><img src="img/modif_dis.gif" alt="Tornar" name="btnModifClasif" width="16" height="16" border="0" id="btnModifClasif" /></a>
			</td>
            <td>Eliminar frase</td>			
            <td ><textarea class="ListaComenta" name="textarea36" cols="50" rows="5"></textarea>
              <br />
              (blanc)</td>
            <td ><input type="checkbox" name="checkbox121220" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14280 - SOCIAL MEDIA    COMMERCE - 1 - Teo1 SOCIAL MEDIA COMMERCE</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >No concuerda lo expuesto en    clases con lo pedido en las evaluaciones. Poca explicaci&oacute;n. El profesor lleg&oacute;    tarde y debimos recuperar las horas en otro d&iacute;a y otro horario. Deben mejorar    mucho</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea37" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121221" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14280 - SOCIAL MEDIA    COMMERCE - 1 - Teo1 SOCIAL MEDIA COMMERCE</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td ><p>es necesario realizar tantos dias de deontologia??? se han dedicado ha leer el pu&ntilde;etero codigo!!!! para eso!!! me quedo en casa y lo leo YO!!!! que para algo se leer solita!!!! </p>
              <p>5 horas!!!! con una hora de media `parte!!!! PARA QUE CO&Ntilde;OO ???????? hagan la classe de 4 horas y 15 minutos descanso, que no necesitas tanto tiempo para comerte el bocadillo e ir al bar!!! la gente trabaja ja a estas alturas!!! quiere ir por faena, y descansar, descansamos en NUESTRA CASA!!!!!!!!!!!!!!asi que esa hora ESTUPIDA que dejan entre medio........ ningun sentido.              </p>
              <p>Despues los profesores, terminan a las 8 igualmente, y estna una hora alli hablando de su vida ............. y no de su vida practica como abogados.......              </p>
              <p>Espavilad un poco!!!</p></td>
			<td>
			<select id="classif1" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option selected="selected">Comentari ofensiu</option>
				</select>
				
			<select id="classif2" class="ListaComenta">
					<option>&nbsp;</option
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option selected="selected">Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea37" cols="50" rows="5"><p>es necesario realizar tantos dias de deontologia? para eso me quedo en casa y lo leo yo que para algo se leer solita</p>
              <p>5 horas con una hora de media `parte. hagan la classe de 4 horas y 15 minutos descanso, que no necesitas tanto tiempo para comerte el bocadillo e ir al bar. La gente trabaja ja a estas alturas. Quiere ir por faena, y descansar, descansamos en nuestra casa. Asi que esa hora  que dejan entre medio, ningun sentido. </p>
              <p>Despues los profesores, terminan a las 8 igualmente, y estna una hora alli hablando de su vida  y no de su vida practica como abogados</p></textarea></td>
            <td ><input type="checkbox" name="checkbox9" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14280 - SOCIAL MEDIA    COMMERCE - 1 - Teo1 SOCIAL MEDIA COMMERCE</td>
            <td  >P0203</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE3.value} {APELLIDO1PROFE3.value} {APELLIDO2PROFE3.value}:    (aspectes positius / aspectes de millora)</td>
            <td >3</td>
            <td ></td>
            <td >El senyor Narc&iacute;s coneix en    profunditat el tema marketing, &eacute;s nota; tot i que no comunica amb tota la    claretat possible els continguts de l&rsquo;assignatura.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea38" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121222" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14280 - SOCIAL MEDIA    COMMERCE - 1 - Teo1 SOCIAL MEDIA COMMERCE</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Els continguts eren bons per&ograve;    podrien ser millors. Ens han explicat continguts d'inter&egrave;s i eines per&ograve; no    tenim acc&eacute;s a les eines. A m&eacute;s a m&eacute;s no ens han fet cap devoluci&oacute; dels    treballs presentats amb la qual cosa no se si he apr&eacute;s o desapr&eacute;s.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea39" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121223" value="checkbox" /></td>
          </tr>
          <tr height="85">
            <td height="85"  >2018-19    - 1 - M39 - MU en M&agrave;rqueting de Mitjans Socials - 14280 - SOCIAL MEDIA    COMMERCE - 1 - Teo1 SOCIAL MEDIA COMMERCE</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >Agrairia que enviessin el    material de les sessions, abans de la classe, o m&agrave;xim el dia de la classe, de    cara a poder preparar amb temps els treballs.<br />
              Crec que es dona molt poc material i es fan poques hores de doc&egrave;ncia per    poder assimilar tot i poder realitzar correctament tots els AES.<br />
              En quant a dubtes, hi ha professors que no responen els correus.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea40" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121224" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12351 - EDUCACI&Oacute; PLURILING&Uuml;E I    INTERCULTURAL - 1 - Teo1 EDUCACI&Oacute; PLURILING&Uuml;E I INTERCULTURAL</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >He considerat la majoria    d'activitats molt significatives. Bona barreja entre la teoria i la pr&agrave;ctica,    el que fa que l'assignatura no es faci gens feixuga. Els continguts han sigut    molt interessants. L'&uacute;nic per&ograve; &eacute;s que hi havia moltes activitats a fer i la    c&agrave;rrega de feina l'he trobat una mica excessiva.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea41" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121225" value="checkbox" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12351 - EDUCACI&Oacute; PLURILING&Uuml;E I    INTERCULTURAL - 1 - Teo1 EDUCACI&Oacute; PLURILING&Uuml;E I INTERCULTURAL</td>
            <td  >P0201</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE1.value} {APELLIDO1PROFE1.value} {APELLIDO2PROFE1.value}:    (aspectes positius / aspectes de millora)</td>
            <td >1</td>
            <td ></td>
            <td >Perfecte. Respon i corretgeix molt r&agrave;pid, sempre    disponible, a l'escolta...</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option selected="selected">Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea41" cols="50" rows="5">Perfecte. Respon i corregeix molt r&agrave;pid, sempre    disponible, a l'escolta...</textarea></td>
            <td ><input type="checkbox" name="checkbox10" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="51">
            <td height="51"  >2018-19    - 1 - M19 - MU en Lleng&uuml;es Aplicades - 12351 - EDUCACI&Oacute; PLURILING&Uuml;E I    INTERCULTURAL - 1 - Teo1 EDUCACI&Oacute; PLURILING&Uuml;E I INTERCULTURAL</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >Perfecto. Muy pr&oacute;ximo a los    alumnos, muy abierto e invitante a la discusi&oacute;n y reflexi&oacute;n.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea42" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121226" value="checkbox" /></td>
          </tr>
          <tr height="102">
            <td height="102"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14118 -    ENSENYAMENT DE LA LLENGUA I LA CULTURA A COL&middot;LECTIUS IMMIGRANTS - 1 - Teo1Spr    ENSENYAMENT DE LA LLENGUA I LA CULTURA A IMMIGRANTS</td>
            <td  >A02</td>
            <td  >COMENTARIS DE L'ASSIGNATURA:    (aspectes positius / aspectes de millora)</td>
            <td >0</td>
            <td></td>
            <td >lo bueno es que la asignatura    nos deja una idea de los aspectos no linguisticos que tener en cuenta, tales    como las actitudes y las motivaciones. ademas, nos ejercita a evaluar un    manual de ensenanza de L2. sin embargo, Los contenidos ensenados no tienen    relacion con el titulo de la asignatura. nos mandan analizar un manual sin    haber ensenado como se hace. las evaluaciones no facilitan un aprendizaje (no    se facilitan instrucciones suficientes ni claras, ni rubrica para    evaluacion). no se hace comentario detallado despues de la evaluacion, para    dar cuenta de la valoracion positiva y negativa del los aspectos del trabajo.</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option selected="selected">Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>

            <td ><textarea class="ListaComenta" name="textarea41" cols="50" rows="5">lo bueno es que la asignatura    nos deja una idea de los aspectos no linguisticos que tener en cuenta, tales    como las actitudes y las motivaciones. ademas, nos ejercita a evaluar un    manual de ensenanza de L2. sin embargo, Los contenidos ense&ntilde;ados no tienen    relacion con el titulo de la asignatura. nos mandan analizar un manual sin    haber ense&ntilde;ado como se hace. las evaluaciones no facilitan un aprendizaje (no    se facilitan instrucciones suficientes ni claras, ni r&uacute;brica para    evaluacion). no se hace comentario detallado despues de la evaluacion, para    dar cuenta de la valoracion positiva y negativa del los aspectos del trabajo.</textarea></td>
            <td ><input type="checkbox" name="checkbox11" value="checkbox" checked="checked" /></td>
          </tr>
          <tr height="85">
            <td height="85"  >2018-19    - 1 - M18 - MU en Ensenyament d'Espanyol/Catal&agrave; per a Immigrants - 14118 -    ENSENYAMENT DE LA LLENGUA I LA CULTURA A COL&middot;LECTIUS IMMIGRANTS - 1 - Teo1Spr    ENSENYAMENT DE LA LLENGUA I LA CULTURA A IMMIGRANTS</td>
            <td  >P0202</td>
            <td  >COMENTARIS SOBRE    {NOMBREPROFE2.value} {APELLIDO1PROFE2.value} {APELLIDO2PROFE2.value}:    (aspectes positius / aspectes de millora)</td>
            <td >2</td>
            <td ></td>
            <td >facilita bastantes conocimientos    sobre los aspectos que trata. desde el principio no se sabe qu&eacute; se va a    ensenar y por qu&eacute;. la evaluacion es complicada. dificil saber qu&eacute; espera    exactamente y qu&eacute; ha ha sido bueno o malo despues de la evaluacion.&nbsp;</td>
			<td>
			<select id="classif" class="ListaComenta">
					<option>&nbsp;</option>
					<option>No ha impartit classe</option>o
					<option>Passar a assignatura</option>
					<option>Passar a professor</option>
					<option>Faltes d'ortografia</option>
					<option>Emoticones excessives</option>
					<option>Comentari problem&agrave;tic</option>
					<option>Comentari ofensiu</option>
				</select>
			</td>
            <td>&nbsp;</td>
            <td ><textarea class="ListaComenta" name="textarea43" cols="50" rows="5"></textarea></td>
            <td ><input type="checkbox" name="checkbox121227" value="checkbox" /></td>
          </tr>
		  </tbody>
        </table>
		</td></tr>
		</table>		
 	    <br />

	<br />

	<br/>
    <br/>
    <p><br />
    </p>
    <p><br />
        <br />
        <br />
        <br />
    </p>
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