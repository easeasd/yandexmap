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

class JElementYandexListWarning extends JElement
{
	var	$_name = 'List';

	function fetchElement($name, $value, &$node, $control_name)
	{
		$class 		= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="inputbox"' );
		$warningText= ( $node->attributes('yandexwarning') ? $node->attributes('yandexwarning') : '' );
		
		$options = array ();
		foreach ($node->children() as $option)
		{
			$val	= $option->attributes('value');
			$text	= $option->data();
			$options[] = JHTML::_('select.option', $val, JText::_($text));
		}

		$icon 		= JHTML::_('image', '/administrator/components/com_yandexmenu/assets/images/icon-16-warning.png', '');
		$warning 	= '<span class="error hasTip" title="'.JText::_( 'Warning' ).'::'.JText::_($warningText).'">'. $icon . '</span>';
		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', $class, 'value', 'text', $value, $control_name.$name). '&nbsp;' .$warning;
	}
}
