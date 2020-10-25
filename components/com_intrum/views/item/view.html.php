<?php
defined('_JEXEC') or die('Restricted access');

class IntrumViewItem extends JViewLegacy{
    public function display($tpl = null){
        $this->content = $this->get('Item');
        parent::display($tpl);
    }
}