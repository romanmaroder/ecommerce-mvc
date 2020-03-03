<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminSubCategoryController $id */
?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/subcategory">Управление подкатегориями</a></li>
                <li class="active">Удалить подкатегорию</li>
            </ul>
        </div>

        <h4>Удалить подкатегорию <?php echo $id; ?></h4>
        <p>Вы действительно хотите удалить эту подкатегорию?</p>

        <form class="admin__delete-form" method="post">
            <input class="admin__btn-delete" type="submit" name="submit" value="Удалить">
        </form>
    </div>

</main>
<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>

