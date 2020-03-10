<?php
    require_once(ROOT . '/views/layouts/header_admin.php');

?>
    <main class="admin__main">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="active">Управление новостями</li>
                </ul>
            </div>

            <h4>Список новостей</h4>

            <?php foreach ($newsList as $news) {
                echo $news['id'].'<br>';
                echo $news['title'].'<br>';
                echo $news['date'].'<br>';
                echo $news['short_content'].'<br>';
                echo $news['author_name'].'<br>';
                echo $news['preview'].'<br>';
            };?>
        </div>
    </main>


<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>