<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 5.02.2018
 * Time: 9:28
 */

class linkobject extends http
{
    var $baseLink = false;
    var $protocol = 'http://';
    var $eq = '=';
    var $delim = '&amp;';
    var $aie = array('sid');

    public function __construct()
    {
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }

    function addToLink(&$link, $name, $value){
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
    }

    function getLink($add = array(), $aie = array()){
        $link =  '';
        foreach ($add as $name => $value){

            $this->addToLink($link, $name, $value);
        }
        foreach ($aie as $name){
            $value = $this->get($name);
            if($value != false){
                $this->addToLink($link, $name, $value);
            }
        }
        foreach ($this->aie as $name){
            $value = $this->get($name);
            if($value != false){
                $this->addToLink($link, $name, $value);
            }
        }

        if($link != ''){
            $link = $this->baseLink.'?'.$link;
        } else {

            $link = $this->baseLink;
        }

        return $link;
    }
}
