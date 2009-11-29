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
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.filesystem.folder' );

function com_install() {
	
	$message = '<p>Пожалуйста, выберите, "Новая установка" или "Обновление" компонента Яндекс Карты. Если вы устанавливаете компонент Яндекс Карты первый раз, то выберите "Новая установка". Если вы выбрали "Новая установка" то все данные от предидущих установок компонента Яндекс карты будут потеряны. Если вы хотите только обновить версию компонента, то выберите "Обновление", в этом случае все данные будут сохранены.</p>';
	
	$message .='<p>Если у вас нет Yandex Maps API ключа, то перейдите на страницу <a href="http://api.yandex.ru/maps/form.xml" target="_blank">Yandex Maps API</a> и получите там ключ для своего сайта. Этот ключ нужно будет добавить в настройках компонента Яндекс карты.</p>';
	

	?>
	<div style="padding:20px;border:1px solid #b36b00;background:#fff">
		<a style="text-decoration:underline" href="http://www.phoca.cz/" target="_blank"><?php
			echo  JHTML::_('image.site', 'logo.png', 'components/com_yandexmaps/assets/images/', NULL, NULL, 'Yandex.cz');
		?></a>
		<div style="position:relative;float:right;">
			<?php echo  JHTML::_('image.site', 'logo-yandex.png', 'components/com_yandexmaps/assets/images/', NULL, NULL, 'Yandex.cz');?>
		</div>
		<p>&nbsp;</p>
		<?php echo $message; ?>
		<div style="clear:both">&nbsp;</div>
		<div style="text-align:center"><center><table border="0" cellpadding="20" cellspacing="20">
			<tr>
				<td align="center" valign="middle">
					<a href="index.php?option=com_yandexmaps&amp;controller=yandexmapsinstall&amp;task=install"><?php
					echo JHTML::_('image.site',  'install.png', '/components/com_yandexmaps/assets/images/', NULL, NULL, 'Install' );
					?></a>
				</td>
				
				<td align="center" valign="middle">
					<a href="index.php?option=com_yandexmaps&amp;controller=yandexmapsinstall&amp;task=upgrade"><?php
					echo JHTML::_('image.site',  'upgrade.png', '/components/com_yandexmaps/assets/images/', NULL, NULL, 'Upgrade' );
					?></a>
				</td>
			</tr>
		</table></center></div>
		
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		
		
		<p> <a href="http://api.yandex.ru/" target="_blank">API Yandex map</a> </p>
        <p><a href="http://yandex.ru/" target="_blank">Yandex</a></p>
		
		<p>&nbsp;</p>
		<p><center><a style="text-decoration:underline" href="http://yar-it.com" target="_blank">www.yar-it.com</a></center></p>		
<?php
}
?>