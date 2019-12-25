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

        $result = $db->query("SELECT id, name, description, price, image, content FROM product  ORDER BY id DESC 
                            LIMIT " . $count . " ");

        $i = 0;

        while ($row = $result->fetch()) {
            $productList[$i]['id']          = $row['id'];
            $productList[$i]['name']        = $row['name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['content']     = $row['content'];
            $productList[$i]['price']       = $row['price'];
            $productList[$i]['image']       = $row['image'];
            $i++;
        }
        return $productList;
    }

    /**
     * Retuns an array of products in a specific category
     *
     * @param $categoryId
     *
     * @return array
     */

    public static function getProductsListByCategory($categoryId)
    {
        if ($categoryId) {
            $db       = Db::getConnection();
            $products = array();
            $result   = $db->query("SELECT id, name, price, image, description, content FROM product WHERE 
                       cat_id = '" . $categoryId . "' ORDER BY id DESC LIMIT " . self::SHOW_BY_DEFAULT);

            $i = 0;

            while ($row = $result->fetch()) {
                $products[$i]['id']          = $row['id'];
                $products[$i]['name']        = $row['name'];
                $products[$i]['price']       = $row['price'];
                $products[$i]['image']       = $row['image'];
                $products[$i]['description'] = $row['description'];
                $products[$i]['content']     = $row['content'];
                $i++;
            }
            return $products;
        }
    }

    /**
     * Return product item by id
     *
     * @param integer $id
     *
     * @return mixed
     */

    public static function getProductById($id)
    {
        $id =intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM product WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

}