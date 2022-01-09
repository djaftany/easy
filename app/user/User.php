<?php

/**
 * É a classe que representa o usuário no sistema.
 * Está com poucos atributos porque são estes que interessam do momento.
 * 
 */
class User implements JsonSerializable
{
    private $role;
    private $name;
    private $email;
    private $password;

    public function __construct($role, $name, $email, $password)
    {
        if (empty($name)) throw new Exception("name can not be empty");
        if (empty($email)) throw new Exception("email can not be empty");
        if (empty($password)) throw new Exception("password can not be empty");


        $this->role = $role;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->setPassword = $password;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
