<?php


class CabinetController
{
    public function actionIndex()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        //Получаем индитификатор пользователя из сессии
        $userId = User::checkLogged();

        //Получаем индитификатор пользователя из БД
        $user = User::getUserById($userId);

        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }
}