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
	
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" valign="top" bgcolor="#F0F0F0">&nbsp;
		<?php include 'cabecera_login.php'; ?>	
    </td>
  </tr>
  <tr>

    <td valign="top" class="PaginaCentral" >
     
  <!--	Inicio parte particular 	-->
              
      <form id="datos" name="datos" method="post" action="lista.php"><br />
 	<br />
	<br />
	<br />
	<br/>
    <br/>
	<table align="center" border="0" cellpadding="10" cellspacing="0" bgcolor="#831453" style="border:solid thin black;">
		<tr><td colspan="4"><img src="img/espacio.gif" width="10" height="10" /></td>
		</tr>
    	<tr >
	  <td>&nbsp;</td>
    	<td class="TextoLogin" >Usuari:</td>
 		<td><input type="text" id="usuario" name="usuario" /></td>
    	</tr>
    	<tr>
    		  <td>&nbsp;</td>
    	<td class="TextoLogin" >Contrasenya:</td>
 		<td><input type="password" id="password" name="password" /></td>
 	  <td>&nbsp;</td>
    	</tr>    	
    	<tr>
	    	<td colspan="4" align="center">
	    	<input type="hidden" value="Entrar" id="accion" name="accion" />
	    	<input type="submit" value="Entrar" id="btnEntrar" name="btnEntrar"   /></td>
    	</tr>
    </table>
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
