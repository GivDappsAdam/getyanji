<?php

/**
 * Created by PhpStorm.
 * User: AdamMacdonald
 * Date: 4/14/17
 * Time: 7:15 PM
 */
class Database
{
    private $dbhost = 'www.getyanji.com';
    private $dbname = 'Amac03yanji';
    private $dbpass = 'getyanji17$';
    private $dbuser = 'root';

    private $mysqli;

    function __construct()
    {
    }

    function connect(){
        $this->mysqli = new \mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if($this->mysqli->connect_errno){
            trigger_error('Database connection failed: ' . $this->mysqli->connect_error, E_USER_ERROR);
            exit();
        }
    }

    /**
     * @return string
     */
    public function getDbhost()
    {
        return $this->dbhost;
    }

    /**
     * @param string $dbhost
     */
    public function setDbhost($dbhost)
    {
        $this->dbhost = $dbhost;
    }

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return string
     */
    public function getDbpasw()
    {
        return $this->dbpasw;
    }

    /**
     * @param string $dbpasw
     */
    public function setDbpasw($dbpasw)
    {
        $this->dbpasw = $dbpasw;
    }

    /**
     * @return string
     */
    public function getDbuser()
    {
        return $this->dbuser;
    }

    /**
     * @param string $dbuser
     */
    public function setDbuser($dbuser)
    {
        $this->dbuser = $dbuser;
    }

    /**
     * @return mixed
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }

    /**
     * @param mixed $mysqli
     */
    public function setMysqli($mysqli)
    {
        $this->mysqli = $mysqli;
    }


}
