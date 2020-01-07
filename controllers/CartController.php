<?php


class CartController
{
    public function actionAdd($id)
    {
        //Добавляем товары в корзину
        Cart::addProduct($id);

        //Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        //Добавляем товары в корзину
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $productsInCart = false;

        //Получаем данные из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            //Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);


            //Получаем общую стоимость товара
            $totalPrice = Cart::getTotalPrice($products);

            $amount = Cart::getTotalPriceOne($products);
        }

        require_once (ROOT .'/views/cart/index.php');

    }
}