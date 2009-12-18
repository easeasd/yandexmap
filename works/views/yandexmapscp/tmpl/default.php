<?php defined('_JEXEC') or die('Restricted access');?>

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
        <?php echo  JHTML::_('image.site', 'logo-yandex.png', 'components/com_yandexmaps/assets/images/', NULL, 'left', 'yar-it.com', 'align="right"');?>  
          <h3>Поблагодарить автора</h3>
          
          <form action="https://merchant.webmoney.ru/lmi/payment.asp" method="post" name="pay" target="_blank" id="pay">
                  <input name="LMI_PAYMENT_AMOUNT" type="text" size="3" value="1">
                  <input type="hidden" name="LMI_PAYMENT_DESC" value="Blagodarnost avtoru - yandexmap">
                  <input type="hidden" name="LMI_PAYMENT_NO" value="1">
                  <input type="hidden" name="LMI_SIM_MODE" value="0">
                  <input type="hidden" name="LMI_SUCCESS_URL" value="http://yar-it.com/">
                  <input type="hidden" name="LMI_SUCCESS_METHOD" value="2">
                  <input type="hidden" name="LMI_FAIL_URL" value="http://yar-it.com/">
                  <input type="hidden" name="LMI_FAIL_METHOD" value="2">
                  <select name="LMI_PAYEE_PURSE" style="min-width:30px;">
                    <option value="Z222701768194">WMZ</option>
                    <option value="E974972909428">WME</option>
                    <option value="R332765512780">WMR</option>
                  </select>
                  <input type="submit" class="button" value="Отправить">
                </form>
            <h3><?php echo JText::_('Version');?></h3>
            <p><?php echo $this->version ;?></p>
            <h3><?php echo JText::_('Copyright');?></h3>
            <p><a href="http://yar-it.com/" target="_blank">Модификация</a></p>
            <p><a href="http://www.phoca.cz/" target="_blank">www.phoca.cz</a></p>
            <h3><?php echo JText::_('License');?></h3>
            <p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>
          
          <p><a href="http://api.yandex.ru/maps/agreement.xml" target="_blank">Пользовательское соглашение Яндекс карты</a></p>
        </div></td>
    </tr>
  </table>
  <?php echo JHTML::_( 'form.token' ); ?>

