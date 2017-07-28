<?php
/**
 * class Database
 * parent class for database connections
 * uses PDO
 */

namespace Database;


class database
{
    public $isConnected;//are we connected?
    protected $databaseData;//protected only use in this class

    /**
     * database constructor.
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $dbname
     * @param array $options
     */
    public function __construct($username="zsmith", $password="y47RvFvkBbtm", $host="localhost", $dbname="efs_zach_cat_creator", $options=[])
    {
        $this->isConnected = TRUE;//if true then we connected to db

        //check if connected
        try
        {
            $this->databaseData = new \PDO("mysql:host={$host}; $dbname={$dbname}; charset=utf8", $username, $password, $options);
            //if not connected then provide error
            $this->databaseData->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //set new attribute to fetch
            $this->databaseData->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            //if error then show error message
            throw new \PDOException($e->getMessage());
        }
    }

    /*public function __construct()
    {
        echo "test";
    }*/

    //disconnect from db
    public function disconnect()
    {
        $this->databaseData = NULL;
        $this->isConnected = FALSE;
    }

    //get row
    public function getRow($query, $params = [])
    {
        try
        {
            $stmt = $this->databaseData->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();//not fetchall since only one row
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //get rows
    public function getRows()
    {

    }

    //insert row
    public function insertRow() {

    }

    //update row
    public function updateRow()
    {

    }

    //delete row
    public function deleteRow()
    {

    }
}