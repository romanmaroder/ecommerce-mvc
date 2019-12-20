<?php


class Product
{
    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     *
     * @param int $count
     *
     * @return array
     */

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT id, name, description, price, image FROM product  ORDER BY id DESC 
                            LIMIT " . $count . " ");

        $i = 0;

        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productList;
    }

}