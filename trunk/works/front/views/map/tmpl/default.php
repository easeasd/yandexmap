<?php defined('_JEXEC') or die('Restricted access');

if ($this->tmpl['apikey'] == '') {
	echo '<p>' . JText::_('Google Maps API Key Error Front') . '</p>';

} else if ((!isset($this->map->longitude))
		|| (!isset($this->map->latitude))
		|| (isset($this->map->longitude) && $this->map->longitude == '')
		|| (isset($this->map->latitude) && $this->map->latitude == '')) {
	echo '<p>' . JText::_('Google Maps Error Front') . '</p>';

} else {

	if (isset($this->map->description) && $this->map->description != '' && $this->pluginmap == 0) {
		echo '<div class="pm-desc">'.$this->map->description.'</div>';
	}

	// Проверка значений
	$fullWidth = 0;
	if (!isset($this->map->width)) {
		$this->map->width = 400;
	}
	if (isset($this->map->width) && (int)$this->map->width < 1) {
		$fullWidth = 1;
	}
	if (!isset($this->map->height) || (isset($this->map->height) && (int)$this->map->height < 1)) {
		$this->map->height = 400;
	}
	if (!isset($this->map->zoom) || (isset($this->map->zoom) && (int)$this->map->zoom < 1)) {
		$this->map->height = 2;
	}
	$mapLang = '';
	if (!isset($this->map->lang) || (isset($this->map->lang) && $this->map->lang =='')) {
		$mapLang = '1.1';
	} else {
		$mapLang = $this->map->lang;
	}

	
	$document	= & JFactory::getDocument();
	$scriptLink	= 'http://api-maps.yandex.ru/'.$mapLang.'/index.xml?key='. $this->tmpl['apikey'];
	$document->addScript($scriptLink);
	//echo '<noscript>'. JText::_('GOOGLE MAP ENABLE JAVASCRIPT').'</noscript>';
	
	if ($fullWidth == 1) {//если 0 то растягиваем на 100%
	
	echo '<div id="YMapsID" style="margin:0;padding:0;width:100%;height:'.$this->map->height.'px"></div>';
	
	}else{//если больше 0 то по заданным размерам
	echo '<div id="YMapsID" style="margin:0;padding:0;width:'.$this->map->width.'px;height:'.$this->map->height.'px"></div>';			
		}		
		

if (isset($this->map->displayroute) && $this->map->displayroute == 1) {
	if (isset($this->marker) && !empty($this->marker)) {
		
		$countMarker = count($this->marker);
		if ((int)$countMarker > 1) {
			echo '<div class="pmroute"><form action="#" onsubmit="showAddress(this.address.value);return false;">';
			echo JText::_('From Address').': ';
			echo ' ' . JText::_('To').': <select id="address">';
			foreach ($this->marker as $key => $markerV) {
				if ((isset($markerV->longitude) && $markerV->longitude != '')
				&& (isset($markerV->latitude) && $markerV->latitude != '')) {
					echo '<option value="'.$markerV->longitude.','.$markerV->latitude.'">'.$markerV->title.'</option>';
				}
			}
			echo '</select>';
			echo ' <input type="submit" value="'.JText::_('Get Route').'" /></form>';
			echo '</div>';
			echo '<form action="#" onsubmit="showAddress(this.address2.value);return false;"><p><input type="text" id="address2" style="width:525px;" value="" /><input type="submit" value="Искать" /></p>';
			
			echo ' </form>';
		} else if ((int)$countMarker == 1) {
			echo '<form action="#" onsubmit="showAddress(this.address.value);return false;"><p><input type="text" id="address" style="width:525px;" value="Москва" /><input type="submit" value="Искать" /></p>';
			
			echo ' </form>';
			//echo '<div id="yandex_dir"></div>';
		}
	}
}

 //стартуем загрузку карты
$scriptheader = '<script type="text/javascript" >//<![CDATA[' ."\n";

$scriptheader .= 'var map, geoResult;' ."\n";

		$scriptheader .= 'YMaps.jQuery(function () {' ."\n";
		
        $scriptheader .= '    map = new YMaps.Map(document.getElementById("YMapsID"));' ."\n";
		
        $scriptheader .= '    map.setCenter(new YMaps.GeoPoint( '.$this->map->longitude.', ' .$this->map->latitude.'), '.$this->map->zoom.');' ."\n";
		//$scriptheader .= '	map.addControl(new YMaps.TypeControl());' ."\n";

		if (isset($this->map->doubleclickzoom) && (int)$this->map->doubleclickzoom == 1) {
			$scriptheader .= 'map.enableDblClickZoom();' ."\n";
		} else {
			$scriptheader .= 'map.disableDblClickZoom();' ."\n";
		}
		
		if (isset($this->map->scrollwheelzoom) && (int)$this->map->scrollwheelzoom == 1) {

			$scriptheader .= 'map.enableScrollZoom();' ."\n";
		} else {
			$scriptheader .= 'map.disableScrollZoom();' ."\n";
		}
		
		if (isset($this->map->zoomcontrol)) {
			switch ($this->map->zoomcontrol) {
				
				case 1:
					$scriptheader .= 'map.addControl(new YMaps.Zoom());' ."\n";
				break;
				case 2:
					$scriptheader .= 'map.addControl(new YMaps.SmallZoom());' ."\n";
				break;
				default;
					$scriptheader .= '' ."\n";
				break;
			}
		}
		
		if (isset($this->map->scalecontrol) && (int)$this->map->scalecontrol == 1) {
			$scriptheader .= 'map.addControl(new YMaps.ScaleLine());' ."\n";
		}

		if (isset($this->map->typecontrol)) {
			
			
			
			switch ($this->map->typecontrol) {
				
				case 1:
					$scriptheader .= 'map.addControl(new YMaps.TypeControl());' ."\n";
				break;
				case 2:
					$scriptheader .= 'map.setType(YMaps.MapType.MAP);' ."\n";
				break;
				case 3:
					$scriptheader .= 'map.setType(YMaps.MapType.SATELLITE);' ."\n";
				break;
				case 4:
					$scriptheader .= 'map.setType(YMaps.MapType.HYBRID);' ."\n";
				break;
				case 5:
					$scriptheader .= 'map.setType(YMaps.MapType.HYBRID);' ."\n";
				break;
				
				case 7:
					$scriptheader .= 'map.addControl(new YMaps.TypeControl());' ."\n";
					$scriptheader .= 'map.setType(YMaps.MapType.SATELLITE);' ."\n";
				break;
				
				case 8:
					$scriptheader .= 'map.addControl(new YMaps.TypeControl());' ."\n";
					$scriptheader .= 'map.setType(YMaps.MapType.HYBRID);' ."\n";
				break;
				case 9:
					$scriptheader .= 'map.addControl(new YMaps.TypeControl());' ."\n";
					$scriptheader .= 'map.setType(YMaps.MapType.MAP);' ."\n";
				break;
				
				
				default;
					$scriptheader .= '' ."\n";
				break;
			}
		}
		//миникарта
		if (isset($this->map->collapsibleoverview) && (int)$this->map->collapsibleoverview == 1) {
			$scriptheader .= 'map.addControl(new YMaps.MiniMap());' ."\n";
		}
		
		
		//яндексбар
		if (isset($this->map->googlebar) && (int)$this->map->googlebar == 1) {
			$scriptheader .= 'map.addControl(new YMaps.ToolBar());' ."\n";
		}
		
		//поиск
		if (isset($this->map->border) && (int)$this->map->border == 1) {
			$scriptheader .= 'map.addControl(new YMaps.SearchControl());' ."\n";
		}
		
		
		// Маркер 
		jimport('joomla.filter.output');
		if (isset($this->marker) && !empty($this->marker)) {
		
			foreach ($this->marker as $key => $markerV) {
			
				if ((isset($markerV->longitude) && $markerV->longitude != '')
				&& (isset($markerV->latitude) && $markerV->latitude != '')) {
					
					$text =  '<h2>' . addslashes($markerV->title) . '</h2>';
					$text .= YandexMapsHelper::strTrimAll(addslashes($markerV->description));
					if ($markerV->displaygps == 1) {
						$text .= '<div class="pmgps"><table border="0"><tr><td><strong>'. JText::_('GPS') . ': </strong></td>'
								.'<td>'.YandexMapsHelper::strTrimAll(addslashes($markerV->gpslatitude)).'</td></tr>'
								.'<tr><td></td>'
								.'<td>'.YandexMapsHelper::strTrimAll(addslashes($markerV->gpslongitude)).'</td></tr></table></div>';
					}
					
					
if ($markerV->icon != '') {

// Создание стиля для значка метки
          $scriptheader .=   'var s'.$markerV->id.' = new YMaps.Style();' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle = new YMaps.IconStyle();' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle.href = "/components/com_yandexmaps/assets/images/icon/'.$markerV->icon.'";' ."\n";
		  //получаем размеры иконки
		  list($width, $height) = getimagesize(JPATH_SITE.'/components/com_yandexmaps/assets/images/icon/'.$markerV->icon); 	  
          $scriptheader .=   's'.$markerV->id.'.iconStyle.size = new YMaps.Point('.$width.', '.$height.');' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle.offset = new YMaps.Point(-9, -29);' ."\n";
		  
		/*  $scriptheader .=   's'.$markerV->id.'.iconStyle.shadow = new YMaps.IconShadowStyle();' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle.shadow.href = "/components/com_yandexmaps/assets/images/icon/'.$markerV->icon.'-shadow.png";' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle.shadow.size = new YMaps.Point(26, 26);' ."\n";
          $scriptheader .=   's'.$markerV->id.'.iconStyle.shadow.offset = new YMaps.Point(-9, -29);' ."\n";*/

		
		  $scriptheader .=	'var point'.$markerV->id.' = new YMaps.Placemark(new YMaps.GeoPoint('.$markerV->longitude.', '.$markerV->latitude.'), {style: s'.$markerV->id.'});' ."\n";
							
		
		}else{
		
		
		  $scriptheader .= 'var point'.$markerV->id.' = new YMaps.Placemark(new YMaps.GeoPoint( '.$markerV->longitude.', '.$markerV->latitude.'));' ."\n";
							
		}
	
	
	 if (isset($this->map->continuouszoom) && (int)$this->map->continuouszoom == 1) {
			$scriptheader .= 'point'.$markerV->id.'.setIconContent(\''.addslashes($markerV->title).'\');' ."\n";
		} else {
			$scriptheader .= 'point'.$markerV->id.'.setIconContent();' ."\n";
		}

	
	 
		$scriptheader .= 'map.addOverlay(point'.$markerV->id.');' ."\n";
					
		$scriptheader .= 'point'.$markerV->id.'.setBalloonContent(\''.$text.'\', {maxWidth: 100});' ."\n";
      //Открытый или закрытый балун  			
		 if (isset($this->map->dynamiclabel) && (int)$this->map->dynamiclabel == 1) {
			$scriptheader .= 'point'.$markerV->id.'.closeBalloon();' ."\n";
		} else {
			$scriptheader .= 'point'.$markerV->id.'.openBalloon();' ."\n";
			}
			
				}
			}
		}
	
	
$scriptheader .= '});' ."\n";


/*Поиск по карте*/
if (isset($this->map->displayroute) && $this->map->displayroute == 1) {
	if (isset($this->marker) && !empty($this->marker)) {
		
		
		$scriptheader .= 'function showAddress (value) {' ."\n";
        $scriptheader .= '    map.removeOverlay(geoResult);' ."\n";
        $scriptheader .= '    var geocoder = new YMaps.Geocoder(value, {results: 1, boundedBy: map.getBounds()});' ."\n";

        $scriptheader .= '    YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {' ."\n";
        $scriptheader .= '        if (this.length()) {' ."\n";
        $scriptheader .= '            geoResult = this.get(0);' ."\n";
        $scriptheader .= '            map.addOverlay(geoResult);' ."\n";
        $scriptheader .= '            map.setBounds(geoResult.getBounds());' ."\n";
        $scriptheader .= '        }else {' ."\n";
        $scriptheader .= '            alert("Ничего не найдено")' ."\n";
        $scriptheader .= '        }' ."\n";
        $scriptheader .= '    });' ."\n";
        $scriptheader .= '}' ."\n";

		
//конец яваскрипт		
	}
}

$scriptheader .= '//]]></script>' ."\n";

echo $scriptheader;
}
if ($this->tmpl['displayyandexinfo'] == 1) {
	echo '<!--<div style="text-align:right;margin-top:10px;clear:both; font-size:8px;"><a href="http://www.phoca.cz/" style="color:#CCCCCC">www.phoca.cz</a></div>-->';
}
	echo '<div style="text-align:right;margin-top:5px;clear:both; font-size:8px;"><a href="http://yar-it.com/" style="color:#CCCCCC">Яндекс карты</a></div>';
?>
