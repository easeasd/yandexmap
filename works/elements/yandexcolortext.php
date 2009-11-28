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

class JElementYandexColorText extends JElement
{
	var	$_name 			= 'YandexColorText';
	var $_yandexParams 	= null;

	function fetchElement($name, $value, &$node, $control_name)
	{
		$component	= 'com_yandexmaps';
		$document	= &JFactory::getDocument();
		$option 	= JRequest::getCmd('option');
		
		$globalValue = &$this->_getYandexParameter( $name );
		
		// Color Picker
		JHTML::stylesheet( 'picker.css', 'administrator/components/'.$component.'/assets/jcp/' );
		$document->addScript(JURI::base(true).'/components/'.$component.'/assets/jcp/picker.js');
		

		$size = ( $node->attributes('size') ? 'size="'.$node->attributes('size').'"' : '' );
		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );
        /*
         * Required to avoid a cycle of encoding &
         * html_entity_decode was used in place of htmlspecialchars_decode because
         * htmlspecialchars_decode is not compatible with PHP 4
         */
        $value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES), ENT_QUOTES);

		// MENU - Set default value to "" because of saving "" value into the menu link ( use global = "")
		if ($option == "com_menus") {
			$defaultValue	= $node->attributes('default');
			if ($value == $defaultValue) {
				$value = '';
			}
		}
		
		$html ='<input type="text" name="'.$control_name.'['.$name.']" id="'.$control_name.$name.'" value="'.$value.'" '.$class.' '.$size.' />';		
		
		// Color Picker
		$html .= '<span style="margin-left:10px" onclick="openPicker(\''.$control_name.$name.'\')"  class="picker_buttons">' . JText::_('Pick color') . '</span>';
		
		// MENU - Display the global value
		if ($option == "com_menus") {
			$html .= '<span style="margin-left:10px;">[</span><span style="background:#fff"> ' . $globalValue . ' </span><span>]</span>';
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