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
jimport( 'joomla.application.component.view');
class YandexMapsViewMap extends JView
{
	function display($tpl = null) {
		global $mainframe;
		$tmpl = array();
		
		// PLUGIN WINDOW - we get information from plugin
		$get		= '';
		$get['tmpl']	= JRequest::getVar( 'tmpl', '', 'get', 'string' );
		
		$document	= & JFactory::getDocument();		
		$params		= &$mainframe->getParams();
		
		$document->addStyleSheet(JURI::base(true).'/components/com_yandexmaps/assets/yandexmaps.css');
		

		$tmpl['apikey']				= $params->get( 'google_maps_api_key', '' );
		$tmpl['displayyandexinfo']	= $params->get( 'display_yandex_info', 1 );
			
		// MODEL
		$model	= &$this->getModel();
		$item	= $model->getData();
		
		// Plugin information
		$pluginMap = 0;
		if (isset($get['tmpl']) && $get['tmpl'] == 'component') {
			$pluginMap = 1;
			// NO SCROLLBAR if windows is called by plugin but if there is a route form, display it
			if (isset($item['map']->displayroute) && $item['map']->displayroute == 1) {
				$document->addCustomTag( "<style type=\"text/css\"> \n" 
			." html,body, .contentpane{background:#ffffff;text-align:left;} \n" 
			." </style> \n");
			} else {
				$document->addCustomTag( "<style type=\"text/css\"> \n" 
			." html,body, .contentpane{overflow:hidden;background:#ffffff;} \n" 
			." </style> \n");
			}
		}

		// ASIGN
		$this->assignRef( 'tmpl', $tmpl );
		$this->assignRef( 'map', $item['map'] );
		$this->assignRef( 'marker', $item['marker'] );
		$this->assignRef( 'pluginmap', $pluginMap);
		$this->assignRef( 'params', $params );
		parent::display($tpl);
	}
}
