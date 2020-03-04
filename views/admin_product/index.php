<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminProductController $productList */
?>
    <main class="admin__main">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ul>
            </div>

            <a href="/admin/product/create" class="admin__btn-add"><i class="fa fa-plus"></i> Добавить товар</a>

            <h4>Список товаров</h4>

            <table class="admin__products">
                <tr>
                    <th>ID товара</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php foreach ($productList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> $</td>
                        <td><?php echo $product['description']; ?></td>
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить">
                                <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>

<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>