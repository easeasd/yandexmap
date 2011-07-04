<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Yandex Download
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

/**
 * Method to build Route
 * @param array $query
 */ 
function YandexMapsBuildRoute(&$query)
{
	static $items;
	$segments	= array();
	$itemid		= null;
	
	if (isset($query['id']) && strpos($query['id'], ':')) {
		list($query['id'], $query['alias']) = explode(':', $query['id'], 2);
	}


	// Get the menu items for this component.
	if (!$items) {
		$component	= &JComponentHelper::getComponent('com_yandexmaps');
		$menu		= &JSite::getMenu();
		$items		= $menu->getItems('componentid', $component->id);
	}

	// Search for an appropriate menu item.
	if (is_array($items)) {
		// If only the option and itemid are specified in the query, return that item.
		if (!isset($query['view']) && !isset($query['id'])  && isset($query['Itemid'])) {
			$itemid = (int) $query['Itemid'];
		}

		// ------------------------------------------------------
		// Search for a specific link based on the critera given.
		if (!$itemid)
		{
			foreach ($items as $item)
			{
				// Check if this menu item links to this view.
				if (isset($item->query['view']) && $item->query['view'] == 'map'
					&& isset($item->query['id']) && $item->query['id'] == $query['id']) {
						$itemid	= $item->id;
				}
			}
		}
	}


	// Check if the router found an appropriate itemid.
	if (!$itemid) {
		// Check if a category was specified
		if (isset($query['view']) && $query['view'] == 'map' && isset($query['id'])) {
			if (isset($query['alias'])) {
				$query['id'] .= ':'.$query['alias'];
			}

			// Push the catid onto the stack.
			if(isset($query['view'])) {$segments[]	= $query['view'];}
			$segments[] = $query['id'];
			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
			
		} else if (isset($query['id'])) { 
			
			if (isset($query['alias'])) {
				$query['id'] .= ':'.$query['alias'];
			}

			// Push the id onto the stack.
			//$segments[] = $query['id'];
			if(isset($query['view'])) {$segments[]	= $query['view'];}
			$segments[] = $query['id'];
			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
			
		} else {
			// Categories view.
			unset($query['view']);
		}
	} else {
		$query['Itemid'] = $itemid;
		// Remove the unnecessary URL segments.
		unset($query['view']);
		unset($query['id']);
		unset($query['alias']);
		
	}
	return $segments;
}

/**
 * Method to parse Route
 * @param array $segments
 */ 
function YandexMapsParseRoute($segments)
{
	$vars = array();

	//Get the active menu item
	$menu =& JSite::getMenu();
	$item =& $menu->getActive();

	// Count route segments
	$count = count($segments);

	//Standard routing
	if(!isset($item)) {
		if($count == 2 ) {
			$vars['view']  = $segments[$count - 2];
		} else {
			$vars['view'] = 'map';
		}
		$vars['id']    = $segments[$count - 1];
	} else {
		//Handle View and Identifier
		switch($item->query['view']) {
			case 'map' :
				if($count == 1) {
					$vars['view'] = 'map';
					$vars['id'] = $segments[$count-1];
				}

				if($count == 2) {
					$vars['view'] = $segments[$count-2];
					$vars['id'] = $segments[$count-1];
				}
			break;
		}
	}

	return $vars;
}
?>