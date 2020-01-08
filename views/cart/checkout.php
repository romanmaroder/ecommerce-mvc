<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<main class="content">
	<section class="form-block">
		<h1 class="form-block__title">Checkout</h1>
        <?php if ($result): ?>

			<p>Заказ оформлен. Мы Вам перезвоним.</p>

        <?php else: ?>

		<div class="form-block__info">
			<p class="quantity">Quantity :<?php echo $totalQuantity; ?>pcs<span></span></p>
			<p class="subtotal">Subtotal :<?php echo $totalPrice; ?>$<span></span></p>
			<p class="form-block__message">To confirm the order, fill out the form. Our manager will contact you</p>
		</div>

        <?php if (isset($errors) && is_array($errors)): ?>
			<ul class="form-block__errors errors">
                <?php foreach ($errors as $error): ?>
					<li class="errors__item">-<?php echo $error; ?></li>
                <?php endforeach; ?>
			</ul>
        <?php endif; ?>

		<form class="form" method="POST" action="#">
			<label class="form__label" for="name">Your name
				<input class="form__input-elem" type="text" name="userName"
					   required="required" placeholder="Name" value="<?php echo $userName; ?>" id="name" />
			</label>
			<label class="form__label" for="phone">Phone number
				<input class="form__input-elem" type="tel" pattern="^\+?[378]?\d{1}[-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$" name="userPhone"
					   required="required" placeholder="+x(xxx)-xxx-xx-xx" value="<?php echo $userPhone; ?>"
					   id="phone" />
			</label>
			<label class="form__label" for="message">Message
				<textarea class="form__textarea" type="password" name="userComment" required="required"
						  value="<?php echo $userComment; ?>" id="message"></textarea>
			</label>
			<label class="form__label" for="submit">
				<input class="btn btn__form" type="submit" name="submit" value="Checkout" id="submit" />
			</label>
		</form>

        <?php endif; ?>

	</section>
</main>

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>

