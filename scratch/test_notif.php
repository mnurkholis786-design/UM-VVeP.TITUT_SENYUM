<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$admin = App\Models\User::where('role', 'Admin')->where('email', 'admin@gmail.com')->first();
if ($admin) {
    echo "Admin ID: {$admin->id}, Email: {$admin->email}\n";
    $notifs = App\Models\Notification::where('user_id', $admin->id)->get();
    echo "Notifs count: {$notifs->count()}\n";
    foreach ($notifs as $n) {
        echo "- ID: {$n->id}, Title: {$n->title}, Type: {$n->type}, is_read: {$n->is_read}\n";
    }
}
