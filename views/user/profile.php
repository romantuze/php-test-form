<div class="container">
    <h1><?php echo LANG_PROFILE; ?></h1>

	<p><?php echo LANG_WELCOME; ?>, <strong><?php echo $user['name']; ?></strong></p>

	<p><?php echo LANG_Y_LOGIN; ?>: <strong><?php echo $user['login']; ?></strong></p>

	<p><?php echo LANG_Y_EMAIL; ?>: <strong><?php echo $user['email']; ?></strong></p>

	<?php if (!empty($user['photo'])) :?><p><?php echo LANG_Y_PHOTO; ?>:</p> 
	<p><img src="/upload/<?php echo $user['photo']; ?>" title="<?php echo $user['name']; ?>" alt="<?php echo $user['name']; ?>" class="photo-image"></p>
	<?php endif; ?>

	<p><a href="/logout"><?php echo LANG_LOGOUT; ?></a></p>

 </div>