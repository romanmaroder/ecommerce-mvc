<?php


/**
 * Class UserController
 */
class UserController
{
    /**
     * @return bool
     */
    public function actionRegister()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();


        $name     = '';
        $email    = '';
        $password = '';
        $result   = false;

        if (isset($_POST['submit'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не меньше 6 символов';
            }

            if (User::checkEmailExist($email)) {
                $errors[] = 'Такой E-mail уже используеться';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionLogin()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();


        $email    = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email    = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));

            $errors = false;

            //Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Неправильный password';
            }

            // Проверяем существование пользователя
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                //Если данные не правильные, показываем ошибку
                $errors[] = 'Неправльные данные для входа на сайт';
            } else {
                //Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                //Перенаправляем пользователя в кабинет
                header("Location: /cabinet/");
            }
        }
        require_once(ROOT . '/views/user/login.php');

        return true;
    }


    /**
     * Удаляем пользователя из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
}