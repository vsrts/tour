<?php
    /* Вариант использования без composer*/
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/rss/Api.php';

	$api = Intrum\Api::getInstance()
	->setup(
		array(
			"host"   => "alternativa.intrumnet.com",
			"apikey" => "7853a80ac5d1f788f5190565290fb57d",
			"cache"  => false,
			"port"   => 81
		)
	);
?>