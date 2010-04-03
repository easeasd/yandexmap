<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Yandex Maps
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );

class YandexMapsCpViewYandexMapsInfo extends JView
{
	function display($tpl = null) {
		global $mainframe;
		$tmpl		= array();
		JHTML::stylesheet( 'yandexmaps.css', 'administrator/components/com_yandexmaps/assets/' );
		JToolBarHelper::title(   JText::_( 'Yandex Maps Info' ), 'info' );
		JToolBarHelper::cancel( 'cancel', 'Close' );
		JToolBarHelper::help( 'screen.yandexmaps', true );
		
		$params = JComponentHelper::getParams('com_yandexmaps');
		
		
		$tmpl['version'] 	= YandexMapsHelper::getYandexVersion();

		$this->assignRef('tmpl',	$tmpl);
		
		parent::display($tpl);
	}
}
?>
