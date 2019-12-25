<?php


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

    public static function getNavCategoryList()
    {
        $db = Db::getConnection();

        $navCategoryList = array();

        $result = $db->query("SELECT * FROM category WHERE cat_id NOT IN (1)");

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['cat_id']        = $row['cat_id'];
            $categoryList[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $categoryList;
    }
}