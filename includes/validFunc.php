<?php
/**
 * Created by PhpStorm.
 * User:JAshMe
 * Date: 3/17/2018
 * Time: 2:05 PM
 */

function checkHours($var)
{
        if(filter_var($var,FILTER_VALIDATE_INT)&&$var<24*7)
                return true;
        return false;

}

