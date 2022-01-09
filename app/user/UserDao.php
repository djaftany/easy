<?php
require_once "User.php";

/**
 * Provides the way to persists users on the database using OOP
 * concepts. To use this successfully you must provide an PDO
 * connection throught this constructor as follow:
 * 
 * $dao = new UserDao($connection);
 * 
 * Don't forget to import: 
 * 
 * require_once "'...'/user/UserDao";
 * 
 * The table to this Interface is created with the following sql:
 * 
 * create table users (
 *  id bigint unsigned not null auto_increment,
 *  role enum('USER', 'ADMIN') not null,
 *  name varchar(80) not null,
 *  email varchar(36) not null unique,
 *  password varchar(255) not null,
 *  primary key(id)
 * )
 * 
 * create table tokens (
 *  id bigint unsigned not null auto_increment,
 *  user_id bigint unsigned not null,
 *  value varchar(255) not null unique,
 *  primary key(id),
 *  foreign key(user_id) references users(id)
 * )
 * 
 * Once the id is auto increment is not required to define its value 
 * on insert a row into the table.
 * 
 */
class UserDao
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Saves the user into the database.
     */
    public function save($user)
    {
        $stmt = $this->connection->prepare(
            "insert into users (role, name, email, password) values (?, ?, ?, ?)"
        );
        $stmt->bindValue(1, $user->getRole());
        $stmt->bindValue(2, $user->getName());
        $stmt->bindValue(3, $user->getEmail());
        $stmt->bindValue(4, $user->getPassword());
        $stmt->execute();
    }

    /**
     * Updates the users into the database using the email to locate the row.
     */
    public function update($user)
    {
        $stmt = $this->connection->prepare(
            "update users set role = ?, name = ?, password = ? where email = ?"
        );
        $stmt->bindValue(1, $user->getRole());
        $stmt->bindValue(2, $user->getName());
        $stmt->bindValue(3, $user->getPassword());
        $stmt->bindValue(4, $user->getEmail());

        $stmt->execute();
    }

    /**
     * Deletes the user into the database using the email to locate the row.
     */
    public function delete($user)
    {
        $stmt = $this->connection->prepare("delete from users where email = ?");
        $stmt->bindValue(1, $user->getEmail());

        $stmt->execute();
    }

    /**
     * Returns a user or null corresponding email passed as argument to the method.
     */
    public function getByEmail($email)
    {
        $stmt = $this->connection->prepare("select * from users where email = ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!$result) return null;

        return new User($result["role"], $result["name"], $result["email"], $result["password"]);
    }

    /**
     * Returns a user or null corresponding email passed as argument to the method.
     */
    public function getByToken($token)
    {
        $stmt = $this->connection->prepare(
            "select u.role, u.name, u.email, u.password from users u join tokens t on t.user_id = u.id where t.value = ?"
        );
        $stmt->bindValue(1, $token);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!$result) return null;

        return new User($result["role"], $result["name"], $result["email"], $result["password"]);
    }

    public function getAll()
    {
        $stmt = $this->connection->prepare("select * from users");
        $stmt->execute();
        $results = $stmt->fetchAll();

        $user = [];

        foreach ($results as $result) {
            $user[] =  new User($result["role"], $result["name"], $result["email"], $result["password"]);
        }

        return $user;
    }
}
