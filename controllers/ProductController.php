<?php


    class ProductController
    {
        public function actionView($productId)
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            $product = Product::getProductsById($productId);

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);

            require_once( ROOT . '/views/product/view.php' );

            return true;
        }
    }