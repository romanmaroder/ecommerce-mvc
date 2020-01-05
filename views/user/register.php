<?php include ROOT . '/views/layouts/header.php';

/**
 * @var \UserController $result Если пользователь зарегистрирован
 * @var \UserController $name
 * @var \UserController $password
 * @var \UserController $email
 */
?>
<section>
    <div class="container">
        <?php if ($result) : ?>
            <p>You are already registered</p>
        <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>-<?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <? endif; ?>
        <div class="singup-form">
            <h2>Sing Up</h2>
            <!--   registration form-->
            <form action="#" method="post">
                <label for="">
                    <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
                </label>
                <label for="">
                    <input type="email" name="email" placeholder="E-mail"
                           value="<?php echo $email; ?>">
                </label>
                <label for="">
                    <input type="password" name="password" placeholder="Password"
                           value="<?php echo $password; ?>">
                </label>
                <label for="">
                    <input type="submit" name="submit" value="Registration">
                </label>
            </form>
            <!-- // registration form-->
        </div>
    </div>
    <?php endif; ?>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>