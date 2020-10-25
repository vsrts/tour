<?php

defined('_JEXEC') or die('Restricted access');


class IntrumModelIntrum extends JModelList{

    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();
        // Получаем Id сообщения из Запроса.
        $catId = $app->input->getInt('catId', 0);
        $this->setState('intrum.catId', $catId);
        $page = $app->input->getInt('page', 1);
        $this->setState('intrum.page', $page);
        parent::populateState();
    }

    private $api;
    private function connectIntrum()
    {
        $this->api = VsApiIntrum::getInstance()
            ->setup(
                array(
                    "host"   => "alternativa.intrumnet.com",
                    "apikey" => "7853a80ac5d1f788f5190565290fb57d",
                    "cache"  => false,
                    "port"   => 81
                )
            );
    }

    public function getItems(){
        $type = 7;
        $total = null;
        $limit = 20;
        $catId = (!empty($catId)) ? $catId : (int) $this->getState('intrum.catId');
        $page = (!empty($page)) ? $page : (int) $this->getState('intrum.page');
        $this->connectIntrum();
        $items = $this->api->getStockByFilter(array(
            'type' => $type,
            'category' => $catId,
            'nested' => true,
            'count_total' => 1,
            'limit' => $limit,
            'page' => $page,
        ));
        if($total === null){
            $total = $items['data']['count'];
        }
        $fields = $this->api->getStockFields();
        $list = $items['data'];
        $list['limit'] = $limit;
        $list['current_page'] = $page;
        foreach ($list['list'] as $key => $item) {
            $item['field'] = array();
            foreach ($item['fields'] as $fieldKey => $field) {
                if ($field['type'] == 'file') {
                    $field['value'] = $this->api->getStockUrlPhoto($field['value']);
                }
                $field['name'] = $fields['data'][$type]['fields'][$field['id']]['name'];
                $list['list'][$key]['field'][$field['id']] = ['name' => $field['name'], 'value' => $field['value']];
            }
            unset($list[$key]['fields']);
        }
        return $list;
    }

}