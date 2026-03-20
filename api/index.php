<?php

// Définir le chemin de base
define('LARAVEL_START', microtime(true));

// Charger l'autoloader
require __DIR__ . '/../vendor/autoload.php';

// Charger l'application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Lancer le kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);