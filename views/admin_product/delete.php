<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminProductController $id */
?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/product">Управление товарами</a></li>
                <li class="active">Удалить товар</li>
            </ul>
        </div>

        <h4>Удалить товар #<?php echo $id; ?></h4>
        <p>Вы действительно хотите удалить этот товар?</p>

        <form class="admin__delete-form" method="post">
            <input class="admin__btn-delete" type="submit" name="submit" value="Удалить">
        </form>
    </div>

</main>
<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>
