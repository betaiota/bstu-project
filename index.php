<?php	
	require once('basic_instagram_display_api.php');
	$params = array(
		'get_code' => isset($_GET['code'] ) ? $_GET['code'] : '' );
	
	
	$ig = new instagram_basic_display_api($params);
?>
<h1>Технологии программирования, ПР 1</h1>
<h3>студент Бабак И., группа И973</h3>
<a href="<?php $ig->; ?>">
	Авторизация
</a>
