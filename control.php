<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 5.02.2018
 * Time: 9:34
 */

$control = $http->get('control');
$file = CONTROL_DIR.$control.'.php';
if(file_exists($file) and is_file($file) and is_readable($file)){
    require_once $file;
} else {
    $file = CONTROL_DIR.DEFAULT_CONTROL.'.php';
    require_once $file;
}