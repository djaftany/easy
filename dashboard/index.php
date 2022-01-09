<?php
require_once "../app/user/UserDao.php";
require_once "../app/connection/ConnectionFactory.php";

$token = $_COOKIE["easy_auth_token"];
$factory = new ConnectionFactory();
$dao = new UserDao($factory->getConnection());

$user = $dao->getByToken($token);

if (!$user) {
    header("Location: login.php");
    die;
}

switch ($user->getRole()) {
    case "ADMIN":
        include "admin.php";
        break;
    case "USER":
        include "user.php";
        break;
}
