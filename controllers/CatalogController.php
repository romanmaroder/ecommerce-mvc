<?php


class CatalogController
{
    public function actionIndex()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {

        $navCategories = array();
        $navCategories = Category::getNavCategoryList();


        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }
}