<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminOrderController $ordersList */
?>
    <main class="admin__main">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="active">Управление заказами</li>
                </ul>
            </div>

            <h4>Список заказов</h4>

            <table class="admin__products">
                <tr>
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>

                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>

<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>