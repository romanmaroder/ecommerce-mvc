<?php
include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/Product.php');


class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(7);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }
}