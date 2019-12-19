<?php



class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     *
     * @return string
     */
    private function getUri()
    {
        // Получить строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        // Получить строку запроса
        $uri = $this->getUri();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

//                echo'<br> Где ищем (запрос, который набрал пользователь): '.$uri;
//                echo'<br> Что ищем (совпадение из правил): ' .$uriPattern;
//                echo'<br> Кто обрабатывает: ' .$path;

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

//                echo'<br><br> Нужно сформировать: ' .$internalRoute. '<br><br>';


                // Если есть определить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                // Получаем название контроллера
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                // Получаем название action
                $actionName = 'action' . ucfirst(array_shift($segments));

//                echo'<br> controller name: ' .$controllerName;
//                echo'<br> action name: ' .$actionName;

                $parametrs = $segments;
//                echo'<pre>';
//                print_r($parametrs);

                // Подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект
                $controllerObject = new $controllerName;

                // Вызвать метод ( т.е action)
                $result = call_user_func_array(array($controllerObject, $actionName),$parametrs);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}