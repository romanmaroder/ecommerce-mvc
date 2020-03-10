<?php include ROOT . '/views/layouts/header.php';

/** @var \CabinetController $user */

?>
<main >
<section class="cabinet">
    <div class="container">
        <h1 class="cabinet__title">Здравствуйте, <?php echo $user['name']; ?>!</h1>
        <ul class="cabinet__list">
            <li><a class="cabinet__link" href="/cabinet/edit">Редактирование своих данных</a></li>
            <li><a class="cabinet__link" href="/cabinet/history">История заказов</a></li>
        </ul>

    </div>

</section>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>
