<?php

class ModToursHelper{


    public static function getTours(){
        $api = VsApiIntrum::getInstance()
            ->setup(
                array(
                    "host"   => "alternativa.intrumnet.com",
                    "apikey" => "7853a80ac5d1f788f5190565290fb57d",
                    "cache"  => false,
                    "port"   => 81
                )
            );
        $type = 7;
        $total = null;
        $limit = 10;
        $catId = 146;
        $items = $api->getStockByFilter(array(
            'type' => $type,
            'category' => $catId,
            'nested' => true,
            'count_total' => 1,
            'limit' => $limit,
        ));
        if($total === null){
            $total = $items['data']['count'];
        }
        $fields = $api->getStockFields();
        $list = $items['data'];
        $list['limit'] = $limit;
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
        return $list;
    }
}