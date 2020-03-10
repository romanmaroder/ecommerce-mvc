<?php


    class AdminNewsController extends AdminBase
    {
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            $newsList = array();
            $newsList = News::getNewsListAdmin();

            require_once( ROOT . '/views/admin_news/index.php' );
            return true;
        }
    }