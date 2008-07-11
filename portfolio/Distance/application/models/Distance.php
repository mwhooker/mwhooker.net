<?php


class Distance
{
	private $radDistance; 
	const CIRC_OF_EARTH = 40075016.65;
	public function __construct($lls)
	{

		$this->radDistance = $this->distanceInRads($lls);
		
	}
	
	private function distanceInRads($lls)
	{
		//thanks to http://blog.phraction.com/2006/09/19/php-distance-calculation/
		$theta = $lls['llA']['x'] - $lls['llB']['x']; 
	    $distance = sin(deg2rad($lls['llA']['y'])) * sin(deg2rad($lls['llB']['y'])) +  
	    cos(deg2rad($lls['llA']['y'])) * cos(deg2rad($lls['llB']['y'])) * cos(deg2rad($theta)); 
	    $distance = acos($distance); 
		return $distance;
	}
	
	public function asMeters()
	{
		return ($this->radDistance/(2* M_PI))*Distance::CIRC_OF_EARTH;
		
	}
	
}
