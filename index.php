<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.01.2018
 * Time: 11:12
 */


require_once 'conf.php';

$mainTmpl = new template('main');

$mainTmpl->set('lang', 'et');
$mainTmpl->set('page_title', 'Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Pealkiri');
$mainTmpl->set('lang_bar', 'Keeleriba');
$mainTmpl->set('menu', 'Lehe menüü');
$mainTmpl->set('content', 'Lehe sisu');
// lisame objekti testvaade
echo '<pre>';
print_r($mainTmpl);
echo '</pre>';
echo $mainTmpl->parse();