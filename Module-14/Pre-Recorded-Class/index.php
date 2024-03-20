<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$users = [
    [
        'email' => 'admin@doe.com',
        'name' => 'Admin',
        'password' => 'admin',
        'role' => 'admin',
        'token' => hash('sha256', 'admin')
    ],
    [
        'email' => 'john@doe.com',
        'name' => 'John Doe',
        'password' => 'john',
        'role' => 'editor',
        'token' => hash('sha256', 'john')
    ],
    [
        'email' => 'jane@doe.com',
        'name' => 'Jane Doe',
        'password' => 'jane',
        'role' => 'editor',
        'token' => hash('sha256', 'jane')
    ]
];

// Check if data is sent as JSON payload or form data
$jsonData = file_get_contents("php://input");
$data = !empty($jsonData) ? json_decode($jsonData, true) : $_POST;

if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            echo json_encode([
                'success' => 1,
                'name' => $user['name'],
                'username' => $user['email'],
                'role' => $user['role'],
                'token' => $user['token']
            ]);
            exit;
        }
    }
}

echo json_encode([
    'success' => 0,
    'error' => 'Invalid credentials'
]);