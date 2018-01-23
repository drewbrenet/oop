<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.01.2018
 * Time: 11:12
 */

require_once 'conf.php';

$testTabel = new template('views/test.html');

$testTabel->set('esimene', '1');
$testTabel->set('teine', '2');


echo '<pre>';
print_r($testTabel);
echo '</pre>';