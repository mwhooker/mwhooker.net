<?php
	error_reporting(E_ALL);
	date_default_timezone_set('America/Los_Angeles');
	
	$path = get_include_path();
	$p = defined('PATH_SEPARATOR') ? PATH_SEPARATOR : '/';
	$d = DIRECTORY_SEPARATOR;
	
	define("DISTANCE_BASE", realpath(dirname(dirname(dirname(__FILE__)))). $d );
	define("DISTANCE_APP", realpath(DISTANCE_BASE."application"). $d);
	define("DISTANCE_LIBS", realpath(DISTANCE_BASE ."libraries"). $d);
	
	
	$path = ('.'.$p.$path.$p.DISTANCE_LIBS.$p.DISTANCE_BASE.$p.DISTANCE_APP);
	set_include_path($path);

	require_once 'Zend/Registry.php';

	//distance.home.phrisco.com
	//ABQIAAAAJdnPI3YsO1mfqh1mizwb4RREKvwsCH6F-Qamwplh_hGrUc5oJxRf9rtec67fl1EJVQuVz7q1natMRg
	//home.phrisco.com
	//ABQIAAAAJdnPI3YsO1mfqh1mizwb4RSdAyXkoEAqhrM9J6phFhejh9rVeBS5ddYWTXiDMI1oOR1L0qE8QnZ_mg
	//http://distance
	//'ABQIAAAAJdnPI3YsO1mfqh1mizwb4RQqh0A3H_2E1nRKK4allb8oDMxdMhQlfEsp0FJD7Qf4lM46L4v7oofI0g'
	$data = array(
		//www.mwhooker.com
		'mapKey' => 'ABQIAAAAJdnPI3YsO1mfqh1mizwb4RSM0UjmVIsx_vVe5O1t-F9NIiRkXRQj1NoEFQ_UXaDLQjnG8nGwe5hxjQ'
	);
	
	require_once 'Zend/Config.php';
	$config = new Zend_Config($data);

	Zend_Registry::set('config', $config);