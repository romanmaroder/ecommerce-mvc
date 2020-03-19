<?php

    /**
     * Контроллер CabinetController
     * Кабинет пользователя
     */
    class CabinetController
    {
        /**
         * Action для страницы "Кабинет пользователя"
         */
        public function actionIndex()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);

            //Выводим заголовок страницы
            $title ='Личный кабинет';

            //Подключаем стили страницы
            $styleLink = '/template/css/cabinet.css';
            // Подключаем вид
            require_once( ROOT . '/views/cabinet/index.php' );
            return true;
        }

        /**
         * Action для страницы "Редактирование данных пользователя"
         */
        public function actionEdit()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем информацию о пользователе из Бд
            $user = User::getUserById($userId);

            $name = $user['name'];
            $password = $user['password'];

            $result = false;

            if ( isset($_POST['submit']) ) {
                $name = $_POST['name'];
                $password = $_POST['password'];

                $errors = false;

                if ( !User::checkName($name) ) {
                    $errors[] = 'Имя не должно быть короче 2-х символов';
                }

                if ( !User::checkPassword($password) ) {
                    $errors[] = 'Пароль не может быть короче 6-ти символов';
                }

                if ( $errors == false ) {
                    $result = User::edit($userId, $name, $password);
                }
            }

            require_once( ROOT . '/views/cabinet/edit.php' );

            return true;
        }

        /**
         * Action для страницы просмотра истории заказа в личном кабинете
         * @return bool
         */
        public function actionHistory()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);

            // Получаем список заказов пользователя
            $ordersList = Order::getOrderListById($userId);


            require_once( ROOT . '/views/cabinet/history.php' );

            return true;

        }

        /**
         * Action для страницы "Просмотр заказа в истории пользоа"
         */
        public function actionView($id)
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            // Получаем данные о конкретном заказе
            $order = Order::getOrderById($id);

            // Получаем массив с идентификаторами и количеством товаров
            $productsQuantity = json_decode($order['products'], true);

            // Получаем массив с индентификаторами товаров
            $productsIds = array_keys($productsQuantity);

            // Получаем список товаров в заказе
            $products = Product::getProductsByIds($productsIds);

            //Счетчик общей стоимости и общего кол-ва товара в заказе
            $total = 0;
            $count = 0;

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            $ordersList = Order::getOrderListById($userId);

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);
            // Подключаем вид
            require_once( ROOT . '/views/cabinet/view.php' );
            return true;
        }
    }