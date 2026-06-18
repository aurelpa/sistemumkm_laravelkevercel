<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    $request = Illuminate\Http\Request::capture();

    $response = $kernel->handle($request);

    echo "HANDLE OK";
} catch (Throwable $e) {
    echo "<pre>";
    echo "ERROR:\n\n";
    echo $e->getMessage();
    echo "\n\nFILE: " . $e->getFile();
    echo "\nLINE: " . $e->getLine();
    echo "\n\nTRACE:\n";
    echo $e->getTraceAsString();
}