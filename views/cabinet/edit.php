<?php include(ROOT . '/views/layouts/header.php');

/** @var \CabinetController $result
 * @var \CabinetController $name
 * @var \UserController $password
 */

?>

<section>
    <div class="container">

        <?php if ($result) : ?>
            <p>Data edited</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li>-<?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="singup-form">
                <h2>Data Editing</h2>
                <!--   registration form-->
                <form action="#" method="post">
                    <label for="">
                        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
                    </label>
                    <label for="">
                        <input type="password" name="password" placeholder="Password"
                               value="<?php echo $password; ?>">
                    </label>
                    <label for="">
                        <input type="submit" name="submit" value="Save">
                    </label>
                </form>
                <!-- // registration form-->
            </div>
        <?php endif; ?>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
