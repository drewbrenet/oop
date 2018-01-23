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
echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';

$menuItemTmpl->set('menu_item_name', 'teine');
echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';

$menuItem = $menuItemTmpl->parse();
$menuTmpl->set('menu_item', $menuItem);
echo '<pre>';
print_r($menuTmpl);
echo '</pre>';

$menu