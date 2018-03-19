<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.03.2018
 * Time: 13:24
 */

$username = $http->get('username');
$password = $http->get('password');

$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDb($username).
    ' AND password='.fixDb(md5($password));
$result = $db->getData($sql);

if($result != false){

    echo '<br />';
    $sess->sessionCreate($result[0]);
    $mainTmpl->set('content','Oled sisselogitud<br />');
} else {

    $link = $http->getLink(array('control' => 'login'));
    $http->redirect($link);
}