<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 5.02.2018
 * Time: 9:28
 */

class mysql
{
    // klassi väljad
    var $conn = false;
    var $host = false;
    var $user = false;
    var $pass = false;
    var $dbname = false;

    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect();
    }

    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if($this->conn == false){
            echo 'Probleem andmebaasi ühendamisega<br />';
            exit;
        }
    }

    function query($sql){
        $result = mysqli_query($this->conn, $sql);
        if($result == false){
            echo 'Probleem päringuga<br />';
            echo '<b>'.$sql.'</b>';
            return false;
        }
        return $result;
    }

    function getData($sql){
        $result = $this->query($sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }
}