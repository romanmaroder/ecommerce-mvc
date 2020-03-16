<?php


    /**
     * Class News
     * Управление новостями
     */
    class News
    {
        /**
         * Возвращает новость с указаным id
         * $param integer $id
         */
        public static function getNewsItemById($id)
        {
            $id = intval($id);

            if ( $id ) {

                $db = Db::getConnection();

                $result = $db->query(" SELECT * FROM news WHERE id='$id' ");
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $newsList = $result->fetch();

                return $newsList;
            }
        }

        /**
         * Returns an array of news item
         */
        public static function getNewsList()
        {
            $db = Db::getConnection();

            $newsList = array();

            $result = $db->query(" SELECT id, title, date, short_content, content, author_name, type, visible
                FROM news 
                ORDER BY id DESC 
                LIMIT 10");

            $i = 0;
            while ( $row = $result->fetch() ) {
                $newsList[$i]['id'] = $row['id'];
                $newsList[$i]['title'] = $row['title'];
                $newsList[$i]['date'] = $row['date'];
                $newsList[$i]['content'] = $row['content'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $newsList[$i]['author_name'] = $row['author_name'];
                $newsList[$i]['type'] = $row['type'];
                $newsList[$i]['visible'] = $row['visible'];
                $i++;
            }

            return $newsList;
        }

        public static function getNewsListAdmin()
        {
            $db = Db::getConnection();

            $newsList = array();

            $result = $db->query(" SELECT * FROM news ORDER BY id  ");

            $i = 0;
            while ( $row = $result->fetch() ) {
                $newsList[$i]['id'] = $row['id'];
                $newsList[$i]['title'] = $row['title'];
                $newsList[$i]['date'] = $row['date'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $newsList[$i]['content'] = $row['content'];
                $newsList[$i]['author_name'] = $row['author_name'];
                $newsList[$i]['type'] = $row['type'];
                $newsList[$i]['visible'] = $row['visible'];

                $i++;
            }

            return $newsList;
        }

        public static function getImage($id)
        {
            //название изображения пустышки
            $noImage = 'no-image.jpg';

            // Путь к папке с изображением
            $path = '/upload/images/news/';

            //путь к изображения
            $pathToNewsImage = $path . $id . '.jpg';

            if ( file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToNewsImage) ) {
                //Если изображение существует - возвращаем путь к изображению
                return $pathToNewsImage;
            }

            //Возвращаем путь изображения пустышки
            return $path . $noImage;

        }

        public static function updateNewsById($id, $options)
        {
            //Соединение с БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "UPDATE news
                SET
                    title = :title,
                    date = NOW(),
                    short_content = :short_content,
                    content = :content,
                    author_name = :author,
                    visible = :visible
                WHERE id = :id";

            //Получение и сохранение результата
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
            $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
            $result->bindParam(':author', $options['author_name'], PDO::PARAM_STR);
            $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);
            return $result->execute();
        }

        /**
         * Удаляет новость по $id
         * @param $id <p>индентификатор выбраной новости</p>
         * @return bool
         */
        public static function deleteOrderById($id)
        {
            //Соединение с БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "DELETE  FROM news  WHERE id = :id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        /**
         * Возвращает текстовое пояснение статуса новости
         * @param int $visible <p>Статус</p>
         * @return string <p>Текстовое пояснение</p>
         */
        public static function getStatusText($visible)
        {
            switch ($visible) {
                case '1':
                    return 'Выводить на главную';
                    break;
                case '2':
                    return 'Выводить в блог';
                    break;
                case '3':
                    return 'Не выводить';
                    break;
            }
        }

        /**
         * Добавляет новую новость
         * @param array $options <p>Массив с информацией о новости</p>
         * @return int <p>id добавленной в таблицу записи</p>
         */
        public static function createNews($options)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = "INSERT INTO news 
                    (title, short_content, content, author_name,  visible) VALUES (:title, :short_content,:content,:author,                                  :visible)";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
            $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
            $result->bindParam(':author', $options['author_name'], PDO::PARAM_STR);
            $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);

            if ($result->execute()) {
                // Если запрос выполенен успешно, возвращаем id добавленной записи
                return $db->lastInsertId();
            }
            // Иначе возвращаем 0
            return 0;
        }



    }