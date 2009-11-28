<?php defined('_JEXEC') or die('Restricted access');?>

<form action="index.php" method="post" name="adminForm">
  <table class="adminform">
    <tr>
      <td width="55%" valign="top"><div id="yandexmaps-cpanel">
          <div id="cpanel">
            <?php
	$component = 'com_yandexmaps';
	
	$link = 'index.php?option='.$component.'&view=yandexmapsmaps';
	echo YandexMapsRender::quickIconButton( $component, $link, 'icon-48-map.png', JText::_( 'Maps' ) );
	
	$link = 'index.php?option='.$component.'&view=yandexmapsmarkers';
	echo YandexMapsRender::quickIconButton( $component, $link, 'icon-48-marker.png', JText::_( 'Markers' ) );
	
	$link = 'index.php?option='.$component.'&view=yandexmapsinfo';
	echo YandexMapsRender::quickIconButton( $component, $link, 'icon-48-info.png', JText::_( 'Info' ) );
	?>
            <div style="clear:both">&nbsp;</div>
            <p>&nbsp;</p>
            <div style="text-align:center;padding:0;margin:0;border:0"> </div>
          </div>
        </div></td>
      <td width="45%" valign="top"><div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
          <div id="yandexmenu-info">
            <h3><?php echo JText::_('Version');?></h3>
            <p><?php echo $this->version ;?></p>
            <h3><?php echo JText::_('Copyright');?></h3>
            <p><a href="http://yar-it.com/" target="_blank">Модификация</a></p>
            <p><a href="http://www.phoca.cz/" target="_blank">www.phoca.cz</a></p>
            <h3><?php echo JText::_('License');?></h3>
            <p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>
          </div>
          <p><a href="http://api.yandex.ru/maps/agreement.xml" target="_blank">Пользовательское соглашение Яндекс карты</a></p>
        </div></td>
    </tr>
  </table>
  <input type="hidden" name="option" value="com_yandexmaps" />
  <input type="hidden" name="view" value="yandexmapscp" />
  <?php echo JHTML::_( 'form.token' ); ?>
</form>
