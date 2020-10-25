<?php

defined('_JEXEC') or die;

/**
 * Mylib plugin class.
 *
 * @package  VS plugin
 */
class plgSystemVs extends JPlugin
{
	/**
	 * Method to register custom library.
	 *
	 * return  void
	 */
	public function onAfterInitialise()
	{
		JLoader::registerPrefix('Vs', JPATH_LIBRARIES . '/vs');
	}
}
