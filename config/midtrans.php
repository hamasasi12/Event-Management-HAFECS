<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY', 'not set'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'not set'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is_3ds' => env('MIDTRANS_IS_3DS', true),
    // 'test_mode' => env('MIDTRANS_TEST_MODE)', false),

];  