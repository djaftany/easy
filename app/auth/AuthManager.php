<?php

class AuthManager
{
    private $connection;
    private $generator;

    public function __construct($connection, $generator)
    {
        $this->connection = $connection;
        $this->generator = $generator;
    }

    public function createToken($user)
    {

        $stmt = $this->connection->prepare("select id from users where email = ?");
        $stmt->bindValue(1, $user->getEmail());
        $stmt->execute();

        $id = $stmt->fetch()["id"];
        $token = $this->generator->generate();

        $stmt = $this->connection->prepare("insert into tokens (user_id, value) values (?, ?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $token);
        $stmt->execute();

        return $token;
    }
}
