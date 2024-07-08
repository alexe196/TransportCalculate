<?php

try {
    unset($argv[0]);


    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../src/' . $className . '.php';
    });


    $className = '\\car\\cli\\' . array_shift($argv);
    if (!class_exists($className)) {
        throw new \car\Exceptions\CliException('Class "' . $className . '" not found');
    }


    $params = [];
    foreach ($argv as $argument) {
        preg_match('/^-(.+)=(.+)$/', $argument, $matches);
        if (!empty($matches)) {
            $paramName = $matches[1];
            $paramValue = $matches[2];

            $params[$paramName] = $paramValue;
        }
    }


    $class = new $className($params);
    $class->execute();
} catch (\car\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}
