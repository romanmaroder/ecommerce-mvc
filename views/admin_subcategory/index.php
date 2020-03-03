<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminCategoryController $subCategoriesList */
?>
<main class="admin__main">
    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/subcategory">Управление подкатегориями</a></li>
                <li class="active">Список подкатегорий</li>
            </ul>
        </div>

        <a href="/admin/subcategory/create" class="admin__btn-add"><i class="fa fa-plus"></i> Добавить подкатегорию</a>

        <h4>Список подкатегорий</h4>

        <table class="admin__products">
            <tr>
                <th>ID подкатегории</th>
                <th>Наименование</th>
                <th></th>
                <th></th>
            </tr>

            <?php  foreach ($subCategoriesList as $subCategory): ?>
                <tr>
                    <td><?php echo $subCategory['sub_id']; ?></td>
                    <td><?php echo $subCategory['sub_name']; ?></td>
                    <td><a href="/admin/subcategory/update/<?php echo $subCategory['sub_id']; ?>" title="Редактировать">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="/admin/subcategory/delete/<?php echo $subCategory['sub_id']; ?>" title="Удалить">
                            <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>

<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>
