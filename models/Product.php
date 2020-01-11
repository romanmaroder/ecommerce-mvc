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

        $result = $db->query("SELECT id, name, description, price, image, content FROM product  ORDER BY id ASC 
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

    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        if ($categoryId) {

            $page   = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db       = Db::getConnection();
            $products = array();
            $result   = $db->query("SELECT id, name, price, image, description, content FROM product WHERE 
                       cat_id = '" . $categoryId . "' ORDER BY id ASC LIMIT  " . self::SHOW_BY_DEFAULT . "  OFFSET  $offset ");

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

    public static function getProductsByCategory($categoryId, $count = self::SHOW_BY_DEFAULT)
    {
        if ($categoryId) {


            $db       = Db::getConnection();
            $products = array();
           /* $item     = '';
            foreach ($products as $product) {
                $item .= '<li class="card card--bg" data-id="' . $product['id'] . '">';
                $item .= '<a class="card__link card__add-btn" href="/cart/add/' . $product['id'] . '" data-id="' . $product['id'] . '">Add to card</a>';
                $item .= '<div class="card__add"></div>';
                $item .= '<div class="card__img"> <img src="' . $product['image'] . '" alt="' . $product['name'] . '" title="' . $product['name'] . '" /> </div>';
                $item .= '<div class="card__content">
                       <div class="card__title"><' . $product['name'] . '></div><div class="card__subtitle"><' . $product['description'] . '></div>
                       <div class="card__price">$<' . $product['price'] . '></div></div></li>';
            }*/


            if ($categoryId == 1) {
                $result = $db->query("SELECT id, name, price, image, description, content FROM product  ORDER BY RAND()  LIMIT " . $count . " ");
            } else {
                $result = $db->query("SELECT id, name, price, image, description, content FROM product WHERE 
                       cat_id = '" . $categoryId . "' ORDER BY id  LIMIT " . $count . "");
            }


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

    public static function getProductsById($id)
    {
        $id = intval($id);
        if ($id) {

            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM product WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    /**
     * Return total products
     *
     * @param $categoryId - id категории товара
     *
     * @return  - кол-во товаров в категории
     */

    public static function getTotalProductsInCategory($categoryId)
    {
        $db     = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM product WHERE cat_id = '$categoryId' ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Return products
     */
    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id']    = $row['id'];
            $products[$i]['name']  = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['color'] = $row['color'];
            $products[$i]['size']  = $row['size'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }
        return $products;
    }
}