<?php include ROOT . '/views/layouts/header.php';

/** @var \CabinetController $user */

?>

<section>
    <div class="container">
        <h1>User account</h1>
        <h3>Hello, <?php echo $user['name']; ?></h3>
        <ul>
            <li><a href="/cabinet/edit">Edit data</a></li>
            <li><a href="/cabinet/history">Shopping list</a></li>
        </ul>

    </div>

</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
