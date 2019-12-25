<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class ProductController
{
    public function actionView($productId)
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $product = Product::getProductById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }
}