<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Users count: " . App\Models\User::count() . "\n";
foreach (App\Models\User::get() as $u) {
    echo "- " . $u->name . ": " . $u->email . "\n";
}

