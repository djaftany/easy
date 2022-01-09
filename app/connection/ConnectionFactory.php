<?php

class ConnectionFactory
{

    public function getConnection()
    {
        return new PDO("mysql:host=localhost;dbname=easy", "djafta", "TinkerBel", [PDO::ATTR_ERRMODE]);
    }
}