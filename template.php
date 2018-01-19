<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.01.2018
 * Time: 10:21
 */

class template
{
    var $file = '';
    var $content = false;
    var $vars = array();

    function readFile($file){
        $this->content = file_get_contents($file);
    }
}