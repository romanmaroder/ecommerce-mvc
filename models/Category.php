<?php


    /**
     * Class Category <p>для работы с категориями</p>
     */
    class Category
{

    /**
     *Return an array of category
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query("SELECT * FROM category ");

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['cat_id']        = $row['cat_id'];
            $categoryList[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $categoryList;

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
        $result =$db->query("SELECT cat_id, category_name FROM category WHERE cat_id NOT IN (1) ORDER BY cat_id ASC ");

        //Получение и возврат результата
        $categoryList = array();

        $i=0;
        while($row = $result->fetch()) {
            $categoryList[$i]['cat_id'] = $row['cat_id'];
            $categoryList[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $categoryList;

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
            $navCategoryList[$i]['cat_id']        = $row['cat_id'];
            $navCategoryList[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $navCategoryList;
    }

}