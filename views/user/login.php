<?php include ROOT . '/views/layouts/header.php';

/**
 * @var \UserController $password
 * @var \UserController $email
 */
?>
<section>
    <div class="container">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>-<?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="singup-form">
            <h2>Sign in</h2>
            <!--   registration form-->
            <form action="#" method="post">
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
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>

