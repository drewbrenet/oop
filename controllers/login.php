<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.03.2018
 * Time: 13:23
 */
$loginForm = new template('login');

$loginForm->set('kasutaja', 'Kasutajanimi');
$loginForm->set('parool', 'Kasutaja parool');
$loginForm->set('nupp', 'Logi sisse!');

$link = $http->getLink(array('control'=>'login_do'));
$loginForm->set('link', $link);

$mainTmpl->set('content', $loginForm->parse());