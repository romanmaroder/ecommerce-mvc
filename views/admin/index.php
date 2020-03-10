<?php require_once(ROOT . '/views/layouts/header_admin.php'); ?>
    <main class="admin__main">
        <div class="container">
            <h1 class="admin__title">Добрый день, администратор</h1>
            <div class="admin__content">
                <h4 class="admin__subtitle">Список доступных возможностей</h4>
                <ul class="admin__list">
                    <li class="admin__item"><a href="/admin/product" class="admin__link">Управление товарами</a></li>
                    <li class="admin__item"><a href="/admin/subcategory" class="admin__link">Управление подкатегориями</a></li>
                    <li class="admin__item"><a href="/admin/order" class="admin__link">Управление заказами</a></li>
                    <li class="admin__item"><a href="/admin/news" class="admin__link">Управление новостями</a></li>
                </ul>
            </div>
        </div>
    </main>
<?php require_once(ROOT . '/views/layouts/footer_admin.php'); ?>