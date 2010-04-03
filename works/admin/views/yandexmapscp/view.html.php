<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Yandex Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );

class YandexMapsCpViewYandexMapsCp extends JView
{
	function display($tpl = null) {
		
		$component 		= 'yandexmaps';
		$componentName	= 'Yandex Maps';
		
		JHTML::stylesheet( $component.'.css', 'administrator/components/com_'.$component.'/assets/' );
		
		global $mainframe;
		$uri		=& JFactory::getURI();
		$document	=& JFactory::getDocument();
		$db		    =& JFactory::getDBO();
		
		JToolBarHelper::title(   '&nbsp;&nbsp;' .JText::_( $componentName .' Control Panel' ), 'yandex' );
		
		JToolBarHelper::preferences('com_'.$component, '460');
		JToolBarHelper::help( 'screen.'.$component, true );

		JHTML::_('behavior.tooltip');
		$version = YandexMapsHelper::getYandexVersion('com_'.$component);
		$this->assignRef('version',	$version);
		
		parent::display($tpl);
		
	}
}
?>