<?php

    /**
     * Class Product для работы с товарами
     */
    class Product
    {
        public const SHOW_BY_DEFAULT = 6;


        /**
         * Возвращает массив последних товаров
         *
         * @param int $count [optional] <p>Количество</p>
         *
         * @return array
         */
        public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        {

            $count = intval($count);

            $db = Db::getConnection();

            $productList = array();

            $result = $db->query("SELECT id, name, description, price, content FROM product  ORDER BY id ASC 
                            LIMIT " . $count . " ");

            $i = 0;

            while ($row = $result->fetch()) {
                $productList[$i]['id'] = $row['id'];
                $productList[$i]['name'] = $row['name'];
                $productList[$i]['description'] = $row['description'];
                $productList[$i]['content'] = $row['content'];
                $productList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productList;
        }

        /**
         * Возвращает список товаров в указанной категории
         *
         * @param int $categoryId <p>Индитификатор категории</p>
         *
         * @param int $page
         * @return array <p>Список товаров по выбранной категории</p>
         */
        public static function getProductsListByCategory($categoryId, $page = 1)
        {
            if ($categoryId) {

                $page = intval($page);

                $offset = ( $page - 1 ) * self::SHOW_BY_DEFAULT;

                $db = Db::getConnection();

                $products = array();

                if ($categoryId == 1) {
                    $result = $db->query("SELECT id, cat_id, name, price, description, content FROM product
                        ORDER BY RAND()  LIMIT " . self::SHOW_BY_DEFAULT . "  OFFSET  $offset ");
                } else {
                    $result = $db->query("SELECT id, name, price, description, content FROM product WHERE 
                       cat_id = '" . $categoryId . "'  ORDER BY id ASC LIMIT  " . self::SHOW_BY_DEFAULT . "  OFFSET  $offset ");
                }
                $i = 0;
                while ($row = $result->fetch()) {
                    $products[$i]['id'] = $row['id'];
                    $products[$i]['name'] = $row['name'];
                    $products[$i]['price'] = $row['price'];
                    $products[$i]['description'] = $row['description'];
                    $products[$i]['content'] = $row['content'];
                    $i++;
                }

            }
            return $products;

        }

        /**
         * Возвращает список товаров в указанной подкатегории
         *
         * @param int $subcategoryId <p>Индитификатор подкатегории</p>
         *
         * @param int $page
         * @return array <p>Список товаров по выбранной подкатегории</p>
         */
        public static function getProductsListBySubcategory($categoryId, $subcategoryId, $page = 1)
        {
            if ($subcategoryId) {
                $page = intval($page);

                $offset = ( $page - 1 ) * self::SHOW_BY_DEFAULT;

                $db = Db::getConnection();

                $subproducts = array();


                $result = $db->query("SELECT id, name, price, description, content FROM product WHERE cat_id = '" . $categoryId . "' AND
                       sub_id = '" . $subcategoryId . "' ORDER BY id   LIMIT  " . self::SHOW_BY_DEFAULT . "  OFFSET  $offset ");

                $i = 0;
                while ($row = $result->fetch()) {
                    $subproducts[$i]['id'] = $row['id'];
                    $subproducts[$i]['name'] = $row['name'];
                    $subproducts[$i]['price'] = $row['price'];
                    $subproducts[$i]['description'] = $row['description'];
                    $subproducts[$i]['content'] = $row['content'];
                    $i++;
                }
                return $subproducts;

            }
        }

        /**
         * @param $categoryId
         * @param int $count
         * @return array
         */
        public static function getProductsByCategory($categoryId, $count = self::SHOW_BY_DEFAULT)
        {
            if ($categoryId) {


                $db = Db::getConnection();
                $products = array();

                if ($categoryId == 1) {
                    $result = $db->query("SELECT id, name, price, description, content FROM product  ORDER BY RAND()  LIMIT " . $count . " ");
                } else {
                    $result = $db->query("SELECT id, name, price,  description, content FROM product WHERE 
                       cat_id = '" . $categoryId . "' ORDER BY sub_id  DESC LIMIT " . $count . " ");
                }


                $i = 0;
                while ($row = $result->fetch()) {
                    $products[$i]['id'] = $row['id'];
                    $products[$i]['name'] = $row['name'];
                    $products[$i]['price'] = $row['price'];
                    $products[$i]['description'] = $row['description'];
                    $products[$i]['content'] = $row['content'];
                    $i++;
                }
                return $products;
            }
        }

        /**
         * Return product item by id
         *
         * @param integer $id
         *
         * @return mixed
         */
        public static function getProductsById($id)
        {
            $id = intval($id);
            if ($id) {

                $db = Db::getConnection();

                $result = $db->query("SELECT * FROM product WHERE id=" . $id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                return $result->fetch();
            }
        }

        /**
         * Return total products
         *
         * @param $categoryId - id категории товара
         *
         * @return  - кол-во товаров в категории
         */
        public static function getTotalProductsInCategory($categoryId)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT count(id) AS count FROM product WHERE cat_id = '$categoryId' ");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();

            return $row['count'];
        }

        public static function getTotalProductsInSubcategory($categoryId, $subcategoryId)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT count(id) AS count FROM product WHERE cat_id = $categoryId AND sub_id = $subcategoryId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            return $row['count'];
        }

        /**
         * Возвращает список товаров с указанными индентификторами
         * @param array $idsArray <p>Массив с идентификаторами</p>
         * @return array <p>Массив со списком товаров</p>
         */
        public static function getProductsByIds($idsArray)
        {

            // Соединение с БД
            $db = Db::getConnection();

            // Превращаем массив в строку для формирования условия в запросе
            $idsString = implode(',', $idsArray);

            // Текст запроса к БД
            $sql = "SELECT * FROM product WHERE id IN ($idsString)";

            $result = $db->query($sql);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // Получение и возврат результатов
            $i = 0;
            $products = array();
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['color'] = $row['color'];
                $products[$i]['size'] = $row['size'];
                $i++;
            }
            return $products;
        }

        /**
         * Возвращает список товаров
         * @return array <p>Массив с товарами</p>
         */
        public static function getProductsList()
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Получение и возврат результатов
            $result = $db->query('SELECT id, name, price, description FROM product ORDER BY id ASC');
            $productsList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['description'] = $row['description'];
                $i++;
            }
            return $productsList;
        }

        /**
         * Удаляет товар с указанным id
         * @param int $id <p> id товара</p>
         * @return bool <p> Результат выполнения метода</p>
         */
        public static function deleteProductById($id)
        {
            //Соеденение с БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = 'DELETE FROM product WHERE id=:id';

            //Получение и возврат результата
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        /**
         * Добавляет новый товар
         * @param array $options <p>Массив с информацией о товаре</p>
         * @return integer <p> id добавленной в таблицу записи</p>
         */
        public static function createProduct($options)
        {
            //Соединение с БД
            $db = Db::getConnection();

            //Запрос в БД
            $sql = "INSERT INTO product (name, description, content, price, cat_id,sub_id) 
                                VALUES  (:name,:description,:content, :price,:cat_id,:sub_id)";

            //Получаем и возвращаем результат
            $result = $db->prepare($sql);
            $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
            $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
            $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
            $result->bindParam(':cat_id', $options['cat_id'], PDO::PARAM_INT);
            $result->bindParam(':sub_id', $options['sub_id'], PDO::PARAM_INT);
//            $result->bindParam(':sub_name', $options['sub_name'], PDO::PARAM_STR);
            if ($result->execute()) {
                //если запрос выполнен успешно, возвращаем id добавленной записи
                return $db->lastInsertId();
            }
            //иначе вернем 0
            return 0;
        }

        /**
         * Редактирует товар с указаным id
         * @param $id <p>id выбранного товара</p>
         * @param $options <p>опции выбранного товара</p>
         * @return bool <p>Результат работы метода</p>
         */
        public static function updateProductById($id, $options)
        {
            //Соединение с БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "UPDATE product
                SET
                    name = :name,
                    price = :price,
                    description = :description,
                    content = :content,
                    cat_id = :cat_id,
                    sub_id = :sub_id
                    
                WHERE id = :id";

            //Получение и сохранение результата
            $result = $db->prepare($sql);
            $result->bindParam('name', $options['name'], PDO::PARAM_STR);
            $result->bindParam('price', $options['price'], PDO::PARAM_STR);
            $result->bindParam('description', $options['description'], PDO::PARAM_STR);
            $result->bindParam('content', $options['content'], PDO::PARAM_STR);
            $result->bindParam('cat_id', $options['cat_id'], PDO::PARAM_INT);
            $result->bindParam('sub_id', $options['sub_id'], PDO::PARAM_INT);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        public static function getImage($id)
        {
            //название изображения пустышки
            $noImage = 'no-image.jpg';

            // Путь к папке с изображением товара
            $path = '/upload/images/products/';

            //путь к изображения товара
            $pathToProductImage = $path . $id . '.jpg';

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
                //Если изображение существует - возвращаем путь к изображению товара
                return $pathToProductImage;
            }

            //Возвращаем путь изображения пустышки
            return $path . $noImage;

        }
    }