<?php
    /**
     * Функция __autoload для автоматического подключения классов
     */
    function autoload($class_name)
    {
        // Массив папок, в которых могут находиться необходимые классы
        $array_path = array('/models/', '/components/',
                            '/controllers/',);

        // Проходим по массиву папок
        foreach ($array_path as $path) {

            // Формируем имя и путь к файлу с классом
            $path = ROOT . $path . $class_name . '.php';

            // Если такой файл существует, подключаем его
            if (file_exists($path)) {
                include_once $path;
            }
        }
    }

    spl_autoload_register('autoload');