<?php	
	require_once 'vendor/autoload.php';
	require_once('basic_instagram_display_api.php');
	
	$accessToken = 'IGQVJXUjMzSEpaMTZAvajRaQmc0ZAGRsYlpxbDU4Q1VwREpqUkxHcXVNRk4tWnlRYXZAoM09VUU4taVdHZAnlRTUhJd25OSElOV3BwMzZAMYVltVE8xbnNFREtzT25FeTBHcTBQczJpVHVR';
	$params = array(
		'get_code' => isset($_GET['code']) ? $_GET['code'] : '',
		'access_token' => $accessToken
	);
	$ig = new instagram_basic_display_api($params);
?>
<h1>Технологии программирования, ПР 1</h1>
<h3>студент Бабак И., группа И973</h3>
<hr />

<?php if($ig->hasUserAccessToken) : ?>
	<h4>Информация об аккаунте</h4>
	<h1>Имя пользователя: <?php echo $user['username']; ?></h1>
	<h2>IG ID: <?php echo $user['id']; ?></h2>
	<h3>Количество медиа-объектов: <?php echo $user['media_count']; ?></h3>
	<h4>Тип аккаунта: <?php echo $user['account_type']; ?></h4>
	<hr />
	<?php $usersMedia = $ig->getUsersMedia(); ?>
	<h3>Users Media Page 1 (<?php echo count( $usersMedia['data'] ); ?>)</h3>
	<h4>Raw Data</h4>
	<textarea style="width:100%;height:400px;"><?php print_r( $usersMedia ); ?></textarea>
	<h4>Posts</h4>
<?php else : ?>
	<a href="<?php echo $ig->authorizationUrl; ?>">
		Авторизация
	</a>
<?php endif; ?>
