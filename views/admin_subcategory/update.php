<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminProductController $categoriesList */
?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/subcategory">Управление
                        подкатегориями</a></li>
                <li class="active">Редактирование подкатегорий</li>
            </ul>
        </div>

        <h4>Редактировать подкатегорию "<?php echo $subCategory['sub_name']; ?>"</h4>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form class="admin__form" method="post">
            <label class="admin__label" for="name">Наименование</label>
            <input class="admin__input" type="text" name="name" id="name" value="<?php echo $subCategory['sub_name']; ?>">

            <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
        </form>
    </div>

</main>


<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>

