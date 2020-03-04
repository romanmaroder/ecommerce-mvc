<?php
    require_once( ROOT . '/views/layouts/header_admin.php' );
?>
    <main class="admin__main">
        <div class="container">

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/order">Управление
                            заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ul>
            </div>


            <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>


            <h5>Информация о заказе</h5>
            <table class="admin__products-small">
                <tr>
                    <td>Номер заказа</td>
                    <td>#<?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>

                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>
            <table class="admin__products-medium">
                <tr>
                    <th>ID товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?>$</td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </main>


<?php
    require_once( ROOT . '/views/layouts/footer_admin.php' );
?>