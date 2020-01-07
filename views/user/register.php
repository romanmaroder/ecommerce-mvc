<?php include ROOT . '/views/layouts/header.php';

/**
 * @var \UserController $result Если пользователь зарегистрирован
 * @var \UserController $name
 * @var \UserController $password
 * @var \UserController $email
 */
?>
<section class="form-block">
	<div class="container">
        <?php if ($result) : ?>
			<p>You are already registered</p>
        <?php else: ?>

		<h1 class="form-block__title">Sign Up</h1>

        <?php if (isset($errors) && is_array($errors)): ?>
			<ul class="form-block__errors errors">
                <?php foreach ($errors as $error): ?>
					<li class="errors__item">-<?php echo $error; ?></li>
                <?php endforeach; ?>
			</ul>
        <? endif; ?>
		<form class="form" method="POST" action="#">
			<label class="form__label" for="name">
				<input class="form__input-elem" type="text" name="name" required="required" placeholder="Name"
					   value="<?php echo $name; ?>"
					   id="name" />
			</label>
			<label class="form__label" for="email">
				<input class="form__input-elem" type="email" name="email" required="required" placeholder="E-mail"
					   value="<?php echo $email; ?>"
					   id="email" />
			</label>
			<label class="form__label" for="password">
				<input class="form__input-elem" type="password" name="password" required="required"
					   placeholder="Password"
					   value="<?php echo $password; ?>" id="password" />
			</label>
			<label class="form__label" for="submit">
				<input class="btn btn__form" type="submit" name="submit" value="Registration" id="submit" />
			</label>
		</form>
	</div>
    <?php endif; ?>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
