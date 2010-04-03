<?php
/*********** XML PARAMETERS AND VALUES ************/
$xml_item = "component";// component | template
$xml_file = "yandexmaps.xml";		
$xml_name = "YandexMaps";
$xml_creation_date = "22/05/2009";
$xml_author = "Jan Pavelka (www.phoca.cz)";
$xml_author_email = "";
$xml_author_url = "www.phoca.cz";
$xml_copyright = "Jan Pavelka";
$xml_license = "GNU/GPL";
$xml_version = "1.0.2";
$xml_description = "Yandex Maps";
$xml_copy_file = 1;//Copy other files in to administration area (only for development), ./front, ./language, ./other

$xml_menu = array (0 => "Yandex Maps", 1 => "option=com_yandexmaps", 2 => "components/com_yandexmaps/assets/images/icon-16-pmap-menu.png");
$xml_submenu[0] = array (0 => "Control Panel", 1 => "option=com_yandexmaps", 2 => "components/com_yandexmaps/assets/images/icon-16-pmap-menu-cp.png");
$xml_submenu[1] = array (0 => "Maps", 1 => "option=com_yandexmaps&view=yandexmapsmaps", 2 => "components/com_yandexmaps/assets/images/icon-16-pmap-menu-map.png");
$xml_submenu[2] = array (0 => "Markers", 1 => "option=com_yandexmaps&view=yandexmapsmarkers", 2 => "components/com_yandexmaps/assets/images/icon-16-pmap-menu-marker.png");
$xml_submenu[3] = array (0 => "Info", 1 => "option=com_yandexmaps&view=yandexmapsinfo", 2 => "components/com_yandexmaps/assets/images/icon-16-pmap-menu-info.png");

$xml_install_file = 'install.yandexmaps.php'; 
$xml_uninstall_file = 'uninstall.yandexmaps.php';
/*********** XML PARAMETERS AND VALUES ************/
?>