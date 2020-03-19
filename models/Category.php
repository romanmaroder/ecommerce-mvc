<?php


    /**
     * Class Category <p>для работы с категориями</p>
     */
    class Category
    {

        /**
         *Возвращает массив категорий
         */
        public static function getCategoriesList()
        {
            $db = Db::getConnection();

            $categoryList = array();

            $result = $db->query("SELECT * FROM category ");

            $i = 0;
            while ($row = $result->fetch()) {
                $categoryList[$i]['cat_id'] = $row['cat_id'];
                $categoryList[$i]['category_name'] = $row['category_name'];
                $i++;
            }
            return $categoryList;

        }

        /**
         * Возвращает подкатегорию с заданным id
         * @param int $id <p>id подкатегории</p>
         * @return array <p>Массив с информацией о категории</p>
         */
        public static function getSubCategoryById($id)
        {
            //Подключение к БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "SELECT * FROM subcategory WHERE sub_id= :sub_id";

            //Получение и возврат результата
            $result = $db->prepare($sql);
            $result->bindParam(':sub_id', $id,PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            //Выполняем запрос
            $result->execute();

            //Возвращаем данные
            return $result->fetch();
        }

        /**
         * Возвращает массив с категориями для навигационного меню
         * @return array
         */
        public static function getNavCategoryList()
        {
            $db = Db::getConnection();

            $navCategoryList = array();

            $result = $db->query("SELECT * FROM category WHERE cat_id NOT IN (1)");

            $i = 0;
            while ($row = $result->fetch()) {
                $navCategoryList[$i]['cat_id'] = $row['cat_id'];
                $navCategoryList[$i]['category_name'] = $row['category_name'];
                $i++;
            }
            return $navCategoryList;
        }

        public static function getCategoryList($categoryId)
        {

            $db = Db::getConnection();

            $sql = 'SELECT * FROM category WHERE cat_id = :cat_id';

            $result = $db->prepare($sql);
            $result->bindParam(':cat_id', $categoryId, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            //Выполняем запрос
            $result->execute();

            // Возвращаем данные
            return $result->fetch();

        }

        /**
         * Возвращает массив категорий для списка в админпанели
         * @return array <p> Массив категорий</p>
         */
        public static function getCategoriesListAdmin()
        {
            //Подключение к БД
            $db = Db::getConnection();

            //Запрос к БД
            $result = $db->query("SELECT cat_id, category_name FROM category WHERE cat_id NOT IN (1) ORDER BY cat_id ASC ");

            //Получение и возврат результата
            $categoryList = array();

            $i = 0;
            while ($row = $result->fetch()) {
                $categoryList[$i]['cat_id'] = $row['cat_id'];
                $categoryList[$i]['category_name'] = $row['category_name'];
                $i++;
            }
            return $categoryList;

        }

        /**
         * Возвращает массив подкатегорий для списка в админпанели
         * @return array <p> Массив подкатегорий</p>
         */
        public static function getSubCategoriesListAdmin()
        {
            //Подключение к БД
            $db = Db::getConnection();

            //Запрос к БД
            $result = $db->query("SELECT sub_id, sub_name FROM subcategory ORDER BY sub_id ASC ");

            //Получение и возврат результата
            $subCategoryList = array();

            $i = 0;
            while ($row = $result->fetch()) {
                $subCategoryList[$i]['sub_id'] = $row['sub_id'];
                $subCategoryList[$i]['sub_name'] = $row['sub_name'];
                $i++;
            }
            return $subCategoryList;

        }

        /**
         * Добавляем новую подкатегорию в админпанели
         * @param $name
         * @return bool <p>Результат добавления подкатегории в таблицу</p>
         */
        public static function createSubCategory($name)
        {
            // Подключение к БД
            $db = Db::getConnection();

            //Запрос к Бд
            $sql = "INSERT INTO subcategory (sub_name) VALUE (:sub_name)";

            //Получение и возврат результата
            $result = $db->prepare($sql);
            $result->bindParam(':sub_name', $name, PDO::PARAM_STR);
            return $result->execute();
        }

        /**
         * Удаляет подкатегорию с заданным id в админпанели
         * @param int $id <p>id Выбранной подкатегории</p>
         * @return bool <p> Результат работы метода</p>
         */
        public static function deleteSubCategoryById($id)
        {
            //Подключение к БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "DELETE FROM subcategory WHERE sub_id = :sub_id";

            //Получение и возврат результата запроса
            $result = $db->prepare($sql);
            $result->bindParam(':sub_id', $id, PDO::PARAM_INT);
            return $result->execute();

        }

        /**
         * Редактирует подкатегорию в админпанели
         * @param $name <p>название категории</p>
         * @return bool <p> Результат работы метода</p>
         */
        public static function updateSubCategoryById($id,$name)
        {
            //Подключение к БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "UPDATE subcategory SET sub_name = :sub_name WHERE sub_id= :sub_id";

            //Получение и возврат результата
            $result= $db->prepare($sql);
            $result->bindParam(':sub_id', $id,PDO::PARAM_INT);
            $result->bindParam(':sub_name', $name,PDO::PARAM_STR);
            return $result->execute();
        }

    }