<?php
    require_once( ROOT . '/views/layouts/header_admin.php' );
    /** @var AdminNewsController $id */
    /** @var AdminNewsController $news */

?>
    <main class="admin__main">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin">Админпанель</a></li>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/admin/news">Управление
                            новостями</a></li>
                    <li class="active">Редактирование новости</li>
                </ul>
            </div>

            <h4>Редактировать новость №<?php echo $id; ?></h4>
            <?php if ( isset($errors) && is_array($errors) ): ?>
                <ul>
                    <?php foreach ( $errors as $error ): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form class="admin__form" method="post" enctype="multipart/form-data">
                <label class="admin__label" for="title">Заголовок</label>
                <input class="admin__input" type="text" name="title" id="title" value="<?php
                    echo $news['title']; ?>">

                <label class="admin__label" for="author">Автор</label>
                <input class="admin__input" type="text" name="author_name" id="author"
                       value="<?php echo $news['author_name']; ?>">

                <?php if ( $news['id'] == 3 ): ?>
                    <label class="admin__label" for="short_content">Краткое описание</label>
                    <textarea class="admin__textarea news" name="short_content" id="short_content" cols="30" rows="12"
                              minlength="400"><?php echo $news['short_content']; ?></textarea>
                <?php else: ?>
                    <label class="admin__label" for="short_content">Краткое описание</label>
                    <textarea class="admin__textarea news" name="short_content" id="short_content" cols="30" rows="4"
                              maxlength="175"><?php echo $news['short_content']; ?></textarea>
                <?php endif; ?>

                <label class="admin__label" for="content">Полный текст</label>
                <textarea class="admin__textarea news" name="content" id="content" cols="50"
                          rows="14"><?php echo $news['content']; ?></textarea>

                <p class="admin__label">Изображение</p>
                <img src="<?php echo News::getImage($news['id']); ?>" width="200" alt="">
                <label class="admin__label-file" for="image"> Выберите файл
                    <input class="admin__input-hide" type="file" name="image" id="image" multiple
                           value="<?php echo $news['image']; ?>">
                    <input class="admin__input-file" type="text" id="admin__img" value="Файл не выбран..." disabled/>
                </label>

                <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
            </form>
        </div>
    </main>


<?php
    require_once( ROOT . '/views/layouts/footer_admin.php' );
?>