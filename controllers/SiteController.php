<?php


    class SiteController
    {
        /**
         * @param int $categoryId
         * @return bool
         */
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

            $newsList = array();
            $newsList = News::getNewsList();

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);

            if (isset($_POST['emailSubscribe'])) {

                $email = $_POST['emailSubscribe'];

                $subscribe = User::getSubscribe($email);
            }

            //Подключаем вид
            require_once(ROOT . '/views/site/index.php');

            return true;
        }

        /**
         * @return bool
         */
        public function actionContact()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            $userEmail = '';
            $userText = '';
            $result = false;

            if (isset($_POST['submit'])) {

                $userEmail = $_POST['userEmail'];
                $userText = $_POST['userText'];

                $errors = false;

                //Валидация полей
                if (!User::checkEmail($userEmail)) {
                    $errors[] = 'Неправильный email';
                }

                if ($errors == false) {
                    $adminEmail = 'php.kashik.roman@rambler.ru';
                    $message = "Текст: {$userText}. От {$userEmail}";
                    $subject = 'Тема письма';
                    $result = mail($adminEmail, $subject, $message);
                    $result = true;
                }
            }
            require_once(ROOT . '/views/site/contact.php');

            return true;
        }

        /**
         * @param int $categoryId
         * @return bool
         */
        public function actionAjax($categoryId = 1)
        {

            $ajaxProducts = array();
            $ajaxProducts = Product::getProductsByCategory($categoryId);

            $ajaxProducts = array();
            $ajaxProducts = Product::getProductsListByCategory($categoryId);

            require_once(ROOT . '/views/site/ajax.php');

            return true;
        }


    }