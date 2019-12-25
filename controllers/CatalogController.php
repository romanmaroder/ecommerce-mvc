<?php

include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/Product.php');

class CatalogController
{
    public function actionIndex()
    {
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(10);

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId)
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();


        $categoryProducts = array();

        $categoryProducts = Product::getProductsListByCategory($categoryId);

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }
}