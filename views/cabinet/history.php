<?php include( ROOT . '/views/layouts/header.php' );
?>
<main>
    <section class="cabinet">
        <div class="container">

            <h1 class="cabinet__title">История заказов</h1>

            <?php if (empty($ordersList)) {
                echo '<p class="cabinet__message">Вы еще не совершали покупок</p>';
                echo '<a class="btn btn__form btn__form-block-message" href="/cabinet">Назад</a>';
            } else {
                ; ?>
                <table class="cabinet__table">
                    <tr>
                        <th>Номер заказа</th>
                        <th>Дата оформления</th>
                        <th>Статус</th>
                        <th>Посмотреть</th>
                    </tr>
                    <?php foreach ($ordersList as $order): ?>
                        <tr>
                            <td><a href="/cabinet/view/<?php echo $order['id']; ?>">№
                                    <?php echo $order['id']; ?>
                                </a>
                            </td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo Order::getStatusText($order['status']); ?></td>
                            <td class="link"><a href="/cabinet/view/<?php echo $order['id']; ?>" title="Смотреть">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </table>
                <a class="btn btn__form btn__form-block" href="/cabinet">Назад</a>
            <?php }; ?>

        </div>
    </section>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>
