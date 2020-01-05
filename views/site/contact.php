<?php include ROOT . '/views/layouts/header.php';

/**
 * @var \SiteController $result
 * @var \SiteController $userEmail
 * @var \SiteController $userText
 */
?>


    <section>
        <div class="container">
            <?php if ($result): ?>
                <p>Message sent. We will answer you at the indicated email</p>
            <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="singup-form">
                <h2>Feedback</h2>
                <h5>Have questions? Write to us</h5>
                <br>
                <!--   registration form-->
                <form action="#" method="post">
                    <label for="email"> Your Email
                        <input type="email" name="userEmail" placeholder="E-mail" id="email"
                               value="<?php echo $userEmail; ?>">
                    </label><br>
                    <label for="message"> Your message
                        <textarea type="text" name="userText" id="message" cols="20" rows="5"
                                  value="<?php echo $userText; ?>"></textarea>
                    </label><br>
                    <label for="">
                        <input type="submit" name="submit" value="Send">
                    </label>
                </form>
                <!-- // registration form-->
            </div>
        </div>
        <?php endif; ?>
    </section>


<?php include ROOT . '/views/layouts/footer.php'; ?>