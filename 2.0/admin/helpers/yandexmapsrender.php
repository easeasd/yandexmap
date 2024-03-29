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
class YandexMapsRender
{
	function quickIconButton( $component, $link, $image, $text ) {
		
		$lang	= &JFactory::getLanguage();
		$button = '';
		if ($lang->isRTL()) {
			$button .= '<div style="float:right;">';
		} else {
			$button .= '<div style="float:left;">';
		}
		$button .=	'<div class="icon">'
				   .'<a href="'.$link.'">'
				   .JHTML::_('image.site',  $image, '/components/'.$component.'/assets/images/', NULL, NULL, $text )
				   .'<span>'.$text.'</span></a>'
				   .'</div>';
		$button .= '</div>';

		return $button;
	}
	
	function renderFormInput($name, $title, $tooltip, $value, $size = 50, $maxlength = 250, $attribute = '', $style = '') {
		
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
		
		if ($tooltip != '') {
			$tooltipOutput = JHTML::tooltip(JText::_($tooltip), JText::_($title), '', JText::_($title));
		}else{
			$tooltipOutput = JText::_($title);
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.$tooltipOutput.':</label>'
				 .'</td><td>'
				 .'<input class="text_area" type="text" name="'.$name.'" id="'.$name.'" size="'.$size.'" maxlength="'.$maxlength.'" value="'.$value.'" '.$attribute.' '.$styleOutput.' />'
				.'</td></tr>';
		return $output;
	}
	
	function renderFormTextArea($name, $title, $value, $cols = 60, $rows = 5, $style = '') {
		
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.JText::_($title).':</label>'
				 .'</td><td>'
				 .'<textarea class="text_area" cols="'.$cols.'" rows="'.$rows.'" name="'.$name.'" id="'.$name.'" '.$styleOutput.'>'.$value.'</textarea>'
				.'</td></tr>';
		return $output;
	}

	
	function renderFormItemSpecial($name, $title, $tooltip, $special, $style = '') {
	
	$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}

		if ($tooltip != '') {
			$tooltipOutput = JHTML::tooltip(JText::_($tooltip), JText::_($title), '', JText::_($title));
		}else{
		$tooltipOutput = JText::_($title);
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.$tooltipOutput.':</label>'
				 .'</td><td>'
				 . $special
				 .'</td></tr>';
		return $output;
	}
	
	function renderFormItemImageButton($name, $title, $value, $size = 50, $maxlength = 250, $button, $attribute = '', $style = '') {
	
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
			
		$output = '<tr><td></td><td align="left" valign="middle">'
				 .'<div class="button2-left" style="display:inline">'
				 .'<div class="'.$button->name.'">'
				 .'<a class="'.$button->modalname.'" title="'.$button->text.'" href="'.$button->link.'" rel="'.$button->options.'">'.$button->text.'</a>'
				 .'</div>'
				 .'</div>'
				 .'</td></tr>'
				 .'<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.JText::_($title).':</label>'
				 .'</td><td>'
				 .'<input class="text_area" type="text" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$size.'" maxlength="'.$maxlength.'" '.$attribute.' '.$styleOutput.' />'
				 .'</td></tr>';
		return $output;
	}
	
	
	function renderFormStyle() {
	
		$output = '<style type="text/css">'
				.'table.paramlist td.paramlist_key {'
				.'width: 92px;'
				.'text-align: left;'
				.'height: 30px;'
				.'}'
				.'</style>';
		return $output;
	}
	
	function renderSubmitButtonJs($itemArray) {
	
		$output = "\n" .'<script language="javascript" type="text/javascript">' . "\n";
		$output .= 'function submitbutton(pressbutton) {' ."\n"
				.'	var form = document.adminForm;' ."\n"
				.'	if (pressbutton == \'cancel\') {' ."\n"
				.'		submitform( pressbutton );' ."\n"
				.'		return;' ."\n"
				.'	}' . "\n\n";
		
		if (is_array($itemArray)) {
		
			foreach ($itemArray as $key => $value) {
			
				if ($value[3] == 0) {
					$equal = '0';
				} else {
					$equal = '""';
				}
				
				if ($key == 0) {
					$output .= 'if (form.'.$value[0].'.value == '.$equal.'){' . "\n"
							.'    alert( "'.JText::_($value[1], $value[2] ).'" )' . "\n"
							.' }';
				
				}
				if ($key > 0) {
					$output .= ' else if (form.'.$value[0].'.value == '.$equal.'){' . "\n"
							.'    alert( "'.JText::_($value[1], $value[2] ).'" )' . "\n"
							.' }';
				
				}
			}
		}
		
		$output .= ' else {' . "\n"
				.'    submitform( pressbutton );'."\n"
				.' }'. "\n"
				.'}'. "\n";
		$output .= '</script>';
		
		return $output;
	}
	
	function renderFormInputRadioButton($name, $title, $value, $option, $design = 0, $style = '') {
		
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.JText::_($title).':</label>'
				 .'</td><td>';
				 
		foreach ($option as $keyO => $valueO) {
			$checked = '';
			if ($value == $keyO) {
				$checked = 'checked="checked"';
			}
			
			$output .= '<input class="text_area" type="radio" name="'.$name.'" id="'.$name.$keyO.'" value="'.$keyO.'" '.$styleOutput.' '.$checked.' />';
			// DESIGN SETTINGS - - - - - 
			if ($design == 1) {
				$output .= ' <span>'.JText::_($valueO). '</span> ';
				if ($valueO == 'greywb') { $valueO = 'grey';}
				if ($valueO == 'none') {
					$output .= '<br />';
				} else {
					$output .= JHTML::_('image', 'components/com_yandexmaps/assets/images/box-'.$valueO.'-tl.png', '') . '<br />';
				}
			}
			
			if ($design == 2) {
				//$output .= ' <span>'.JText::_($valueO). '</span> ';
				if ($valueO == 'default') {
					$output .= '<br />';
				} else {
					$output .= JHTML::_('image', 'administrator/components/com_yandexmaps/assets/images/deficon/'.$valueO.'.png', '') . '<br /><br />';
				}
			}
			// - - - - - - - - - - - - - - - - - - 
		}
		$output .= '</td></tr>';
		return $output;
	}
	
		function renderFormInputRadioButtonIconDef($name, $title, $tooltip, $value, $option, $design = 0, $style = '') {
		
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
		
		if ($tooltip != '') {
			$tooltipOutput = JHTML::tooltip(JText::_($tooltip), JText::_($title), '', JText::_($title));
		}else{
			$tooltipOutput = JText::_($title);
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.$tooltipOutput.':</label>'
				 .'</td><td>';
				 
		foreach ($option as $keyO => $valueO) {
			$checked = '';
			if ($value == $valueO) {
				$checked = 'checked="checked"';
			}
			
			
	$output .= '<input class="text_area" type="radio" name="'.$name.'" id="'.$name.$keyO.'" value="'.$valueO.'" '.$styleOutput.' '.$checked.' />';
		
			
			//$output .= ' <span>'.JText::_($valueO). '</span> ';
				if ($valueO == 'default') {
					$output .= '<br />';
				} else {
					$output .= JHTML::_('image', 'administrator/components/com_yandexmaps/assets/images/deficon/'.$valueO.'.png','','style="width:19px; height:20px; margin-bottom: 3px;"' ) . '';
				}
			
		// - - - - - - - - - - - - - - - - - - 
		}
		$output .= '</td></tr>';
		
		      
	   return $output;
	  
		
	}
	
	function renderFormSelectBox($name, $title, $tooltip, $value, $option, $style = '') {
		
		$styleOutput = '';
		if ($style != '') {
			$styleOutput = 'style="'.$style.'"';
		}
		
		if ($tooltip != '') {
			$tooltipOutput = JHTML::tooltip(JText::_($tooltip), JText::_($title), '', JText::_($title));
		}else{
			$tooltipOutput = JText::_($title);
		}
		
		$output = '<tr>'
				 .'<td width="100" align="right" class="key">'
				 .'<label for="'.$name.'">'.$tooltipOutput.':</label>'
				 .'</td><td>';
		
		$output .= '<select class="text_area" name="'.$name.'" id="'.$name.'" '.$styleOutput.' />';		
		foreach ($option as $keyO => $valueO) {
			$selected = '';
			if ($value == $keyO) {
				$selected = 'selected="selected"';
			}
			
			$output .= '<option value="'.$keyO.'" '.$selected.' />'.JText::_($valueO).'</option>';
		}
		$output .= '</select>';
		$output .= '</td></tr>';
		return $output;
	}

}