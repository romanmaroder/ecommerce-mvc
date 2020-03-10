<?php


    /**
     * Class AdminProductController
     * Управление товарами в админпанели
     */
    class AdminProductController extends AdminBase
    {
        /**
         * Action для страницы "Управление товарами"
         * @return bool
         */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            // Получаем список товара
            $productList = Product::getProductsList();

            // Подключаем вид
            require_once( ROOT . '/views/admin_product/index.php' );
            return true;
        }

        /**
         * Action для страницы "добавить товар"
         * @return bool
         */
        public function actionCreate()
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список категорий для выпадающего списка
            $categoriesList = Category::getCategoriesListAdmin();

            //Получаем список подкатегорий
            $subCategoriesList = Category::getSubCategoriesListAdmin();

            //Обработка формы
            if (isset($_POST['submit'])) {
                //Если форма отправлена - получаем данные из формы
                $options['name'] = $_POST['name'];
                $options['description'] = $_POST['description'];
                $options['content'] = $_POST['content'];
                $options['price'] = $_POST['price'];
                $options['cat_id'] = $_POST['cat_id'];
                $options['sub_id'] = $_POST['sub_id'];
//                $options['sub_name'] = $_POST['sub_name'];

                //Флаг ошибок в форме
                $errors = false;

                if (!isset($options['name']) || empty($options['name'])) {
                    $errors[] = 'заполните поля';
                }
                if ($errors == false) {
                    // Если ошибок нет
                    // Добавляем новый товар

                    $id = Product::createProduct($options);

                    //Если запись добавлена
                    if ($id) {
                        //Проверим загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                            //если загружалось, переместим его в нужную папку, дадим новое имя
                            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                        }
                    };
                    //Перенаправляем пользователя на страницу управлениями товарами
                    header('Location: /admin/product');
                }
            }
            //Подключение вида
            require_once( ROOT . '/views/admin_product/create.php' );
            return true;
        }

        /**
         * Action для страницы "Редактирование товара"
         * @param $id <p> id выбраного товара</p>
         * @return bool
         */
        public function actionUpdate($id)
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список категорий для выпадающего списка
            $categoriesList = Category::getCategoriesListAdmin();

            //Получаем список подкатегорий
            $subCategoriesList = Category::getSubCategoriesListAdmin();

            // Получаем данные о конкретном товаре
            $product = Product::getProductsById($id);

            //Обработка формы
            if (isset($_POST['submit'])) {
                //Если форма отправлена - получаем данные из формы
                $options['name'] = $_POST['name'];
                $options['description'] = $_POST['description'];
                $options['content'] = $_POST['content'];
                $options['price'] = $_POST['price'];
                $options['cat_id'] = $_POST['cat_id'];
                $options['sub_id'] = $_POST['sub_id'];
                // Сохраняем изменения

                if (Product::updateProductById($id, $options)) {

                    //Если запись сохранена
                    if ($id) {
                        //Проверим загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                            //если загружалось, переместим его в нужную папку, дадим новое имя
                            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                        }
                    };
                    //Перенаправляем пользователя на страницу управлениями товарами
                    header('Location: /admin/product');

                }
            }
            //Подключение вида
            require_once( ROOT . '/views/admin_product/update.php' );
            return true;
        }

        /**
         * Action для страницы "Удалить товар"
         * @param $id
         * @return bool
         */
        public function actionDelete($id)
        {
            //Проверка доступа
            self::checkAdmin();

            // Обработка формы
            if (isset($_POST['submit'])) {

                //Если форма отправлена - удаляем товар
                Product::deleteProductById($id);

                // Перенаправляем пользователя на страницу управления товарами
                header("Location: /admin/product");
            }
            //Подключаем вид
            require_once( ROOT . '/views/admin_product/delete.php' );
            return true;
        }
    }