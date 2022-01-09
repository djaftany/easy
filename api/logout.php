<?php

include_once "./auth.php";
include_once "../app/user/UserDao.php";
include_once "../app/auth/AuthManager.php";
include_once "../app/auth/TokenGenerator.php";
include_once "../app/connection/ConnectionFactory.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = $_REQUEST["token"];

    $factory = new ConnectionFactory();
    $manager = new AuthManager($factory->getConnection(), new TokenGenerator());
    $dao = new UserDao($factory->getConnection());

    $user = $dao->getByToken($token);

    if ($user) {
        $manager->deleteTokens($user);
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo "The requested method " . $_SERVER["REQUEST_METHOD"] . " is not supported.";
}
