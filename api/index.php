<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

try {
    echo "<pre>";

    echo "Laravel: ".app()->version().PHP_EOL;

    echo "View binding: ";
    var_dump($app->bound('view'));

    echo PHP_EOL;

    echo "Bindings containing view:".PHP_EOL;

    $bindings = array_keys($app->getBindings());

    foreach ($bindings as $binding) {
        if (str_contains($binding, 'view')) {
            echo $binding.PHP_EOL;
        }
    }

} catch (Throwable $e) {
    echo $e->getMessage();
}