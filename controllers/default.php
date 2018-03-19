<?php
/**
 * Created by PhpStorm.
 * User: drew-brenet.oispuu
 * Date: 5.02.2018
 * Time: 9:37
 */
$page_id = (int)$http->get('page_id');
$sql = 'SELECT * FROM content '.
    'WHERE content_id='.fixDb($page_id);

$result = $db->getData($sql);

if($result === false){

    $sql = 'SELECT * FROM content WHERE '.
        'is_first_page='.fixDb(1);
    $result = $db->getData($sql);
}
if($result != false){

    $page = $result[0];
    $http->set('page_id', $page['content_id']);
    $mainTmpl->set('content', $page['content']);
}