<?php


    /**
     * Class AdminNewsController
     * Управление новостями в админпанели
     */
    class AdminNewsController extends AdminBase
    {
        /**
         * Action для страницы "Управление новостями"
         * @return bool
         */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            $newsList = array();
            $newsList = News::getNewsListAdmin();

            require_once( ROOT . '/views/admin_news/index.php' );
            return true;
        }

        /**
         *
         * Action для страницы "Добавить новость"
         * @return bool
         * @return bool
         */
        public static function actionCreate()
        {
            //Проверка доступа
            self::checkAdmin();

            if ( isset($_POST['submit']) ) {
                $options['title'] = $_POST['title'];
                $options['author_name'] = $_POST['author_name'];
                $options['short_content'] = $_POST['short_content'];
                $options['content'] = $_POST['content'];
                $options['visible'] = $_POST['visible'];

                // Флаг ошибок в форме
                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if ( !isset($options['title']) || empty($options['title']) ) {
                    $errors[] = 'Заполните поля';
                }

                if (($errors == false)) {
                    // Если ошибок нет
                    // Добавляем новую новость

                    $id = News::createNews($options);

                    // Если запись добавлена
                    if ($id) {
                        // Проверим, загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если загружалось, переместим его в нужную папке, дадим новое имя
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                        }
                    };

                    // Перенаправляем пользователя на страницу управлениями товарами
                    header("Location: /admin/news");
                }
            }

            require_once( ROOT . '/views/admin_news/create.php' );
            return true;
        }

        /**
         * Action для страницы "Редактирование новости"
         * @param $id <p>id новости</p>
         * @return bool
         */
        public static function actionUpdate($id)
        {
            //Проверка доступа
            self::checkAdmin();

            // Получаем данные о конкретном товаре
            $news = News::getNewsItemById($id);

            //Обработка формы
            if ( isset($_POST['submit']) ) {
                //Если форма отправлена - получаем данные из формы
                $options['title'] = $_POST['title'];
                $options['author_name'] = $_POST['author_name'];
                $options['short_content'] = $_POST['short_content'];
                $options['content'] = $_POST['content'];
                $options['visible'] = $_POST['visible'];
                // Сохраняем изменения

                if ( News::updateNewsById($id, $options) ) {

                    //Если запись сохранена
                    if ( $id ) {
                        //Проверим загружалось ли через форму изображение
                        if ( is_uploaded_file($_FILES['image']['tmp_name']) ) {
                            //если загружалось, переместим его в нужную папку, дадим новое имя
                            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                        }
                    };
                    //Перенаправляем пользователя на страницу управлениями товарами
                    header('Location: /admin/news');
                }
            }
            //Подключение вида
            require_once( ROOT . '/views/admin_news/update.php' );
            return true;
        }

        /**
         * Action для страницы "Удалить новость"
         * @param $id <p> $id идентификатор новости</p>
         * @return bool
         */
        public static function actionDelete($id)
        {
            //Проверяем доступ
            self::checkAdmin();

            if ( isset($_POST['submit']) ) {
                // Если форма отправлена
                // Удаляем заказ
                News::deleteOrderById($id);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/news");
            }
            require_once( ROOT . '/views/admin_news/delete.php' );
            return true;
        }
    }