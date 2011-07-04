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
    <style type="text/css" >
    
	ul.r1pxc, ul.r1pxc li, ul.r1pxc a, ul.r1pxc b { /*  обнуляем все елементы и начинаем параметры указывать: */
	text-decoration: none;
	position: relative;
	display: block;
	margin: 0;
	padding: 0;}
ul.r1pxc li { /*  отступы */
	float: left;
	clear: both;
	left: 1px; /*  своеобразный паддинг слева*/
	list-style: none; /*  нам не нужны лишние "артефакты" :) */
	background-color: #aaa; /*  цвет бордера, верхнего */
	border-bottom: 2px solid #aaa; /*  цвет бордера, нижнего */
	margin-bottom: 5px;}
ul.r1pxc li a {
	width: 200px; /*  длину елемента, в данном случае ссылки */
	float: left;
	left: -1px;
	top: 1px;
	margin-right: -2px;	/*  что бы появилась правая граница */
	background-color: #ddd;
	text-align: center;
} /* цвет фона */
ul.r1pxc li a:hover {
	background-color: #ccc;} /* цвет фона при наведении мышей */
ul.r1pxc li a b {
	border: solid #aaa; /*  цвет бордеров */
	border-width: 0 1px 0 1px; /*  бордеров правой и левой стороны */
	padding: 4px; /*  просто паддинг для текста */
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000;
	text-align: center;
}
    
    </style>
	<div style="padding:20px;border:1px solid #b36b00;background:#fff">
		<a style="text-decoration:underline" href="http://www.phoca.cz/" target="_blank"><?php
			echo  JHTML::_('image.site', 'logo.png', 'components/com_yandexmaps/assets/images/', NULL, NULL, 'yar-it.com');
		?></a>
		<div style="position:relative;float:right;">
			<?php echo  JHTML::_('image.site', 'logo-yandex.png', 'components/com_yandexmaps/assets/images/', NULL, NULL, 'yar-it.com');?>
		</div>
		<p>&nbsp;</p>
		<?php echo $message; ?>
		<div style="clear:both">&nbsp;</div>
		<div style="text-align:center"><center><table border="0" cellpadding="20" cellspacing="20">
			<tr>
				<td align="center" valign="middle">
					<ul class="r1pxc"><li><a href="index.php?option=com_yandexmaps&amp;controller=yandexmapsinstall&amp;task=install"><b>НОВАЯ УСТАНОВКА</b></a></li></ul>
				</td>
				
				<td align="center" valign="middle">
					<ul class="r1pxc"><li><a href="index.php?option=com_yandexmaps&amp;controller=yandexmapsinstall&amp;task=upgrade"><b>ОБНОВИТЬ ВЕРСИЮ</b></a></li></ul>
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