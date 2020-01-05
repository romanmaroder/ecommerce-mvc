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

    public function actionEdit()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        //Получаем индитификатор пользователя из сессии
        $userId = User::checkLogged();

        //Получаем информацию о пользователе из Бд
        $user = User::getUserById($userId);

        $name     = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name     = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не может быть короче 6-ти символов';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once (ROOT.'/views/cabinet/edit.php');

        return true;
    }
}