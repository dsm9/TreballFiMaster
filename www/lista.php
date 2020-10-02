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
		$(document).ready(function() {
			$('#Lista').DataTable( {
				"language": {	url: "datatables/localisation/catala.json"	}
			} );
		} );
	</script>
	
<!-- , "order": [[4, "desc"]] -->	
	
</head>

<body link="#000080" vlink="#800000" dir="ltr" lang="es-ES" xml:lang="es-ES">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" valign="top" bgcolor="#F0F0F0">&nbsp;
		<?php include 'cabecera.php'; ?>	
    </td>
  </tr>
  <tr>
  <tr>
    <td class="TituloPagina">Selecci&oacute; de campanya:</td>
  </tr>
    <td valign="top" class="PaginaCentral" >
     
  <!--	Inicio parte particular 	-->
              
      <form id="datos" name="datos" method="post" action="login.php"><br />
 	<br />
	<br />
	<table width="90%" align="center">
	<tr><td>
	<table align="center" id="Lista" class="display">
	<thead>	
	<tr>
		<th height="17" align="left">Codi campanya</td>
		<th align="left">Nom campanya</td>
		<th align="left">Tipus campanya</td>
		<th align="left">Data extracci&oacute;</td>
	</tr>
	</thead>	
	<tbody>
	<tr>
		<td height="17" align="right" sdval="185" sdnum="3082;">
		<a href="ficha.php">185</a></td>
		<td align="left"><a href="ficha.php">19-20 Assignatura-professor M&Agrave;STERS 2S</a></td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 17:57:24</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="197" sdnum="3082;">197</td>
		<td align="left">19-20 Assignatura-professor M&Agrave;STERS INEFC 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 17:50:10</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="183" sdnum="3082;">183</td>
		<td align="left">19-20 Assignatura-professor GRAUS FIF 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 17:09:59</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="184" sdnum="3082;">184</td>
		<td align="left">19-20 Assignatura-professor Dobles Graus INEFC 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 17:03:43</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="204" sdnum="3082;">204</td>
		<td align="left">19-20 Assignatura-professor DG INEFC 2S -800022-</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 17:02:08</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="178" sdnum="3082;">178</td>
		<td align="left">19-20 Assignatura-professor GRAUS FDET 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 15:06:13</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="182" sdnum="3082;">182</td>
		<td align="left">19-20 Assignatura-professor GRAUS FM 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 15:02:47</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="176" sdnum="3082;">176</td>
		<td align="left">19-20 Assignatura-professor GRAUS INEFC 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 14:56:40</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="179" sdnum="3082;">179</td>
		<td align="left">19-20 Assignatura-professor GRAUS ETSEA 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 14:51:28</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="181" sdnum="3082;">181</td>
		<td align="left">19-20 Assignatura-professor GRAUS FEPTS 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 14:28:47</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="177" sdnum="3082;">177</td>
		<td align="left">19-20 Assignatura-professor GRAUS EPS 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 14:03:26</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="180" sdnum="3082;">180</td>
		<td align="left">19-20 Assignatura-professor GRAUS LLETRES 2S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-07-10 13:10:56</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="201" sdnum="3082;">201</td>
		<td align="left">19-20 Diploma Estudis Hisp&agrave;nics 2S</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2020-07-06 10:10:00</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="199" sdnum="3082;">199</td>
		<td align="left">19-20 S&egrave;nior 2S</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2020-07-06 10:05:04</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="142" sdnum="3082;">142</td>
		<td align="left">19-20 Assignatura-professor GRAUS FDET 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-30 14:25:52</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="139" sdnum="3082;">139</td>
		<td align="left">19-20 Assignatura-professor GRAUS EPS 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-30 13:34:58</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="200" sdnum="3082;">200</td>
		<td align="left">19-20 Diploma Estudis Hisp&agrave;nics 1S-</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2020-06-19 12:55:49</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="198" sdnum="3082;">198</td>
		<td align="left">19-20 S&egrave;nior 1S-</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2020-06-19 12:28:17</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="159" sdnum="3082;">159</td>
		<td align="left">19-20 Assignatura-professor M&Agrave;STERS INEFC 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 17:09:31</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="156" sdnum="3082;">156</td>
		<td align="left">19-20 Assignatura-professor Dobles Graus INEFC 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 17:01:34</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="154" sdnum="3082;">154</td>
		<td align="left">19-20 Assignatura-professor GRAUS INEFC 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 16:53:42</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="151" sdnum="3082;">151</td>
		<td align="left">19-20 Assignatura-professor M&Agrave;STERS 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 16:48:31</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="148" sdnum="3082;">148</td>
		<td align="left">19-20 Assignatura-professor GRAUS FIF 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 16:37:25</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="147" sdnum="3082;">147</td>
		<td align="left">19-20 Assignatura-professor GRAUS FM 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 16:24:10</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="145" sdnum="3082;">145</td>
		<td align="left">19-20 Assignatura-professor GRAUS LLETRES 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 16:06:14</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="144" sdnum="3082;">144</td>
		<td align="left">19-20 Assignatura-professor GRAUS ETSEA 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 15:47:04</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="146" sdnum="3082;">146</td>
		<td align="left">19-20 Assignatura-professor GRAUS FEPTS 1S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 14:51:17</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="138" sdnum="3082;">138</td>
		<td align="left">19-20 Assignatura-professor G502 - MINOR internac.</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-12 14:07:42</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="174" sdnum="3082;">174</td>
		<td align="left">19-20 Assignatura-professor M&Agrave;STERS 1S -M509-</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-08 13:23:00</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="160" sdnum="3082;">160</td>
		<td align="left">19-20 Assignatura-professor M&Agrave;STERS 1S -M113-</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-06-08 11:46:09</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="202" sdnum="3082;">202</td>
		<td align="left">19-20 Titulats formaci&oacute; cont&iacute;nua 2n P</td>
		<td align="left">Enquesta sobre els programes de formaci&oacute; cont&iacute;nua</td>
		<td align="left" sdnum="3082;0;@">2020-06-08 10:04:36</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="168" sdnum="3082;">168</td>
		<td align="left">19-20 Pr&agrave;ctiques externes - estudiantat (GEM - 1P)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2020-03-18 11:54:29</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="115" sdnum="3082;">115</td>
		<td align="left">18-19 Assignatura-professor INEFC 2n S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2020-03-12 12:42:34</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="136" sdnum="3082;">136</td>
		<td align="left">18-19 Pr&agrave;ctiques externes - tutor acad&egrave;mic (GEM)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Tutor acad&egrave;mic</td>
		<td align="left" sdnum="3082;0;@">2020-03-09 10:39:35</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="169" sdnum="3082;">169</td>
		<td align="left">19-20 Titulats formaci&oacute; cont&iacute;nua 1r P</td>
		<td align="left">Enquesta sobre els programes de formaci&oacute; cont&iacute;nua</td>
		<td align="left" sdnum="3082;0;@">2020-03-03 09:18:44</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="163" sdnum="3082;">163</td>
		<td align="left">19-20 Doctorat - Estudiantat</td>
		<td align="left">Enquesta de doctorat - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2020-03-03 09:14:47</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="162" sdnum="3082;">162</td>
		<td align="left">19-20 Doctorat - Director</td>
		<td align="left">Enquesta de doctorat - Directors</td>
		<td align="left" sdnum="3082;0;@">2020-03-03 08:55:33</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="170" sdnum="3082;">170</td>
		<td align="left">18-19 Titulats formaci&oacute; cont&iacute;nua 3r P</td>
		<td align="left">Enquesta de formaci&oacute; cont&iacute;nua</td>
		<td align="left" sdnum="3082;0;@">2020-02-12 08:31:31</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="108" sdnum="3082;">108</td>
		<td align="left">18-19 Doctorat &ndash; Estudiantat doctor</td>
		<td align="left">Enquesta de doctorat - Estudiantat doctor</td>
		<td align="left" sdnum="3082;0;@">2020-02-03 14:22:22</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="110" sdnum="3082;">110</td>
		<td align="left">18-19 Titulats de M&agrave;ster AQU</td>
		<td align="left">Enquesta de final de programa - M&agrave;ster AQU</td>
		<td align="left" sdnum="3082;0;@">2020-02-03 14:20:13</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="106" sdnum="3082;">106</td>
		<td align="left">18-19 Titulats Doble Grau AQU</td>
		<td align="left">Enquesta de final de programa - Grau</td>
		<td align="left" sdnum="3082;0;@">2020-02-03 14:16:32</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="105" sdnum="3082;">105</td>
		<td align="left">18-19 Titulats Grau AQU</td>
		<td align="left">Enquesta de final de programa - Grau</td>
		<td align="left" sdnum="3082;0;@">2020-02-03 14:06:27</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="116" sdnum="3082;">116</td>
		<td align="left">18-19 Titulats formaci&oacute; cont&iacute;nua 2n P</td>
		<td align="left">Enquesta de formaci&oacute; cont&iacute;nua</td>
		<td align="left" sdnum="3082;0;@">2020-01-28 13:56:40</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="111" sdnum="3082;">111</td>
		<td align="left">18-19 Titulats formaci&oacute; cont&iacute;nua 1r P</td>
		<td align="left">Enquesta de formaci&oacute; cont&iacute;nua</td>
		<td align="left" sdnum="3082;0;@">2020-01-28 13:55:27</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="171" sdnum="3082;">171</td>
		<td align="left">PROVA</td>
		<td align="left">Enquesta de doctorat - Directors</td>
		<td align="left" sdnum="3082;0;@">2020-01-27 13:41:01</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="135" sdnum="3082;">135</td>
		<td align="left">18-19 Pr&agrave;ctiques externes INEFC &ndash; Tutor acad&egrave;mic</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Tutor acad&egrave;mic</td>
		<td align="left" sdnum="3082;0;@">2019-12-18 14:24:15</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="134" sdnum="3082;">134</td>
		<td align="left">18-19 Pr&agrave;ctiques externes INEFC &ndash; Tutor empresa</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Tutor empresa 1 a 5</td>
		<td align="left" sdnum="3082;0;@">2019-12-18 14:23:36</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="133" sdnum="3082;">133</td>
		<td align="left">18-19 Pr&agrave;ctiques externes INEFC &ndash; Alumnat</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-12-18 14:21:49</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="137" sdnum="3082;">137</td>
		<td align="left">18-19 Pr&agrave;ctiques externes - tutor acad&egrave;mic (UXXI)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Tutor acad&egrave;mic</td>
		<td align="left" sdnum="3082;0;@">2019-11-06 14:05:10</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="132" sdnum="3082;">132</td>
		<td align="left">18-19 Pr&agrave;ctiques externes - estudiantat (GEM - 3P)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-11-06 11:03:57</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="101" sdnum="3082;"><a href="ficha_101.php">101</a></td>
		<td align="left"><a href="ficha_101.php">18-19 Assignatura-professor m&agrave;sters P 1r S</a></td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-10-18 12:45:32</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="112" sdnum="3082;">112</td>
		<td align="left">18-19 Assignatura-professor m&agrave;sters P 2n S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-09-25 10:46:34</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="124" sdnum="3082;">124</td>
		<td align="left">18-19 Pr&agrave;ctiques externes estud. (UXXI) ROT-FDL</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-08-28 11:06:48</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="122" sdnum="3082;">122</td>
		<td align="left">18-19 Pr&agrave;ctiques externes estudiantat (UXXI)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-08-28 11:04:42</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="120" sdnum="3082;">120</td>
		<td align="left">18-19 Pr&agrave;ctiques externes - estudiantat (GEM - 2P)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-08-28 11:01:59</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="123" sdnum="3082;">123</td>
		<td align="left">18-19 Assignatura-professor m&agrave;ster M001</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-08-28 10:54:01</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="113" sdnum="3082;">113</td>
		<td align="left">18-19 Assignatura-professor m&agrave;sters NP 2n S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-08-01 09:19:44</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="119" sdnum="3082;">119</td>
		<td align="left">18-19 Diploma Estudis Hisp&agrave;nics</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2019-07-25 09:13:53</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="114" sdnum="3082;">114</td>
		<td align="left">18-19 S&egrave;nior 2n S</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2019-07-25 09:10:57</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="118" sdnum="3082;">118</td>
		<td align="left">18-19 S&egrave;nior 1r S</td>
		<td align="left">Enquesta Assignatura-professor Formaci&oacute; Continua</td>
		<td align="left" sdnum="3082;0;@">2019-07-18 14:20:35</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="117" sdnum="3082;">117</td>
		<td align="left">18-19 Coordinadors del centre</td>
		<td align="left">Enquesta sobre la titulaci&oacute; - Coordinadors/es</td>
		<td align="left" sdnum="3082;0;@">2019-07-10 10:10:38</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="103" sdnum="3082;">103</td>
		<td align="left">18-19 Assignatura-professor INEFC 1r S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-04-10 14:53:01</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="102" sdnum="3082;">102</td>
		<td align="left">18-19 Assignatura-professor m&agrave;sters NP 1r S</td>
		<td align="left">Enquesta assignatura-professor grau i m&agrave;ster univ.</td>
		<td align="left" sdnum="3082;0;@">2019-04-10 13:49:19</td>
	</tr>
	<tr>
		<td height="17" align="right" sdval="109" sdnum="3082;">109</td>
		<td align="left">18-19 Pr&agrave;ctiques externes - estudiantat (GEM - 1P)</td>
		<td align="left">Enquesta de Pr&agrave;cticum - Estudiantat</td>
		<td align="left" sdnum="3082;0;@">2019-03-07 12:26:10</td>
	</tr>
	</tbody>
	</table>
	</td></tr>
	</table>
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
  	<td colspan="2">
		<?php include 'pie.htm'; ?>	</td>
  </tr>
</table>
</body>
</html>
