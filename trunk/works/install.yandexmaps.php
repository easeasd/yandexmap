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
	
	$message = '<p>Please select if you want to Install or Upgrade Yandex Maps component. Click Install for new Yandex Maps installation. If you click on Install and some previous Yandex Maps version is installed on your system, all Yandex Maps data stored in database will be lost. If you click on Uprade, previous Yandex Maps data stored in database will be not removed.</p>';
	
	$message .='<p>Maps are created by Google Maps™<br />Before you can use this component, you should sign up for the <a href="http://code.google.com/apis/maps/signup.html" target="_blank">Google Maps API</a> and get Google Maps API key. This key needs to be added into Google Maps API key form field in Yandex Maps Parameters.</p>';
	

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
		<p>
		<a href="http://www.phoca.cz/yandexmaps/" target="_blank">Yandex Maps Main Site</a><br />
		<a href="http://www.phoca.cz/documentation/" target="_blank">Yandex Maps User Manual</a><br />
		<a href="http://www.phoca.cz/forum/" target="_blank">Yandex Maps Forum</a><br />
		</p>
		
		<p>Google™ is a trademark of <a href="http://www.google.com" target="_blank">Google Inc.</a><br />Google Maps™ is a trademark of <a href="http://www.google.com" target="_blank">Google Inc.</a></p>
		
		<p>&nbsp;</p>
		<p><center><a style="text-decoration:underline" href="http://www.phoca.cz/" target="_blank">www.phoca.cz</a></center></p>		
<?php
}
?>