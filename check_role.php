<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

try {
    $role = Role::where('name', 'access_seminar')->first();
    if ($role) {
        echo "Role 'access_seminar' exists: " . $role->name . \"\n\";
    } else {
        echo "Role 'access_seminar' does not exist\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . \"\n\";
}
