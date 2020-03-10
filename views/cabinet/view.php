<?php include( ROOT . '/views/layouts/header.php' );
?>
    <main>
        <section class="cabinet">
            <div class="container">
                <h4 class="cabinet__title">Просмотр заказа #<?php echo $order['id']; ?></h4>

                <table class="cabinet__table-order">
                    <tr>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>

                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?>$</td>
                            <td><?php echo $productsQuantity[$product['id']]; ?></td>
                            <td hidden><?php echo $count +=$productsQuantity[$product['id']]; ?></td>
                            <td ><?php echo  $summ = $product['price'] * $productsQuantity[$product['id']];?>$ </td>
                            <td hidden><?php echo  $total += $product['price'] * $productsQuantity[$product['id']];?>$ </td>

                        </tr>
                    <?php endforeach; ?>
                    <tr class="cabinet__total">
                        <td>Итого</td>
                        <td></td>
                        <td><?php echo  $count ;?> шт</td>
                        <td><?php echo  $total ;?>$ </td>

                    </tr>
                </table>
                <a class="btn btn__form btn__form-block" href="/cabinet/history" >Назад</a>
            </div>
    </main>

<?php include ROOT . '/views/layouts/footer.php'; ?>