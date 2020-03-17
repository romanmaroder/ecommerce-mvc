<?php require_once( ROOT . '/views/layouts/header.php' );
    /** @var CartController $result */
    /** @var CartController $totalQuantity */
    /** @var CartController $totalPrice */
    /** @var CartController $userName */
    /** @var CartController $userPhone */
    /** @var CartController $userComment */?>

<main class="content">
    <div class="container">
        <section class="form-block">
            <h1 class="form-block__title">Оформление заказа</h1>
            <?php if ( $result ): ?>

                <p class=" form-block__success">Заказ оформлен. Мы Вам перезвоним.</p>

            <?php else: ?>
                <div class="form-block__innre">
                    <div class="form-block__info">
                        <p class="quantity">Количество товара: <?php  echo $totalQuantity; ?>шт<span></span></p>
                        <p class="subtotal">Общая стоимость: <?php  echo $totalPrice; ?>$<span></span></p>
                        <p class="form-block__message">Для подтверждения заказа заполните форму. Наш менеджер свяжется с
                            вами</p>
                    </div>

                    <?php if ( isset($errors) && is_array($errors) ): ?>
                        <ul class="form-block__errors errors">
                            <?php foreach ( $errors as $error ): ?>
                                <li class="errors__item">-<?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form class="form" method="POST" action="#">
                        <label class="form__label" for="name">Ваше имя
                            <input class="form__input-elem" type="text" name="userName"
                                   required="required" placeholder="Имя" value="<?php echo $userName; ?>" id="name"/>
                        </label>
                        <label class="form__label" for="phone">Номер телефона
                            <input class="form__input-elem" type="tel"
                                   pattern="^\+?[378]?\d{1}[-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$" name="userPhone"
                                   required="required" placeholder="+x(xxx)-xxx-xx-xx" value="<?php echo $userPhone; ?>"
                                   id="phone"/>
                        </label>
                        <label class="form__label" for="message">Сообщение
                            <textarea class="form__textarea" type="password" name="userComment" required="required"
                                      value="<?php echo $userComment; ?>" id="message"></textarea>
                        </label>
                        <label class="form__label" for="submit">
                            <input class="btn btn__form" type="submit" name="submit" value="Оформить" id="submit"/>
                        </label>
                    </form>
                </div>
            <?php endif; ?>

        </section>
    </div>
</main>

<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>

