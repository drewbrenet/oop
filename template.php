<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.01.2018
 * Time: 10:21
 */
class template
{
    // klassi muutujad
    var $file = ''; // HTML malli faili nimi
    var $content = false; // HTML malli failist loetud sisu
    var $vars = array(); // HTML malli elementide nimetuste ja reaalväärtuste paarid
    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file; // määrame kasutatava malli faili nimi
        $this->loadFile(); // laadime määratud nimega faili sisu
    }
    // HTML malli faili nime ja õiguste kontroll
    // ning sisu lugemine siis, kui vajalikud
    // tingimused on täidetud
    function loadFile(){
        if(!is_dir(VIEW_DIR)){
            echo 'Ei ole leitud '.VIEW_DIR.' kataloogi<br />';
            exit;
        }

        $file = $this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }


        $file = VIEW_DIR.$this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        $file = VIEW_DIR.$this->file.'.html';
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        $file = VIEW_DIR.str_replace('.', '/', $this->file).'.html';
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
    function set($name, $value) {
        $this->vars[$name] = $value;
    }
    function parse(){
        $str = $this->content;
        foreach ($this->varas as $name=>$value) {
            $str= str_replace('('.$name.')', $value, $str);

        }
        return $str;
    }
}