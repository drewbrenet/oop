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

    public function __construct($file)
    {
        $this->file = $file;
        $this->loadFile();
    }

    function loadFile(){
        if(!is_dir(VIEW_DIR)){
            echo 'Ei ole leitud '.VIEW_DIR.' kataloogi<br />';
            exit;
        }

        $file = $this->file; // abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        $file = VIEW_DIR.$this->file; // abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        $file = VIEW_DIR.$this->file.'.html'; // abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        $file = VIEW_DIR.str_replace('.', '/', $this->file).'.html'; // abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        if($this->content === false){
            echo 'Ei suutnud lugeda '.$this->file.' sisu <br />';
            exit;
        }
    }

    function readFile($file){

        $this->content = file_get_contents($file);
    }

    function set($name, $value){
        $this->vars[$name] = $value;
    }

    function parse(){
        $str = $this->content; // malli sisu algväärtus
        foreach ($this->vars as $name=>$value){
            $str = str_replace('{'.$name.'}', $value, $str);
        }
        return $str;
    }
}