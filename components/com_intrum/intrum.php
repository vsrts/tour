<?php

//запрет прямого доступа
defined('_JEXEC') or die('Restricted access');

// Подключаем логирование.
JLog::addLogger(
    array('text_file' => 'com_intrum.php'),
    JLog::ALL,
    array('com_intrum')
);

//Подключаем библиотеку контроллера Joomla
//jimport('joomla.application.component.controller');

// Получаем экземпляр контроллера с префиксом Intrum.
$controller = JControllerLegacy::getInstance('Intrum');

// Исполняем задачу task из Запроса
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Перенаправляем, если перенаправление установлено в контроллере
$controller->redirect();