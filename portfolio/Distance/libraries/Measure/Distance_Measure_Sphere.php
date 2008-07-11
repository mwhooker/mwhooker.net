<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Measure
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @version    $Id: Angle.php 3224 2007-02-05 22:08:48Z gavin $
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * Implement needed classes
 */
require_once 'Zend/Measure/Exception.php';
require_once 'Zend/Measure/Abstract.php';
require_once 'Zend/Locale.php';


/**
 * @category   Zend
 * @package    Zend_Measure
 * @subpackage Zend_Measure_Angle
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Measure_Angle extends Zend_Measure_Abstract
{
    // Angle definitions
    const STANDARD = 'RADIAN';

    const RADIAN      = 'RADIAN';
    const MIL         = 'MIL';
    const GRAD        = 'GRAD';
    const DEGREE      = 'DEGREE';
    const MINUTE      = 'MINUTE';
    const SECOND      = 'SECOND';
    const FULL_CIRCLE = 'FULL_CIRCLE';
   
    protected $_UNITS = array(
        'RADIAN'      => array(1,'rad'),
        'MIL'         => array(array('' => M_PI,'/' => 3200),   'mil'),
        'GRAD'        => array(array('' => M_PI,'/' => 200),    'gr'),
        'DEGREE'      => array(array('' => M_PI,'/' => 180),    '°'),
        'MINUTE'      => array(array('' => M_PI,'/' => 10800),  "'"),
        'SECOND'      => array(array('' => M_PI,'/' => 648000), '"'),
        'FULL_CIRCLE' => array(array('' => M_PI,'*' => 2),      'cir'),
        
    );
}
