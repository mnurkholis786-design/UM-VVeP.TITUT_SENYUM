<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$admin = \App\Models\User::where('role', 'Admin')->first();
\Illuminate\Support\Facades\Auth::login($admin);

$controller = new \App\Http\Controllers\Admin\AdminController();

try {
    // When no dates
    $resNoFilter = $controller->report();
    echo "report() no filter view: " . $resNoFilter->name() . "\n";
    echo "count: " . $resNoFilter->getData()['submission']->count() . "\n";
} catch (\Throwable $e) {
    echo "report() no filter ERROR: " . $e->getMessage() . "\n";
}

// When dates are in request query string
$_GET['from_date'] = '2026-01-01';
$_GET['target_date'] = '2026-12-31';

try {
    $resWithFilter = $controller->report();
    echo "report() with filter view: " . $resWithFilter->name() . "\n";
} catch (\Throwable $e) {
    echo "report() with filter ERROR: " . $e->getMessage() . "\n";
}
