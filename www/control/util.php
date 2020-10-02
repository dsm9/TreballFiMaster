<?php

function array_value($key, $search) {
    if (array_key_exists($key, $search)) 
        return $search[$key];
    else 
        return '';
}

function format_date($fecha){
	if ($fecha != "") {
		$date = new DateTime($fecha); 
		return $date->format('d/m/Y');
	} else {
		return "";
	}
	
	/*
	//$date2 = date_create_from_format("d/m/y", $fecha);
	 
	 if ($fecha != "") {
		$dia = substr($fecha, 0, 2);
		$mes = substr($fecha, 3, 2);
		$ano = substr($fecha, 6, 4);
		if ($ano < 100) {
			$ano = $ano + 2000;
		}
		$nueva_fecha = $dia . "-" . $mes . "-" . $ano;
	} else {
		$nueva_fecha = "";
	}
	return $nueva_fecha;
	*/
}

function format_date_short($fecha){
	if ($fecha != "") {
		$date = new DateTime($fecha);
		return $date->format('d/m/y');
	} else {
		return "";
	}
			
	/*
	if ($fecha != "") {
		$dia = substr($fecha, 0, 2);
		$mes = substr($fecha, 3, 2);
		$ano = substr($fecha, 6, 4);
		if ($ano < 100) {
			$ano = $ano + 2000;
		}
		$nueva_fecha = $dia . "-" . $mes . "-" . $ano;
	} else {
		$nueva_fecha = "";
	}
	return $nueva_fecha;
	*/
}

/*
 * Obtiene una fecha de una cadena de texto con el format 'dd/mm/yy' 
 */
function format_date_sql($fecha){
	if ($fecha != "") {
		$nueva_fecha = parse_date($fecha);
		} else {
			$nueva_fecha = "";
		}		
	return $nueva_fecha;
	
// 	$date = new DateTime($fecha);
	//return $date->format('Y-m-d');
}

function parse_date($cadena_fecha) {
	if ($cadena_fecha != "") {
		if (strpos($cadena_fecha, "/") > 0) {
			$separ = "/";
		} elseif (strpos($cadena_fecha, "-") > 0) {
			$separ = "-";
		} else{
			$separ = "";
		}
		$comp_fecha = explode($separ, $cadena_fecha);
		$dia = $comp_fecha[0];
		$mes = $comp_fecha[1];
		$ano = $comp_fecha[2];
		
		//echo "<br/>" . $cadena_fecha . "-> Separador: " . $separ . ", dia: " . $dia . ", mes: " . $mes . ", año: " . $ano . "<br/>"; 
		//$dia = substr($cadena_fecha, 0, 2);
		//$mes = substr($cadena_fecha, 3, 2);
		//$ano = substr($cadena_fecha, 6, 4);
		if ($ano < 100) {
			$ano = $ano + 2000;
		}
		//$fecha = new DateTime($ano . "-" . $mes . "-" . $dia);
		$fecha = $ano . "-" . $mes . "-" . $dia;
	} else {
		$fecha = "";
	}
	//return $fecha->format("Y-m-d");
	return $fecha;
}

/*
 * Comprueba si una cadena contiene texto y tiene formato de fecha
 */
function check_date($cadena_fecha) {
	$check = true;
	if ($cadena_fecha != "") {
		if (strpos($cadena_fecha, "/") > 0) {
			$separ = "/";
		} elseif (strpos($cadena_fecha, "-") > 0) {
			$separ = "-";
		} else{
			$separ = "";
			$check = false;
		}
		if ($check == true) {
			$comp_fecha = explode($separ, $cadena_fecha);
			$dia = $comp_fecha[0];
			$mes = $comp_fecha[1];
			$ano = $comp_fecha[2];
			$check = checkdate($mes, $dia, $ano);
		}
	}
	return $check;
}

function format_num_doc($anyo, $numero){
	
	$num_orden = substr($anyo,2) . "/" . str_pad($numero,5,"0", STR_PAD_LEFT);
	
	return $num_orden;
}

function opcionesSelect($lista, $campoCodigo, $campoNombre, $valor, $obligatorio) {

	if ($obligatorio == false)
		echo "<option value='0'></option>";
	while ($row = obtenerRegistro($lista)) {
		echo "<option value='".$row[$campoCodigo]."'";
		if ($row[$campoCodigo] == $valor) {
			echo " selected='selected'";
		}
		echo ">".$row[$campoNombre]."</option>";
	}
}

function validarSession() {
	if ( ! session_id() ) @ session_start();
	
	if ($_SESSION["usuario"] == "") {
		header("Location: login.php" , true, 303);
	} 
}

?>