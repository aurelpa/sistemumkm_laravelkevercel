<?php

// =============================================================
// api/index.php — Laravel Serverless Entry Point for Vercel
// =============================================================

// Load Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the Laravel application
$app = require __DIR__ . '/../bootstrap/app.php';

// Create the HTTP kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capture the current request
$request = Illuminate\Http\Request::capture();

// Handle the request and get the response
$response = $kernel->handle($request);

// Send the response back to the client
$response->send();

// Terminate the kernel
$kernel->terminate($request, $response);
