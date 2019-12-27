<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <?php if ($result) : ?>
            <p>Are you registered</p>
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
                <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
                <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                <input type="submit" name="submit" value="Registration">
            </form>
            <!-- // registration form-->
        </div>
    </div>
    <?php endif; ?>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
