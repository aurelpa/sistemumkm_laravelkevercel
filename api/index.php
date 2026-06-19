<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

echo "<pre>";

echo "Laravel: " . $app->version() . PHP_EOL;

echo "Loaded Providers:" . PHP_EOL;

print_r(array_keys($app->getLoadedProviders()));