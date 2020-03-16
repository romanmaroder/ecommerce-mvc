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
                    <li class="active">Добавить новость</li>
                </ul>
            </div>

            <h4>Добавить новость</h4>
            <?php if ( isset($errors) && is_array($errors) ): ?>
                <ul>
                    <?php foreach ( $errors as $error ): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form class="admin__form" method="post" enctype="multipart/form-data">
                <label class="admin__label" for="title">Заголовок</label>
                <input class="admin__input" type="text" name="title" id="title" value="">

                <label class="admin__label" for="author">Автор</label>
                <input class="admin__input" type="text" name="author_name" id="author"
                       value="">


                <label class="admin__label" for="short_content">Краткое описание</label>
                <textarea class="admin__textarea news" name="short_content" id="short_content" cols="30" rows="12"
                              minlength="175"></textarea>


                <label class="admin__label" for="content">Полный текст</label>
                <textarea class="admin__textarea news" name="content" id="content" cols="50"
                          rows="14"></textarea>

                <p class="admin__label">Изображение</p>
                <img src="" width="200" alt="">
                <label class="admin__label-file" for="image"> Выберите файл
                    <input class="admin__input-hide" type="file" name="image" id="image" multiple
                           value="">
                    <input class="admin__input-file" type="text" id="admin__img" value="Файл не выбран..." disabled/>
                </label>

                <label class="admin__label" for="visible">Отображение</label>
                <select class="admin__select" name="visible" id="visible">
                    <option value="1">Выводить на главную</option>
                    <option value="2">Выводить в блог</option>
                    <option value="3" selected="selected">Не выводить</option>
                </select>
                <input class="admin__btn-save" type="submit" name="submit" value="Сохранить">
            </form>
        </div>
    </main>


<?php
    require_once( ROOT . '/views/layouts/footer_admin.php' );
?>