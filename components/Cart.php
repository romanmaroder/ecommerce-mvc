<?php
    /**
     * Класс Cart
     * Компонент для работы корзиной
     */

class Cart
{
    /**
     * Добавление товара в корзину (сессию)
     * @param int $id <p>id товара</p>
     * @return int <p>Количество товаров в корзине</p>
     */
    public static function addProduct($id)
    {
        // Приводим $id к типу integer
        $id = intval($id);

        //Пустой массив для товаров в корзине
        $productsInCart = array();

        //Если товары уже есть в корзине (храняться в сессии)
        if (isset($_SESSION['products'])) {
            //Заполняем массив товарами
            $productsInCart = $_SESSION['products'];
        }
        // Проверяем есть ли уже такой товар в корзине

        if (array_key_exists($id, $productsInCart)) {
            //Если товар есть в корзине, но был добавлен еще раз, увеличиваем кол-во на 1
            $productsInCart[$id]++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $productsInCart[$id] = 1;
        }
            // Записываем массив с товарами в сессию
        $_SESSION['products'] = $productsInCart;

        // Возвращаем количество товаров в корзине
        return self::countItems();
    }

    /**
     * Подсчет кол-ва товаров в корзине (в сессии)
     * @return int <p>Количество товаров в корзине</p>
     */
    public static function countItems()
    {
        // Проверка наличия товаров в корзине
        if (isset($_SESSION['products'])) {
            // Если массив с товарами есть
            // Подсчитаем и вернем их количество
            $count = 0;
            foreach ($_SESSION['products'] as $product => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // Если товаров нет, вернем 0
            return 0;
        }
    }

    /**
     * Возвращает массив с идентификаторами и количеством товаров в корзине<br/>
     * Если товаров нет, возвращает false;
     * @return mixed: boolean or array
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Получаем общую стоимость переданных товаров
     * @param array $products <p>Массив с информацией о товарах</p>
     * @return int <p>Общая стоимость</p>
     */
    public static function getTotalPrice($products)
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();

        // Подсчитываем общую стоимость
        $total = 0;

        if ($productsInCart) {
            // Если в корзине не пусто
            // Проходим по переданному в метод массиву товаров
            foreach ($products as $item) {
                // Находим общую стоимость: цена товара * количество товара
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

    /**
     * Удаляет товар с указанным id из корзины
     * @param int $id <p>id товара</p>
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

}