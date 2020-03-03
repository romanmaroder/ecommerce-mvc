<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
?>
    <main class="admin__main">
        <div class="container">

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/subcategory">Управление
                           подкатегориями</a></li>
                    <li class="active">Добавление подкатегории</li>
                </ul>
            </div>

            <h4>Добавление подкатегории</h4>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form class="admin__form" method="post" >
                <label class="admin__label" for="name">Наименование</label>
                <input class="admin__input" type="text" name="name" id="name">


                <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
            </form>
        </div>

    </main>


<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>