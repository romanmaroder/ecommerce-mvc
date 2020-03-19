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

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);

            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            //Выводим заголовок страницы
            $title = $category['category_name'];

            //Подключаем вид
            require_once( ROOT . '/views/catalog/category.php' );

            return true;
        }

        public function actionSubcategory($categoryId, $subcategoryId, $page = 1)
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            $total = Product::getTotalProductsInSubcategory($categoryId, $subcategoryId);

            // Получаем массив подкатегорий
            $subcategories = array();
            $subcategories = Category::getSubCategoriesListAdmin();

            $subcategory = Category::getSubCategoryById($subcategoryId);

            $subcategoriesProducts = array();
            $subcategoriesProducts = Product::getProductsListBySubcategory($categoryId, $subcategoryId, $page);


            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);


            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            //Выводим заголовок страницы
            $title = $subcategory['sub_name'];

            require_once( ROOT . '/views/catalog/subcategory.php' );

            return true;
        }
    }


