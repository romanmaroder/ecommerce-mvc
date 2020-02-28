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
            require_once(ROOT . '/views/admin_product/index.php');
            return true;
        }

        public function actionCreate()
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список категорий для выпадающего списка
//            $categorieList = Category::getCategoriesListAdmin();

            //Обработка формы

            //Подключение вида
            require_once(ROOT . '/views/admin_product/create.php');
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
            require_once(ROOT . '/views/admin_product/delete.php');
            return true;
        }
    }