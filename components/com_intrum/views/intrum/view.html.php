<?php

defined('_JEXEC') or die('Restricted access');

class IntrumViewIntrum extends JViewLegacy{

    protected $content;
    protected $pagintion;

    public function display($tpl = null){
        $this->content = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        parent::display($tpl);
    }
}