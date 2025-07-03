<?php

namespace TeamYandex;

spl_autoload_register(function ($class) {
    // Убираем текущее пространство имён (если зарегистрировано внутри него)
    if (str_starts_with($class, __NAMESPACE__ . '\\')) {
        $class = substr($class, strlen(__NAMESPACE__) + 1);
    }

    // Преобразуем namespace в путь
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($file)) {
        include $file;
    }
});
