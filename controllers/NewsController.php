<?php


class NewsController
{
    public function actionIndex()
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        //Получаем индитификатор пользователя из сессии
        $userId = User::checkLogged();

        //Получаем индитификатор пользователя из БД
        $user = User::getUserById($userId);
        $newsList = array();
        $newsList = News::getNewsList();

        //Заголовок страницы
        $title = 'Блог';

        //Подключаем стили страницы
        $styleLink = '/template/css/news.css';

        //Подключаем вид
        require_once(ROOT . '/views/news/index.php');

//        echo '<pre>';
//        print_r($newsList);
//        echo '</pre>';

        return true;
    }

    public function actionView($id)
    {
        $navCategories = array();
        $navCategories = Category::getNavCategoryList();

        //Получаем индитификатор пользователя из сессии
        $userId = User::checkLogged();

        //Получаем индитификатор пользователя из БД
        $user = User::getUserById($userId);

        if ($id) {
            $newsItem = News::getNewsItemById($id);

            //Заголовок страницы
            $title =  $newsItem['title'];

            //Подключаем стили страницы
            $styleLink = '/template/css/news.css';

            //Подключаем вид
            require_once(ROOT . '/views/news/view.php');


//            echo'<pre>';
//            print_r($newsItem);
//            echo'</pre>';

        }
        return true;
    }
}