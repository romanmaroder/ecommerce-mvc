<?php


class UserController
{
    public function actionRegister()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();


        $name     = '';
        $email    = '';
        $password = '';
        $result = false;

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

            if(User::checkEmailExist($email)) {
                $errors[] ='Такой E-mail уже используеться';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }
}