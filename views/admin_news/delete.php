<?php
    require_once( ROOT . '/views/layouts/header_admin.php' );
    /** @var AdminNewsController $id */
?>

<main class="admin__main">
    <div class="container">

        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/news">Управление новостями</a></li>
                <li class="active">Удалить новость</li>
            </ul>
        </div>

        <h4>Удалить новость #<?php echo $id; ?></h4>
        <p>Вы действительно хотите удалить эту новость?</p>

        <form class="admin__delete-form" method="post">
            <input class="admin__btn-delete" type="submit" name="submit" value="Удалить">
        </form>
    </div>

</main>






<?php
    require_once( ROOT . '/views/layouts/footer_admin.php' );
?>
