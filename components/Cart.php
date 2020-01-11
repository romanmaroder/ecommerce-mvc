<?php


class Cart
{
    /**
     * Добавляем товар в корзину
     *
     * @param integer $id
     *
     * @return int
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        //Пустой массив для товаров в корзине
        $productsInCart = array();

        //Если товары уже есть в корзине (храняться в сессии)
        if (isset($_SESSION['products'])) {
            //Заполняем массив товарами
            $productsInCart = $_SESSION['products'];
        }

        //Если товар есть в корзине, но был добавлен еще раз, увеличиваем кол-во
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            //Добавляем новый товар в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Удаляем товар с указаным id из корзины
     *
     * @param integer $id товара
     */
    public static function deleteProduct($id)
    {
        //Получаем массив с индетификаторами и кол-ом товара в корзине
        $productsInCart = self::getProducts();

        //Удаляем из массива товар с указанным id
        unset($productsInCart[$id]);

        //Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

    /**
     * Подсчет кол-ва товаров в корзине (в сессии)
     *
     * @return integer
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $product => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Получаем массив с продуктами из сессии
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Получаем общую стоимость товара
     *
     * @param $products
     *
     * @return float|int
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;

    }

    /**
     * Очищаем сессию
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

}