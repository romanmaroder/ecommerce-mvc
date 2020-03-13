<?php
    require_once(ROOT . '/views/layouts/header_admin.php');
    /** @var AdminNewsController $newsList */
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
            <table  class="admin__products">
                <tr>
                    <th>ID новости</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th></th>
                </tr>
                <?php foreach ($newsList as $news) :?>
                <tr>
                    <td><a href="/admin/news/update/<?php echo $news['id'];?>"><?php echo $news['id'];?></a></td>
                    <td><?php echo $news['title'];?></td>
                    <td><?php echo $news['author_name'];?></td>
                    <td><?php echo $news['date'];?></td>
                    <td class="link"><a href="/admin/news/update/<?php echo $news['id']; ?>" title="Редактировать">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
<!--                    <td class="link"><a href="/admin/news/delete/--><?php //echo $news['id']; ?><!--" title="Удалить">-->
<!--                            <i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
                </tr>
            <?php endforeach;?>
            </table>

        </div>
    </main>


<?php
    require_once(ROOT . '/views/layouts/footer_admin.php');
?>