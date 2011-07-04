<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHTML::_('behavior.tooltip'); ?>

<div style="float:left;margin:10px;">
  <div id="yandexmenu-info">
       <h3>Поблагодарить автора</h3><form action="https://merchant.webmoney.ru/lmi/payment.asp" method="post" name="pay" target="_blank" id="pay">
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
    <p><a href="http://yar-it.com/" target="_blank">Модификация</a></p>
    <p><a href="http://www.phoca.cz/" target="_blank">www.phoca.cz</a></p>
    <h3><?php echo JText::_('License');?></h3>
    <p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>
  </div>
  <p><a href="http://api.yandex.ru/maps/agreement.xml" target="_blank">Пользовательское соглашение Яндекс карты</a></p>
</div>
