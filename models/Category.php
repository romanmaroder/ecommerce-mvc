<?php


class Category
{

    /**
     *Return an array of category
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

//        $id = (int)trim(htmlspecialchars($_POST['id']));

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
}