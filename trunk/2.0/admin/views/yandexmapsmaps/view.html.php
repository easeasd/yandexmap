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
 
class YandexMapsCpViewYandexMapsMaps extends JView
{
	function display($tpl = null) {
		$app = JFactory::getApplication('administrator');
		$document	=& JFactory::getDocument();
		$uri		=& JFactory::getURI();

		JHTML::stylesheet( 'yandexmaps.css', 'administrator/components/com_yandexmaps/assets/' );
		// Set toolbar items for the page
		JToolBarHelper::title(   JText::_( 'Yandex Maps Maps' ), 'map' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList(  JText::_( 'WARNWANTDELLISTEDITEMS' ), 'remove', 'delete');
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		JToolBarHelper::help( 'screen.yandexmaps', true );

		//Filter
		$context			= 'com_yandexmaps.maps.list.';
		$filter_state		= $app->getUserStateFromRequest( $context.'filter_state',	'filter_state',	'',	'word' );
		$filter_order		= $app->getUserStateFromRequest( $context.'filter_order', 'filter_order',	'a.ordering','cmd' );
		$filter_order_Dir	= $app->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		$search				= $app->getUserStateFromRequest( $context.'search', 'search', '', 'string' );
		$search				= JString::strtolower( $search );
		
		// Get data from the model
		$items		= & $this->get( 'Data');
		$total		= & $this->get( 'Total');
		$pagination = & $this->get( 'Pagination' );
	
		// build list of categories
		$javascript 			= 'onchange="document.adminForm.submit();"';

		// state filter
		$lists['state']			= JHTML::_('grid.state',  $filter_state );

		// table ordering
		$lists['order_Dir'] 	= $filter_order_Dir;
		$lists['order'] 		= $filter_order;

		// search filter
		$lists['search']		= $search;

		$ordering = ($lists['order'] == 'a.ordering');//Ordering allowed ?
		
		$this->assignRef('user',		JFactory::getUser());
		$this->assignRef('lists',		$lists);
		$this->assignRef('items',		$items);
		$this->assignRef('total',		$total);
		$this->assignRef('pagination',	$pagination);
		$this->assignRef('ordering', 	$ordering);
		$this->assignRef('request_url',	$uri->toString());

		parent::display($tpl);
	}
}
?>