<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 23.01.2018
 * Time: 11:08
 */
$menu = new template('menu.menu');

$menuItem = new template('menu.menu_item');

$sql = 'SELECT content_id, content, title '.
    'FROM content WHERE parent_id='.fixDb(0).
    ' AND show_in_menu='.fixDb(1);

$result = $db->getData($sql);

if($result != false){
    foreach ($result as $page){
        $menuItem->set('menu_item_name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $menuItem->set('link', $link);
        $menu->add('menu_items', $menuItem->parse());
    }
}

if(USER_ID == ROLE_NONE){
    $menuItem->set('menu_item_name', 'Logi sisse');
    $link = $http->getLink(array('control'=>'login'));
    $menuItem->set('link', $link);
    $menu->add('menu_items', $menuItem->parse());
}
$mainTmpl->add('menu', $menu->parse());