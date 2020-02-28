<?php if (isset($errors) && is_array($errors)): ?>
    <ul class="form-block__errors errors">
        <?php foreach ($errors as $error): ?>
            <li class="errors__item">-<?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form class="subscribe__form " method="POST">
    <input class="form__input" type="text" placeholder="Enter your email address" name="email" />
    <input class="form__button btn__form-subscribe" type="submit" value="Subscribe">
</form>
