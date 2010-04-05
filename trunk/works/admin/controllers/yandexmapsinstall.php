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
class YandexMapsCpControllerYandexMapsInstall extends YandexMapsCpController
{
	function __construct() {
		parent::__construct();
		$this->registerTask( 'install'  , 'install' );
		$this->registerTask( 'upgrade'  , 'upgrade' );		
	}

	
	
	function install() {		
		$db			= &JFactory::getDBO();
		$dbPref 	= $db->getPrefix();
		$msgSQL 	= '';
		$msgFile	= '';
		$msgError	= '';
		
		// ------------------------------------------
		// Yandex Maps - Maps
		// ------------------------------------------
		
		$query =' DROP TABLE IF EXISTS `'.$dbPref.'yandexmaps_map`;';
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query ='CREATE TABLE IF NOT EXISTS `'.$dbPref.'yandexmaps_map` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `title` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `width` int(5) NOT NULL default \'0\','."\n";
		$query.=' `height` int(5) NOT NULL default \'0\','."\n";
		$query.=' `latitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `longitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `zoom` int(3) NOT NULL default \'0\','."\n";
		$query.=' `lang` varchar(6) NOT NULL default \'\','."\n";
		$query.=' `border` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `continuouszoom` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `doubleclickzoom` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `scrollwheelzoom` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `zoomcontrol` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `scalecontrol` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `typecontrol` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `collapsibleoverview` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `dynamiclabel` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `googlebar` tinyint(1) NOT NULL default \'0\',';
		$query.=' `displayroute` tinyint(1) NOT NULL default \'0\',';
		$query.=' `description` text NOT NULL,'."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `access` tinyint(3) unsigned NOT NULL default \'0\','."\n";
		$query.=' `hits` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text NOT NULL,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `cat_idx` (`published`,`access`),'."\n";
		$query.=' KEY `idx_access` (`access`),'."\n";
		$query.=' KEY `idx_checkout` (`checked_out`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;';
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		
		// ------------------------------------------
		// Yandex Maps - Markers
		// ------------------------------------------
		
		$query=' DROP TABLE IF EXISTS `'.$dbPref.'yandexmaps_marker`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query ='CREATE TABLE IF NOT EXISTS `'.$dbPref.'yandexmaps_marker` ('."\n";
		$query.=' `id` int(11) unsigned NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `title` varchar(250) NOT NULL default \'\','."\n";
		$query.=' `titlem` varchar(250) NOT NULL default \'\','."\n";
		$query.=' `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `latitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `longitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `gpslatitude` varchar(50) NOT NULL default \'\','."\n";
		$query.=' `gpslongitude` varchar(50) NOT NULL default \'\','."\n";
		$query.=' `displaygps` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `icon` varchar(50) NOT NULL default \'\','."\n";
		$query.=' `deficon` varchar(50) NOT NULL default \'\','."\n";
		$query.=' `description` text NOT NULL,'."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `access` tinyint(3) unsigned NOT NULL default \'0\','."\n";
		$query.=' `hits` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text NOT NULL,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `catid` (`catid`,`published`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;';
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		

		// Error
		if ($msgSQL !='') {
			$msgError .= '<br />' . $msgSQL;
		}
		/*
		if ($msgFile !='') {
			$msgError .= '<br />' . $msgFile;
		}
		*/	
		// End Message
		if ($msgError !='') {
			$msg = JText::_( 'Yandex Maps not successfully installed' ) . ': ' . $msgError;
		} else {
			$msg = JText::_( 'Yandex Maps successfully installed' );
		}
		
		$link = 'index.php?option=com_yandexmaps';
		$this->setRedirect($link, $msg);
	}
	
	
	function upgrade() {
		
		$db			=& JFactory::getDBO();
		$dbPref 	= $db->getPrefix();
		$msgSQL 	= '';
		$msgFile	= '';
		$msgError	= '';
		
		// CHECK TABLES
		
		$query =' SELECT * FROM `'.$dbPref.'yandexmaps_map` LIMIT 1;';
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		
		$query=' SELECT * FROM `'.$dbPref.'yandexmaps_marker` LIMIT 1;'."\n";
		
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		//Обновление до версии 1.0.5
		$query = " ALTER TABLE `".$dbPref."yandexmaps_marker` CHANGE `icon` `icon` VARCHAR( 50 ) NOT NULL DEFAULT ''";
		$db->setQuery( $query );
		//Обновление до версии 1.2.0	
		//Дополнительный заголовок маркера
		$query = " ALTER TABLE `".$dbPref."yandexmaps_marker` ADD `titlem` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `title` ";
		$db->setQuery( $query );
		//Иконки по умолчанию
		$query = " ALTER TABLE `".$dbPref."yandexmaps_marker` ADD `deficon` VARCHAR( 50 ) NOT NULL DEFAULT 'lightblueSmallPoint' AFTER `icon`";
		$db->setQuery( $query );
		
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}

		// Error
		if ($msgSQL !='') {
			$msgError .= '<br />' . $msgSQL;
		}

		// End Message
		if ($msgError !='') {
			$msg = JText::_( 'Yandex Maps not successfully upgraded' ) . ': ' . $msgError;
		} else {
			$msg = JText::_( 'Yandex Maps successfully upgraded' );
		}
		
		
		
		$link = 'index.php?option=com_yandexmaps';
		$this->setRedirect($link, $msg);
	}
	
}
// utf-8 test: елки моталки
?>