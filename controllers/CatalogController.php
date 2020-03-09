<?php


    class CatalogController
    {
        public function actionIndex()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            $latestProducts = array();
            $latestProducts = Product::getLatestProducts(6);

            require_once( ROOT . '/views/catalog/index.php' );

            return true;
        }

        public function actionCategory($categoryId, $page = 1)
        {

            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            $category = Category::getCategoryList($categoryId);


            $categoryProducts = array();
            $categoryProducts = Product::getProductsListByCategory($categoryId, $page);


            $total = Product::getTotalProductsInCategory($categoryId);

            // Получаем массив подкатегорий
            $subcategories = array();
            $subcategories = Category::getSubCategoriesListAdmin();

            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            require_once( ROOT . '/views/catalog/category.php' );

            return true;
        }

        public function actionSubcategory($categoryId,$subcategoryId,$page = 1)
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();
            $total = Product::getTotalProductsInSubcategory($categoryId,$subcategoryId);

            // Получаем массив подкатегорий
            $subcategories = array();
            $subcategories = Category::getSubCategoriesListAdmin();

            $subcategoriesProducts = array();
            $subcategoriesProducts = Product::getProductsListBySubcategory( $categoryId,$subcategoryId, $page);


            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            require_once( ROOT . '/views/catalog/subcategory.php' );

            return true;
        }
    }


