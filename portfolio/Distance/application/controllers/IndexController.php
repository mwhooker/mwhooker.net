<?php
	require_once 'Zend/Controller/Action.php';
	require_once 'Zend/Registry.php';
	require_once 'Zend/Filter.php';
	require_once 'libraries/Filters/Float.php';
	require_once 'Zend/Log.php';
	require_once 'Zend/Log/Writer/Stream.php';
	require_once 'application/models/Distance.php';
	require_once 'Zend/Measure/Length.php';
	require_once 'Zend/Json/Decoder.php';
	
	
	class IndexController extends Zend_Controller_Action
	{
    	public function indexAction()
    	{
    	}

		public function pointAction()
    	{
    		/*$this->_helper->viewRenderer->setNoRender();
			Zend_Loader::loadClass('Zend_View');
			$view = new Zend_View();
			//$view->setScriptPath('/application/views/scripts/index');
			$view->MapKey = $config->MapKey;

			echo $view->render(' /home/matthew/workspace/Distance/application/views/scripts/index/pointa.phtml');
			*/

			$config = Zend_Registry::get('config');
			$this->view->mapKey = $config->mapKey;
    	}
		
    	public function resultAction()
    	{
    		
    		$coords = Zend_Json::decode($_POST['result']);
    		//print_r($phpNative);
    		/*
    		$input = new Distance_Filter_Float();
    		
    		$llA = split(',', $_GET['llA']);
    		$llB = split(',', $_GET['llB']);
    		
    		$lls = array( 'latA' => $llA[0], 'lonA' => $llA[1],
    						'latB' => $llB[0], 'lonB' => $llB[1]);

    		foreach ($lls as &$value) {
    			$value = $input->filter($value);
    			if ($value == '') {
    				die('bad input');
    			}
    		}
    		*/
    		$dist = new Distance($coords);
    		$unit = new Zend_Measure_Length($dist->asMeters(), Zend_Measure_Length::METER);
    		
    		
    		$this->view->distance = ($unit->convertTo('MILE_STATUTE'));
    		
    		
    	}
	}
