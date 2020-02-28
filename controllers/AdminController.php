<?php


    /**
     * Class AdminController
     * Главная страница в админпанели
     */
    class AdminController extends AdminBase
    {
        /**
         * Action для стартовой страницы "панель администратора"
         */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            //Подключение вида
            require_once(ROOT . '/views/admin/index.php');
            return true;
        }
    }