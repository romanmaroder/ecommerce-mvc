<?php include(ROOT . '/views/layouts/header.php');

/** @var \CabinetController $result
 * @var \CabinetController $name
 * @var \UserController $password
 */

?>

<section class="form-block">
	<div class="container">
        <?php if ($result) : ?>
			<p>Data edited</p>
        <?php else: ?>
			<h1 class="form-block__title">Data Editing</h1>

            <?php if (isset($errors) && is_array($errors)): ?>
				<ul class="form-block__errors errors">
                    <?php foreach ($errors as $error): ?>
						<li class="errors__item">-<?php echo $error; ?></li>
                    <?php endforeach; ?>
				</ul>
            <?php endif; ?>
			<form class="form" method="POST" action="#">
				<label class="form__label" for="name"> Change your name
					<input class="form__input-elem" type="text" name="name" required="required" placeholder="Name"
						   value="<?php echo $name; ?>" id="name" />
				</label>
				<label class="form__label" for="password"> Change your password
					<input class="form__input-elem" type="password" name="password" required="required"
						   placeholder="Password" value="<?php echo $password; ?>" id="password" />
				</label>
				<label class="form__label" for="submit">
					<input class="btn btn__form" type="submit" name="submit" value="Save" id="submit" />
				</label>
			</form>

        <?php endif; ?>
	</div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
