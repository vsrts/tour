<?php

defined('_JEXEC') or die('Restricted access');


class IntrumModelItem extends JModelItem{

    protected function populateState()
    {
        $app = JFactory::getApplication();
        $id = $app->input->getInt('id', 0);
        $this->setState('item.id', $id);
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

    public function getItem(){
        $type = 7;
        $id = (!empty($id)) ? $id : (int) $this->getState('item.id');
        $this->connectIntrum();
        $object=$this->api->getStockById($id);
        $fields = $this->api->getStockFields();
        $object['field'] = array();
        foreach ($object['fields'] as $fieldKey => $field) {
            if ($field['type'] == 'file') {
                $field['value'] = $this->api->getStockUrlPhoto($field['value']);
            }
            $field['name'] = $fields['data'][$type]['fields'][$field['id']]['name'];
            $object['field'][$field['id']] = ['name' => $field['name'], 'value' => $field['value']];
        }
            unset($object['fields']);

        return $object;
    }

}