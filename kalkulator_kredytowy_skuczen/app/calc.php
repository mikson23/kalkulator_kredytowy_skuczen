<?php

require_once dirname(__FILE__).'/../config.php';

//include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$o){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$o = isset($_REQUEST['o']) ? $_REQUEST['o'] : null;	
}


function validate(&$x, &$y, &$o, &$messages){
	if ( ! (isset($x) && isset($y) && isset($o) )) {

	return false;
	}




	if ( $x == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $o == "") {
		$messages [] = 'Nie podano oprocentowania kredytu (RRSO)';
	}
	if ( $y == "") {
		$messages [] = 'Nie podano ilości rat / na ile miesięcy';
	}


	if (empty( $messages )) {
		
		
		if (! is_numeric( $x )) {
			$messages [] = 'Kwota kredytu nie jest prawidłowa';
		}
		
		if (! is_numeric( $y )) {
			$messages [] = 'Ilość miesięcy nie jest prawidłowa';
		}	
		if (! is_numeric( $o )) {
			$messages [] = 'Wartość oprocentowania jest nieprawidłowa';
		}	

	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$o,&$messages,&$result,&$rata){
	if (empty ( $messages )) { 
		
		
		$x = intval($x);
		$y = intval($y);
		$o = floatval($o);
		
		
		$result = $x + $x*($y/12*($o/100));
		$rata = $result/$y;
		$rata = round($rata, 2);
		$result = round($result, 2);
	}
}

$x = null;
$y = null;
$o = null;
$result = null;
$rata = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($x,$y,$o);
if ( validate($x,$y,$o,$messages) ) { // gdy brak błędów
	process($x,$y,$o,$messages,$result,$rata);
}

include 'calc_view.php';