<?php
/**
 * Created by PhpStorm.
 * User:JAshMe
 * Date: 3/17/2018
 * Time: 2:05 PM
 */

function checkValidity($lec, $tut, $prac, $lib_work, $research, $comp, $hours)
{

	if(filter_var($lec, FILTER_VALIDATE_INT) === false)
	    return false;
	if(filter_var($tut, FILTER_VALIDATE_INT) === false)
	    return false;
	if(filter_var($prac, FILTER_VALIDATE_INT) === false)
	    return false;
	if(filter_var($lib_work, FILTER_VALIDATE_INT) === false)
	    return false;
	if(filter_var($research, FILTER_VALIDATE_INT) === false)
	    return false;
	if(filter_var($comp, FILTER_VALIDATE_INT) === false)
	    return false;

	$total_hour = $lec + $tut + $prac + $lib_work + $research + $comp;
	if($total_hour == 0 || $total_hour != $hours || $total_hour > 480)
	    return false;

	return true;
}