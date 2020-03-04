<?php

    /**
     * Контроллер AdminSubCategoryController
     * Управление подкатегориями товаров в админпанели
     */
    class AdminSubCategoryController extends AdminBase
    {

        /**
         * Action для страницы "Управление подкатегориями"
         * @return bool
         */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            // Получаем список подкатегорий
            $subCategoriesList = Category::getSubCategoriesListAdmin();

            // Подключаем вид
            require_once(ROOT . '/views/admin_subcategory/index.php');
            return true;
        }

        /**
         * Action для страницы "Добавить подкатегорию"
         * @return bool
         */
        public function actionCreate()
        {
            //Проверка доступа
            self::checkAdmin();

            //Обработка формы
            if (isset($_POST['submit'])) {
                //Если форма отправлена - получаем данные из формы
                $name = $_POST['name'];

                //Флаг ошибок в форме
                $errors = false;

                if (!isset($name) || empty($name)) {
                    $errors[] = 'заполните поля';
                }
                if ($errors == false) {
                    // Если ошибок нет
                    // Добавляем новую подкатегорию

                    Category::createSubCategory($name);

                    //Перенаправляем пользователя на страницу управлениями подкатегориями
                    header('Location: /admin/subcategory');
                }
            }
            //Подключение вида
            require_once(ROOT . '/views/admin_subcategory/create.php');
            return true;
        }

        /**
         * Action для страницы "Редактирование подкатегорий"
         * @param $id <p> id выбраной подкатегории</p>
         * @return bool
         */
        public function actionUpdate($id)
        {
            //Проверка доступа
            self::checkAdmin();

            // Получаем данные о конкретной подкатегории
            $subCategory = Category::getSubCategoryById($id);

            //Обработка формы
            if (isset($_POST['submit'])) {
                //Если форма отправлена - получаем данные из формы
                $name = $_POST['name'];

                // Сохраняем изменения
                Category::updateSubCategoryById($id, $name);

                //Перенаправляем пользователя на страницу управления подкатегориями
                header("Location: /admin/subcategory");
            }
            //Подключение вида
            require_once(ROOT . '/views/admin_subcategory/update.php');
            return true;
        }

        /**
         * Action для страницы "Удалить подкатегорию по заданному id"
         * @param int $id <p> id подкатегории</p>
         * @return bool
         */
        public function actionDelete($id)
        {
            //Проверка доступа
            self::checkAdmin();

            // Обработка формы
            if (isset($_POST['submit'])) {

                //Если форма отправлена - удаляем подкатегорию
                $subCategoriesList = Category::getSubCategoriesListAdmin();
                Category::deleteSubCategoryById($id);

                // Перенаправляем пользователя на страницу управления подкатегорию
                header("Location: /admin/subcategory");
            }
            //Подключаем вид
            require_once(ROOT . '/views/admin_subcategory/delete.php');
            return true;
        }
    }