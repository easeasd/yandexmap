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
jimport('joomla.application.component.controller');

// Submenu view
$view	= JRequest::getVar( 'view', '', '', 'string', JREQUEST_ALLOWRAW );

if ($view == '' || $view == 'yandexmapscp') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_yandexmaps');
	JSubMenuHelper::addEntry(JText::_('Maps'), 'index.php?option=com_yandexmaps&view=yandexmapsmaps');
	JSubMenuHelper::addEntry(JText::_('Markers'), 'index.php?option=com_yandexmaps&view=yandexmapsmarkers' );
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_yandexmaps&view=yandexmapsinfo' );
}

if ($view == 'yandexmapsmaps') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_yandexmaps');
	JSubMenuHelper::addEntry(JText::_('Maps'), 'index.php?option=com_yandexmaps&view=yandexmapsmaps', true);
	JSubMenuHelper::addEntry(JText::_('Markers'), 'index.php?option=com_yandexmaps&view=yandexmapsmarkers' );
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_yandexmaps&view=yandexmapsinfo' );
}

if ($view == 'yandexmapsmarkers') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_yandexmaps');
	JSubMenuHelper::addEntry(JText::_('Maps'), 'index.php?option=com_yandexmaps&view=yandexmapsmaps');
	JSubMenuHelper::addEntry(JText::_('Markers'), 'index.php?option=com_yandexmaps&view=yandexmapsmarkers', true );
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_yandexmaps&view=yandexmapsinfo' );
}


if ($view == 'yandexmapsinfo') {
	JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option=com_yandexmaps');
	JSubMenuHelper::addEntry(JText::_('Maps'), 'index.php?option=com_yandexmaps&view=yandexmapsmaps');
	JSubMenuHelper::addEntry(JText::_('Markers'), 'index.php?option=com_yandexmaps&view=yandexmapsmarkers' );
	JSubMenuHelper::addEntry(JText::_('Info'), 'index.php?option=com_yandexmaps&view=yandexmapsinfo', true );
}


class yandexMapsCpController extends JController
{
	function display() {
		parent::display();
	}
}
?>
