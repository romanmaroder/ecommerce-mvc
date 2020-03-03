<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminProductController $categoriesList */
?>
<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/product">Управление
                        товарами</a></li>
                <li class="active">Редактирование товара</li>
            </ul>
        </div>

        <h4>Редактирование товара</h4>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form class="admin__form" method="post" enctype="multipart/form-data">
            <label class="admin__label" for="name">Наименование</label>
            <input class="admin__input" type="text" name="name" id="name" value="<?php echo $product['name'];?>">

            <label class="admin__label" for="price">Цена, $</label>
            <input class="admin__input" type="text" name="price" id="price" value="<?php echo $product['price'];?>">

            <label class="admin__label" for="description">Описание</label>
            <input class="admin__input" type="text" name="description" id="description" value="<?php echo $product['description'];?>">

            <label class="admin__label" for="content">Полное описание</label>
            <textarea class="admin__textarea" name="content" id="content" cols="30" rows="10"><?php echo $product['content'];?></textarea>

            <label class="admin__label" for="category">Категория</label>
            <select class="admin__select" name="cat_id" id="category">
                <?php if (is_array($categoriesList)): ?>
                    <?php foreach ($categoriesList as $category): ?>
                        <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <p class="admin__label">Изображение товара</p>
<!--            <img src="--><?php //echo Product::getImage($product['id']) ;?><!--" width="200" alt="">-->
            <label class="admin__label-file" for="image"> Выберите файл
                <input class="admin__input-hide" type="file" name="image" id="image" multiple value="<?php echo $category['image']; ?>">
                <input class="admin__input-file" type="text" id="admin__img" value="Файл не выбран..." disabled />
            </label>

            <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
        </form>
    </div>

</main>


<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>
