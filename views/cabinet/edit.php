<?php include( ROOT . '/views/layouts/header.php' );

    /** @var \CabinetController $result
     * @var \CabinetController $name
     * @var \UserController $password
     */

?>
<main>
    <section class="form-block">
        <div class="container">
            <?php if ($result) : ?>
                <p class="form-block__success">Данные успешно изменены</p>
                <a class="btn btn__form btn__form-block" href="/cabinet/" >Назад</a>
            <?php else: ?>
                <h1 class="form-block__title">Редактирование данных</h1>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul class="form-block__errors errors">
                        <?php foreach ($errors as $error): ?>
                            <li class="errors__item">-<?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form class="form" method="POST" action="#">
                    <label class="form__label" for="name"> Изменить имя
                        <input class="form__input-elem" type="text" name="name" required="required" placeholder="Имя"
                               value="<?php echo $name; ?>" id="name"/>
                    </label>
                    <label class="form__label" for="password"> Изменить пароль
                        <input class="form__input-elem" type="password" name="password" required="required"
                               placeholder="Пароль" value="<?php echo $password; ?>" id="password"/>
                    </label>
                    <label class="form__label" for="submit">
                        <input class="btn btn__form" type="submit" name="submit" value="Сохранить" id="submit"/>
                    </label>
                </form>

            <?php endif; ?>
        </div>
    </section>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>
