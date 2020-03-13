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
                    author_name = :author

                WHERE id = :id";

            //Получение и сохранение результата
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
            $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
            $result->bindParam(':author', $options['author_name'], PDO::PARAM_STR);
            return $result->execute();
        }
    }