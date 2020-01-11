<?php
include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/Product.php');


class SiteController
{
    public function actionIndex($categoryId = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

       $productsByCategory = array();
       $productsByCategory = Product::getProductsByCategory($categoryId);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }





    public function actionContact()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        $userEmail = '';
        $userText  = '';
        $result    = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText  = $_POST['userText'];

            $errors = false;

            //Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'php.kashik.roman@rambler.ru';
                $message    = "Текст: {$userText}. От {$userEmail}";
                $subject    = 'Тема письма';
                $result     = mail($adminEmail, $subject, $message);
                $result     = true;
            }
        }
        require_once(ROOT . '/views/site/contact.php');

        return true;
    }
}