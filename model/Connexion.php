<?php

class Connexion
{

    private string $hostname;
    private string $dbname;
    private string $usertag;
    private string $pwd;


    public function __construct(){

        $this->hostname= 'localhost';
        $this->dbname= 'exampdo';
        $this->usertag= 'zeel';
        $this->pwd= 'zeel';

    }

    public function connexion(){

        $pdo = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname.'', $this->usertag, $this->pwd);

       return $pdo;
    }

}