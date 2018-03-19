<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 19.01.2018
 * Time: 11:12
 */


require_once 'conf.php';

$mainTmpl = new template('main');

require_once 'control.php';

$mainTmpl->set('lang', 'et');
$mainTmpl->set('page_title', 'Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Pealkiri');
$mainTmpl->set('lang_bar', 'Keeleriba');

require_once 'menu.php';
echo $mainTmpl->parse();