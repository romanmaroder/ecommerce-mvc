<?php


    /**
     * Class CartController для работы с корзиной
     */
    class CartController
    {
        /**
         * Action для добавления товара в корзину синхронным запросом<br/>
         * (для примера, не используется)
         * @param int $id <p>id товара</p>
         */
        public function actionAdd($id)
        {
            //Добавляем товары в корзину
            Cart::addProduct($id);

            // Возвращаем пользователя на страницу с которой он пришел
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }

        /**
         * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
         * @param int $id <p>id товара</p>
         * @return bool
         */
        public function actionAddAjax($id)
        {
            // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
            echo Cart::addProduct($id);
            return true;
        }

        /**
         * Action для удаления товара в корзину синхронным запросом
         * @param int $id <p>id товара</p>
         * @return bool
         */
        public function actionDelete($id)
        {
            // Удаляем заданный товар из корзины
            Cart::deleteProduct($id);

            //Перенаправляем пользователя в корзину
            header("Location: /cart");
            return true;
        }

        /**
         * Action для страницы "Корзина"
         */
        public function actionIndex()
        {
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            //Получаем индитификатор пользователя из сессии
            $userId = User::checkLogged();

            //Получаем индитификатор пользователя из БД
            $user = User::getUserById($userId);
            // Получием данные из корзины

            $productsInCart = false;

            // Получим идентификаторы и количество товаров в корзине
            $productsInCart = Cart::getProducts();

            if ( $productsInCart ) {
                // Если в корзине есть товары, получаем полную информацию о товарах для списка
                // Получаем массив только с идентификаторами товаров
                $productsIds = array_keys($productsInCart);

                // Получаем массив с полной информацией о необходимых товарах
                $products = Product::getProductsByIds($productsIds);


                //Получаем общую стоимость товара
                $totalPrice = Cart::getTotalPrice($products);

            }

            // Подключаем вид
            $styleLink = '/template/css/cart.css';
            $title = 'Корзина';
            require_once( ROOT . '/views/cart/index.php' );
            return true;

        }

        /**
         * Action для страницы "Оформление покупки"
         */
        public function actionCheckout()
        {

            $productsInCart = Cart::getProducts();

            // Если товаров нет, отправляем пользователи искать товары на главную
            if ( $productsInCart == false ) {
                header("Location: /");
            }

            // Список категорий
            $navCategories = array();
            $navCategories = Category::getNavCategoryList();

            // Находим общую стоимость
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);

            // Количество товаров
            $totalQuantity = Cart::countItems();

            // Поля для формы
            $userName = false;
            $userPhone = false;
            $userComment = false;

            // Статус успешного оформления заказа
            $result = false;

            // Проверяем является ли пользователь гостем
            if ( !User::isGuest() ) {
                // Если пользователь не гость
                // Получаем информацию о пользователе из БД
                $userId = User::checkLogged();
                $user = User::getUserById($userId);
                $userName = $user['name'];
            } else {
                // Если гость, поля формы останутся пустыми
                $userId = false;
            }

            // Обработка формы
            if ( isset($_POST['submit']) ) {
                // Если форма отправлена
                // Получаем данные из формы
                $userName = $_POST['userName'];
                $userPhone = $_POST['userPhone'];
                $userComment = $_POST['userComment'];

                // Флаг ошибок
                $errors = false;

                // Валидация полей
                if ( !User::checkName($userName) ) {
                    $errors[] = 'Неправильное имя';
                }
                if ( !User::checkPhone($userPhone) ) {
                    $errors[] = 'Неправильный телефон';
                }


                if ( $errors == false ) {
                    // Если ошибок нет
                    // Сохраняем заказ в базе данных
                    $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                    if ( $result ) {
                        // Если заказ успешно сохранен
                        // Оповещаем администратора о новом заказе по почте
                        $adminEmail = 'php.start@mail.ru';
                        $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                        $subject = 'Новый заказ!';
                        mail($adminEmail, $subject, $message);

                        // Очищаем корзину
                        Cart::clear();
                    }
                }
            }

            // Подключаем вид
            require_once( ROOT . '/views/cart/checkout.php' );
            return true;
        }

        public function actionClear()
        {
            Cart::clear();
            header("Location: cart/");
            return true;
        }
    }