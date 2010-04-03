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
defined('JPATH_BASE') or die();

class JElementYandexTextarea extends JElement
{
	var	$_name 			= 'YandexTextarea';
	var $_yandexParams 	= null;

	function fetchElement($name, $value, &$node, $control_name)
	{
		$document	= &JFactory::getDocument();
		$option 	= JRequest::getCmd('option');
		
		$globalValue = &$this->_getYandexParameter( $name );	

		$rows = $node->attributes('rows');
		$cols = $node->attributes('cols');
		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );
		
		// MENU - Set default value to "" because of saving "" value into the menu link ( use global = "")
		if ($option == "com_menus") {
			$defaultValue	= $node->attributes('default');
			if ($value == $defaultValue) {
				$value = '';
			}
		}
		
		// convert <br /> tags so they are not visible when editing
		$value = str_replace('<br />', "\n", $value);
		
		$html ='<textarea name="'.$control_name.'['.$name.']" cols="'.$cols.'" rows="'.$rows.'" '.$class.' id="'.$control_name.$name.'" >'.$value.'</textarea>';

		// MENU - Display the global value
		if ($option == "com_menus") {
			$html .='<br /><span>[ </span><input type="text"  value="'. $globalValue .'" style="width:15em;border:1px solid #fff;background:#fff;margin-top:3px;" /><span> ]</span>'; 
		}
		return $html;
	}
	
	
	function _setYandexParams(){
	
		$component 		= 'com_yandexmaps';
		$table 			=& JTable::getInstance('component');
		$table->loadByOption( $component );
		$yandexParams 		= new JParameter( $table->params );
		$this->_yandexParams	= $yandexParams;
	}

	function _getYandexParameter( $name ){
	
		// Don't call sql query by every param item (it will be loaded only one time)
		if (!$this->_yandexParams) {
			$params = &$this->_setYandexParams();
		}
		$globalValue 	= &$this->_yandexParams->get( $name, '' );	
		return $globalValue;
	}
}
?>