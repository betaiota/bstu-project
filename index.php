<?php	
	require_once 'vendor/autoload.php';
	require_once('basic_instagram_display_api.php');
	$params = array(
		'get_code' => isset($_GET['code']) ? $_GET['code'] : '' );
	
	
	$ig = new instagram_basic_display_api($params);
?>
<h1>Технологии программирования, ПР 1</h1>
<h3>студент Бабак И., группа И973</h3>
<hr />

<?php if($ig->hasUserAccessToken) : ?>
	<h4>Информация об аккаунте</h4>
	<?php echo $ig->getUserAccessToken(); ?>
	<h4>Время жизни токена</h4>
	<?php echo ceil($ig->getUserAccessTokenExpires()); ?> дней
<?php else : ?>
	<a href="<?php echo $ig->authorizationUrl; ?>">
		Авторизация
	</a>
<?php endif; ?>
