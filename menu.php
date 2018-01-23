<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 23.01.2018
 * Time: 11:08
 */

$menuTmpl = new template('menu.menu');

$menuItemTmpl = new template('menu.menu_item');

$menuItemTmpl->set('menu_item_name', 'esimene');

$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

$menuItemTmpl->set('menu_item_name', 'teine');

$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

$menu = $menuTmpl->parse();

$mainTmpl->set('menu', $menu);