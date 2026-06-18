<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

try {
    $view = app('view');
    echo get_class($view);
} catch (Throwable $e) {
    echo "<pre>";
    echo $e->getMessage();
}