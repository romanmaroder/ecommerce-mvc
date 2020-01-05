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
}