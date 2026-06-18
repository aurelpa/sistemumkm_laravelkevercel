<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "KERNEL OK";
} catch (Throwable $e) {
    echo "<pre>";
    echo $e->getMessage();
    echo "\n\n";
    echo $e->getTraceAsString();
}