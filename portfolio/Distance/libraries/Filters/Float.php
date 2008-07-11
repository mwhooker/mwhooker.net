<?php

require_once 'Zend/Filter/Interface.php';



class Distance_Filter_Float implements Zend_Filter_Interface
{
	public function filter($value)
    {
    	return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, 
    	FILTER_FLAG_ALLOW_FRACTION);
	    //return preg_replace('/[^\d|^\.|]/', '', (string) $value);
    }
}
