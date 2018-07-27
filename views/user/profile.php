<div class="container">

    <h1>Профиль</h1>

	<p>Добро пожаловать, <strong><?php echo $user['name']; ?></strong></p>

	<p>Ваш логин: <strong><?php echo $user['login']; ?></strong></p>

	<p>Ваш email: <strong><?php echo $user['email']; ?></strong></p>

	<?php if (!empty($user['photo'])) :?><p>Вашe фото:</p> <img src="/upload/<?php echo $user['photo']; ?>" alt="<?php echo $user['name']; ?>"></p><?php endif; ?>

	<p><a href="/logout">Выйти из аккаунта</a></p>

 </div>