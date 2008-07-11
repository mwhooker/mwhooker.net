<?php



//set_include_path();

require_once '../application/config/config.php';

require_once 'Zend/Controller/Front.php';
//Zend_Controller_Action_HelperBroker::addHelper(new Zend_Controller_Action_Helper_ViewRenderer());
Zend_Controller_Front::run('../application/controllers/');