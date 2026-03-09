<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Username");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

function getConnection() {
    $host     = "localhost";
    $dbname   = "versement_db";
    $user     = "manatsoa_user";
    $password = "manatsoa123";

    try {
        $pdo = new PDO(
            "pgsql:host=$host;dbname=$dbname",
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $pdo;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => "Connexion échouée : " . $e->getMessage()]);
        exit();
    }
}
