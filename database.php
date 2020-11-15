<?php

/**
 * @author Abdul Aziz Sapra
 * @version 1.0.0, 05/05/07
 */





class Database
{

    private $_dbh;
    private $_stmp;

    function __construct()
    {
        /*
        * You can add your own credentials here. I have given an example for this.
        *$this->_dbh=new PDO("mysql:host=localhost;dbname=topSecretGovtProjectDatabase", "root", "");
        */
        $this->_dbh = new PDO("mysql:host=hostname;dbname=your_database_name", "username", "password");
    }
    function query($query = "")
    {
        $this->_stmp = $this->_dbh->prepare($query);
    }
    function bind($placeholder = "", $value = "")
    {

        $this->_stmp->bindvalue($placeholder, $value);
    }
    function run()
    {
        return $this->_stmp->execute();
    }
    function getLastInsertedId()
    {

        return $this->_dbh->lastInsertId();
    }
    function all()
    {
        $this->run();
        return $this->_stmp->fetchall();
    }
    function single()
    {
        $this->run();
        return $this->_stmp->fetch();
    }
}
