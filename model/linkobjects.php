<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 23.01.2018
 * Time: 13:19
 */
class linkobject extends http
{
    var $baseLink = false; // põhilink
    var $protocol = 'http://';
    var $eq = '=';
    var $delim = '&amp;';
    /**
     * linkobject constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
        echo $this->baseLink;
    }
}