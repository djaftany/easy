<?php
include_once "auth.php"; // Authenticate first
include_once "../app/user/User.php";
include_once "../app/user/UserDao.php";
include_once "../app/connection/ConnectionFactory.php";

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        return save();
    case "GET":
        return get();
    case "DELETE":
        return delete();
    default:
        echo "The requested method " . $_SERVER["REQUEST_METHOD"] . " is not supported.";
}

function save()
{
    $data = json_decode(file_get_contents("php://input"));

    try {
        $factory = new ConnectionFactory();
        $dao = new UserDao($factory->getConnection());

        //sha1 returns password encrypted
        $user = new User("USER", $data->name, $data->email, sha1($data->password));

        $dao->save($user);

        echo json_encode($user);
    } catch (Exception $e) {
        echo json_encode(null);
    }
}


function get()
{
    $email = $_GET["email"];

    try {
        $factory = new ConnectionFactory();
        $dao = new UserDao($factory->getConnection());
        $user = $email ? $dao->getByEmail($email) : $dao->getAll();

        echo json_encode($user);
    } catch (Exception $e) {
        echo json_encode(null);
    }
}

function delete()
{
    $email = $_GET["email"];

    try {
        $factory = new ConnectionFactory();
        $dao = new UserDao($factory->getConnection());
        $user = $dao->getByEmail($email);
        $dao->delete($user);

        echo json_encode($user);
    } catch (Exception $e) {
        echo json_encode(null);
    }
}
