<?php
function sanitizeString($var)
	{
		if (get_magic_quotes_gpc()) $var = stripslashes($var);
		$var = htmlentities($var);
		$var = strip_tags($var);
		return $var;
	}
function sanitizeMySQL($var)
	{
	$var = mysql_real_escape_string($var);
	$var = sanitizeString($var);
	return $var;
	}
function validateLength($fieldValue,$minLength){
	return(strlen(trim($fieldValue)) > $minLength);
}
function page_redirect($location)
 {
   echo '<META HTTP-EQUIV="Refresh" Content="2; URL='.$location.'">';
   exit; 
 }

function validateString($var){
	$result = preg_match('/[a-zA-Z_][\w-]*/',$var);
	return $result;
	
}
function validateEmail($var){
	$result = preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $var);
	return $result;

}

function validateNumber($var){
	$result = preg_match('/[0-9]*\.[0-9]*$/', $var);
	return $result;

}
?>
