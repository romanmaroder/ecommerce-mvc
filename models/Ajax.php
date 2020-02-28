<?php


class Ajax
{
    const SHOW_BY_DEFAULT = 6;

/*
    /**
     * Выбираем товары по категории методом ajax
     *
     * @param $catId     <p> Категория выбраного товара</p>
     * @param int $count <p> Кол-во товара отображаемого на странице</p>
     *
     * @return array|string
     */
//    public static function getAjaxProducts($catId, $count = self::SHOW_BY_DEFAULT, $page = 1)
//    {
////
////        if ((int)$catId) {
////
////            $page = intval($page);
////
////            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
////
////            $db = Db::getConnection();
////
////            $ajaxProducts = array();
////
////
////            if ($catId == 1) {
////                $result = $db->query("SELECT id, cat_id, name, price, image, description, content FROM product
////                        ORDER BY RAND()  LIMIT " . $count . "  OFFSET  $offset ");
////            } else {
////                $result = $db->query("SELECT id, name, price, image, description, content FROM product WHERE
////                       cat_id = '" . $catId . "' ORDER BY id ASC LIMIT  " . $count . "  OFFSET  $offset ");
////            }
////            $i = 0;
////            while ($row = $result->fetch()) {
////                $ajaxProducts[$i]['id']          = $row['id'];
////                $ajaxProducts[$i]['name']        = $row['name'];
////                $ajaxProducts[$i]['price']       = $row['price'];
////                $ajaxProducts[$i]['image']       = $row['image'];
////                $ajaxProducts[$i]['description'] = $row['description'];
////                $ajaxProducts[$i]['content']     = $row['content'];
////                $i++;
////            }
////
////            return $ajaxProducts;
////
////        } else {
////
////            return "No category";
////        }
//    }

//    public static function getAjaxTotalProductByCategory($catId)
//    {
////        $db     = Db::getConnection();
////        $result = $db->query("SELECT count(id) AS count FROM product WHERE cat_id = '$catId' ");
////        $result->setFetchMode(PDO::FETCH_ASSOC);
////        $row = $result->fetch();
////
////        return $row['count'];
//
//
//    }*/

}