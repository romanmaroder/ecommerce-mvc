<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminOrderController $id */
?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/order">Управление заказами</a></li>
                <li class="active">Удалить заказ</li>
            </ul>
        </div>

        <h4>Удалить заказ #<?php echo $id; ?></h4>
        <p>Вы действительно хотите удалить этот заказ?</p>

        <form class="admin__delete-form" method="post">
            <input class="admin__btn-delete" type="submit" name="submit" value="Удалить">
        </form>
    </div>

</main>
<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>

