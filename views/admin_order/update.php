<?php
    require_once( ROOT . '/views/layouts/header_admin.php' );
    /** @var AdminOrderController $order */

?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/order">Управление
                        заказами</a></li>
                <li class="active">Редактирование заказами</li>
            </ul>
        </div>

        <h4>Редактировать заказ # <?php echo $id; ?></h4>

        <form class="admin__form" method="post">
            <label class="admin__label" for="name">Имя клиента</label>
            <input class="admin__input" type="text" name="user_name" id="name"
                   value="<?php echo $order['user_name']; ?>">

            <label class="admin__label" for="price">Телефон клиента</label>
            <input class="admin__input" type="text" name="user_phone" id="price"
                   value="<?php echo $order['user_phone']; ?>">

            <label class="admin__label" for="content">Комментарий клиента</label>
            <textarea class="admin__textarea" name="user_comment" id="content" cols="30"
                      rows="10"><?php echo $order['user_comment']; ?></textarea>

            <label class="admin__label" for="description">Дата оформления заказа</label>
            <input class="admin__input" type="text" name="date" id="description" value="<?php echo $order['date']; ?>">

            <label class="admin__label" for="category">Статус</label>
            <select class="admin__select" name="status" id="status">
                <option value="1" <?php if ($order['status'] == 1) echo 'selected="selected"'; ?>>Новый заказ</option>
                <option value="2" <?php if ($order['status'] == 2) echo 'selected="selected"'; ?>>В обработке</option>
                <option value="3" <?php if ($order['status'] == 3) echo 'selected="selected"'; ?>>Доставляется</option>
                <option value="4" <?php if ($order['status'] == 4) echo 'selected="selected"'; ?>>Закрыт</option>
            </select>

            <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
        </form>
    </div>

</main>


<?php
    require_once( ROOT . '/views/layouts/footer_admin.php' );
?>
