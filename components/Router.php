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

                // Если есть определить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $path);

                // Получаем название контроллера

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                // Получаем название action
                $actionName = 'action' . ucfirst(array_shift($segments));

                // Подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект
                $controllerObject = new $controllerName;

                // Вызвать метод ( т.е action)
                $result = $controllerObject->$actionName();
                if ($result != null) {
                    break;
                }
            }
        }
    }
}