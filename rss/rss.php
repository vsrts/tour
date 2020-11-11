<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/rss/feed.php';
$feed = new Feed('Лента туров', 'http://www.3334333.ru', 'Новые туры');



//описание и документация по API INTRUM http://www.intrumnet.com/api/

require_once $_SERVER['DOCUMENT_ROOT'] . '/rss/usage.php'; //настройте данный конфигурационный файл


$type = 7;
$limit = 20;
$catId = 146;
$items = $api->getStockByFilter(array(
    'type' => $type,
    'category' => $catId,
    'nested' => true,
    'limit' => $limit,
));

$fields = $api->getStockFields();
$list = $items['data'];
foreach ($list['list'] as $key => $item) {
    $item['field'] = array();
    foreach ($item['fields'] as $fieldKey => $field) {
        if ($field['type'] == 'file') {
            $field['value'] = $api->getStockUrlPhoto($field['value']);
        }
        $field['name'] = $fields['data'][$type]['fields'][$field['id']]['name'];
        $list['list'][$key]['field'][$field['id']] = ['name' => $field['name'], 'value' => $field['value']];
    }
    unset($list[$key]['fields']);
}

foreach($list['list'] as $item){
    if(!$item['field'][622]['value']){
        continue;
    }
    $tourName = $item['name'];
    $tourlink = 'http://3334333.ru/tury.html?view=item&id=' . $item['id'];
    $tourlinkFormatted = htmlspecialchars($tourlink);
    $tourPhoto = '<img src="' . $item['field'][89]['value'] . '" /> ';
    $tourDesc = $tourPhoto . htmlspecialchars($item['field'][83]['value']);

    $feed->addItem($tourName, $tourlinkFormatted, $tourDesc, '', new DateTime());
}

echo $feed->saveXML();


?>