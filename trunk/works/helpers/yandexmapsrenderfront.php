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
class YandexMapsRenderFront
{
	function renderMarkerIcon($icon) {
		
		$defaultIcon 	= 0;
		$jsPS			= '';
		$iconName		= '';
		switch ($icon) {
			case 1:
				$iconName = 'gicongrey';
				$jsPS.='yandexIcon.iconSize = new GSize(20,24);'."\n";
				$jsPS.='yandexIcon.shadowSize = new GSize(32,24);'."\n";
				$jsPS.='yandexIcon.iconAnchor = new GPoint(10,24);'."\n";
				$jsPS.='yandexIcon.infoWindowAnchor = new GPoint(10,0);'."\n";
				$jsPS.='yandexIcon.imageMap = [14,1,16,2,18,3,19,4,19,5,19,6,19,7,18,8,18,9,17,10,16,11,16,12,15,13,14,14,14,15,15,16,17,17,17,18,18,19,17,20,14,21,10,22,7,23,2,23,2,22,2,21,2,20,1,19,1,18,1,17,1,16,1,15,0,14,0,13,0,12,0,11,0,10,0,9,7,8,7,7,8,6,8,5,9,4,9,3,10,2,11,1];';
			break;
			
			case 2:
				$iconName = 'giconyellow';
				$jsPS.='yandexIcon.iconSize = new GSize(26,30);'."\n";
				$jsPS.='yandexIcon.shadowSize = new GSize(41,30);'."\n";
				$jsPS.='yandexIcon.iconAnchor = new GPoint(0,30);'."\n";
				$jsPS.='yandexIcon.infoWindowAnchor = new GPoint(13,0);'."\n";
				$jsPS.='yandexIcon.imageMap = [18,1,19,2,21,3,23,4,24,5,24,6,24,7,24,8,23,9,23,10,22,11,22,12,21,13,20,14,20,15,19,16,19,17,18,18,17,19,18,20,20,21,22,22,22,23,22,24,22,25,18,26,15,27,12,28,8,29,4,29,4,28,3,27,3,26,3,25,3,24,3,23,2,22,2,21,2,20,2,19,2,18,1,17,1,16,1,15,1,14,1,13,1,12,1,11,9,10,10,9,10,8,11,7,11,6,12,5,12,4,13,3,14,2,14,1];';
			break;
			
			case 3:
				$iconName = 'giconhome';
				$jsPS.='yandexIcon.iconSize = new GSize(26,26);'."\n";
				$jsPS.='yandexIcon.shadowSize = new GSize(39,26);'."\n";
				$jsPS.='yandexIcon.iconAnchor = new GPoint(13,26);'."\n";
				$jsPS.='yandexIcon.infoWindowAnchor = new GPoint(13,0);'."\n";
				$jsPS.='yandexIcon.imageMap = [13,1,20,2,20,3,20,4,20,5,20,6,20,7,20,8,20,9,21,10,23,11,23,12,23,13,22,14,22,15,22,16,22,17,22,18,22,19,22,20,22,21,22,22,22,23,22,24,2,24,2,23,2,22,2,21,2,20,2,19,2,18,2,17,2,16,2,15,3,14,1,13,1,12,1,11,3,10,4,9,5,8,6,7,7,6,8,5,9,4,10,3,10,2,11,1];';
			break;
			
			case 4:
				$iconName = 'gicongreen';
				$jsPS.='yandexIcon.iconSize = new GSize(26,26);'."\n";
				$jsPS.='yandexIcon.shadowSize = new GSize(39,26);'."\n";
				$jsPS.='yandexIcon.iconAnchor = new GPoint(13,26);'."\n";
				$jsPS.='yandexIcon.infoWindowAnchor = new GPoint(13,0);'."\n";
				$jsPS.='yandexIcon.imageMap = [15,2,18,3,19,4,20,5,21,6,22,7,23,8,23,9,23,10,23,11,23,12,23,13,23,14,23,15,23,16,22,17,22,18,21,19,20,20,19,21,17,22,21,23,21,24,16,25,8,25,4,24,4,23,8,22,6,21,5,20,4,19,3,18,3,17,2,16,2,15,2,14,2,13,2,12,2,11,2,10,2,9,2,8,3,7,4,6,5,5,6,4,7,3,10,2];';
			break;
			
			case 5:
				$iconName = 'giconstar';
				$jsPS.='yandexIcon.iconSize = new GSize(26,26);'."\n";
				$jsPS.='yandexIcon.shadowSize = new GSize(39,26);'."\n";
				$jsPS.='yandexIcon.iconAnchor = new GPoint(13,26);'."\n";
				$jsPS.='yandexIcon.infoWindowAnchor = new GPoint(13,0);'."\n";
				$jsPS.='yandexIcon.imageMap = [13,0,13,1,13,2,14,3,14,4,15,5,15,6,15,7,21,8,25,9,25,10,23,11,22,12,21,13,20,14,19,15,19,16,19,17,19,18,19,19,19,20,20,21,20,22,20,23,20,24,19,25,6,25,5,24,5,23,5,22,5,21,5,20,5,19,6,18,6,17,6,16,6,15,5,14,4,13,3,12,2,11,0,10,0,9,4,8,9,7,9,6,10,5,10,4,11,3,11,2,12,1,12,0];';
			break;
			default:
				$defaultIcon = 1;
			break;
		}
		
		$imagePath = JURI::base(true).'/components/com_yandexmaps/assets/images/'.$iconName.'/';
		$js ='var yandexIcon = new YMaps.Style();'."\n";
		$js.='yandexIcon.href = \''.$imagePath.'image.png\';'."\n";
		$js.='yandexIcon.shadow.href = \''.$imagePath.'shadow.png\';'."\n";
		$js.=$jsPS;
		$js.='yandexIcon.printImage = \''.$imagePath.'printImage.gif\';'."\n";
		$js.='yandexIcon.mozPrintImage = \''.$imagePath.'mozPrintImage.gif\';'."\n";
		$js.='yandexIcon.shadow.href = \''.$imagePath.'printShadow.gif\';'."\n";
		$js.='yandexIcon.transparent = \''.$imagePath.'transparent.png\';'."\n";
		
		if ($defaultIcon == 1) {
			$output['js'] 	= '';// if default Icon should be displayed, no Gicon should be created
		} else {
			$output['js'] 	= $js;
		}
		$output['defaulticon']	= $defaultIcon;
		return $output;
		
	}
}