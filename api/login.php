<?php

include_once "./auth.php";
include_once "../app/user/UserDao.php";
include_once "../app/auth/AuthManager.php";
include_once "../app/auth/TokenGenerator.php";
include_once "../app/connection/ConnectionFactory.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"));

    $factory = new ConnectionFactory();
    $manager = new AuthManager($factory->getConnection(), new TokenGenerator());
    $dao = new UserDao($factory->getConnection());

    $user = $dao->getByEmail($data->email);

    if ($user && $user->getPassword() == sha1($data->password))
        echo json_encode(["token" => $manager->createToken($user)]);
    else echo json_encode(["token" => null]);
} else {
    echo "The requested method " . $_SERVER["REQUEST_METHOD"] . " is not supported.";
}
