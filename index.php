<?php	
	require_once 'vendor/autoload.php';
	require_once('basic_instagram_display_api.php');
	
	$accessToken = 'IGQVJXUjMzSEpaMTZAvajRaQmc0ZAGRsYlpxbDU4Q1VwREpqUkxHcXVNRk4tWnlRYXZAoM09VUU4taVdHZAnlRTUhJd25OSElOV3BwMzZAMYVltVE8xbnNFREtzT25FeTBHcTBQczJpVHVR';
	$params = array(
		'get_code' => isset($_GET['code']) ? $_GET['code'] : '',
		'access_token' => $accessToken,
		'user_id' => '17841402004326569'
	);
	$ig = new instagram_basic_display_api($params);
?>
<h1>Технологии программирования, ПР 1</h1>
<h3>студент Бабак И., группа И973</h3>
<hr />

<?php if($ig->hasUserAccessToken) : ?>
<?php $user = $ig->getUser(); ?>
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
	<ul style="list-style: none;margin:0px;padding:0px;">
		<?php foreach ( $usersMedia['data'] as $post ) : ?>
			<li style="margin-bottom:20px;border:3px solid #333">
				<div>
					<?php if ( 'IMAGE' == $post['media_type'] || 'CAROUSEL_ALBUM' == $post['media_type']) : ?>
						<img style="height:320px" src="<?php echo $post['media_url']; ?>" />
					<?php else : ?>
						<video height="240" width="320" controls>
							<source src="<?php echo $post['media_url']; ?>">
						</video>
					<?php endif; ?>
				</div>
				<div>
					<b>Caption: <?php echo $post['caption']; ?></b>
				</div>
				<div>
					ID: <?php echo $post['id']; ?>
				</div>
				<div>
					Media Type: <?php echo $post['media_type']; ?>
				</div>
				<div>
					Media URL: <?php echo $post['media_url']; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else : ?>
	<a href="<?php echo $ig->authorizationUrl; ?>">
		Авторизация
	</a>
<?php endif; ?>
