<?php
$config = [
    'server' => 'localhost',
    'name' => 'new_board',
    'username' => 'root',
    'password' => 'qwe123!',
    'charset' => 'UTF8'
];



try {
    $pdo = new PDO(
        "mysql:host=" . $config['server'] . ";dbname=" . $config['name'] . "; charset=" . $config['charset'],
        $config['username'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
