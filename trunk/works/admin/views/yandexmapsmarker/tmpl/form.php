<?php
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.tooltip'); 

echo YandexMapsRender::renderSubmitButtonJs(array(
		0 => array('title', 'Marker must have a title', 'true', 1),
		1 =>array('catid', 'You must select a map', 'true', 0))
	);
echo YandexMapsRender::renderFormStyle();?>

<form action="<?php echo $this->request_url; ?>" method="post" name="adminForm" id="adminForm">
  <table width="100%">
    <tr>
      <td width="90%" valign="top"><div class="col50">
          <fieldset class="adminform">
          <legend><?php echo JText::_('Basic Settings'); ?></legend>
          <table class="admintable" style="float:left;">
            <?php	
		echo YandexMapsRender::renderFormInput('title', 'Titlemarker', '', $this->item->title);	
		echo YandexMapsRender::renderFormInput('titlem', 'Titlemarker_2', '', $this->item->titlem);
		echo YandexMapsRender::renderFormItemSpecial('catid', 'Map', '', $this->lists['catid'] );
		echo YandexMapsRender::renderFormItemSpecial('published', 'Published', '', $this->lists['published'] );
		echo YandexMapsRender::renderFormItemSpecial('ordering', 'Ordering', '', $this->lists['ordering'] );
		echo YandexMapsRender::renderFormItemSpecial('description', 'Description', '', $this->editor->display( 'description',  $this->item->description, '550', '300', '60', '20', array('pagebreak', 'readmore') ) );

		?>
          </table>
          </fieldset>
        </div></td>
      <td style="width:365px;" valign="top"><div class="col50" style="width:365px;">
          <fieldset class="adminform">
          <legend><?php echo JText::_('Nastroykamarkera'); ?></legend>
          <?php  
jimport('joomla.html.pane');
$pane =& JPane::getInstance('Sliders');
echo $pane->startPane('myPane');
{
echo $pane->startPanel(JText::_('Nastroykamarkera'), 'panel1');

		echo '<table class="paramlist admintable">';
		echo YandexMapsRender::renderFormItemImageButton('latitude', 'Latitude', $this->item->latitude, 50, 50, $this->buttonmap, 'onChange="setPMGPSLatitude(this.value);"');
		echo YandexMapsRender::renderFormInput('longitude', 'Longitude', '', $this->item->longitude, 50, 50, 'onChange="setPMGPSLongitude(this.value);"');
		echo YandexMapsRender::renderFormInput('gpslatitude', 'GPS Latitude', '', $this->item->gpslatitude, '', '', 'readonly', 'background:#f0f0f0');
		echo YandexMapsRender::renderFormInput('gpslongitude', 'GPS Longitude', '', $this->item->gpslongitude, '', '', 'readonly', 'background:#f0f0f0');
		$option = array(0 => 'No', 1 => 'Yes');
		echo YandexMapsRender::renderFormSelectBox('displaygps', 'Display GPS', '', $this->item->displaygps, $option);
		echo "</table>";

echo $pane->endPanel();
//Иконки и дизайн маркера
echo $pane->startPanel(JText::_('Design Settings'), 'panel2');
		echo '<table class="paramlist admintable">';
		$option = array(
		0 => 'lightblueSmallPoint', 1 => 'whiteSmallPoint', 2 => 'greenSmallPoint', 3 => 'redSmallPoint', 4 => 'yellowSmallPoint', 
		5 => 'darkblueSmallPoint', 6 => 'nightSmallPoint', 7 => 'greySmallPoint', 8 => 'blueSmallPoint', 9 => 'orangeSmallPoint',
		10 => 'darkorangeSmallPoint', 11 => 'pinkSmallPoint', 12 => 'violetSmallPoint', 13 => 'airplaneIcon', 14 => 'arrowDownRightIcon',
		15 => 'arrowUpIcon', 16 => 'bankIcon', 17 => 'bicycleIcon', 18 => 'busIcon', 19 => 'carIcon', 20 => 'downhillSkiingIcon',
		21 => 'electricTrainIcon', 22 => 'gasStationIcon', 23 => 'houseIcon', 24 => 'metroKievIcon', 25 => 'metroYekaterinburgIcon',
		26 => 'phoneIcon', 27 => 'restaurauntIcon', 28 => 'skatingIcon', 29 => 'stadiumIcon', 30 => 'tailorShopIcon',
		31 => 'tireIcon', 32 => 'trolleybusIcon', 33 => 'turnRightIcon', 34 => 'workshopIcon', 
		35 => 'anchorIcon', 36 => 'arrowLeftIcon', 37 => 'attentionIcon', 38 => 'barIcon', 39 => 'bowlingIcon', 
		40 => 'cafeIcon', 41 => 'cellularIcon', 42 => 'dpsIcon', 43 => 'factoryIcon', 44 => 'gymIcon', 45 => 'keyMasterIcon', 
		46 => 'metroMoscowIcon', 47 => 'motobikeIcon', 48 => 'photographerIcon', 49 => 'shipIcon', 50 => 'skiingIcon',
		51 => 'storehouseIcon', 52 => 'theaterIcon', 53 => 'trainIcon', 54 => 'truckIcon', 55 => 'wifiIcon', 56 => 'arrowDownLeftIcon', 
		57 => 'arrowRightIcon', 58 => 'badmintonIcon', 59 => 'barberShopIcon', 60 => 'buildingsIcon', 61 => 'campingIcon', 
		62 => 'cinemaIcon', 63 => 'dryCleanerIcon', 64 => 'fishingIcon', 65 => 'hospitalIcon', 66 => 'mailPostIcon', 
		67 => 'metroStPetersburgIcon', 68 => 'mushroomIcon', 69 => 'pingPongIcon', 70 => 'shopIcon', 71 => 'smartphoneIcon', 
		72 => 'swimmingIcon', 73 => 'tennisIcon', 74 => 'tramwayIcon', 75 => 'turnLeftIcon', 76 => 'wifiLogoIcon' );
	
		echo YandexMapsRender::renderFormInputRadioButtonIconDef('deficon', 'Marker Icon', $this->item->deficon, $option, 2);

		echo YandexMapsRender::renderFormItemSpecial('icon', 'Marker Icon', '', $this->iconcombo, '');
		echo "</table>";
echo $pane->endPanel();
}
echo $pane->endPane();?>
          </fieldset>
        </div></td>
    </tr>
  </table>
  <div class="clr"></div>
  <input type="hidden" name="option" value="com_yandexmaps" />
  <input type="hidden" name="cid[]" value="<?php echo $this->item->id; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="controller" value="yandexmapsmarker" />
</form>
