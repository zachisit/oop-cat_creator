<?php
/**
 * class Database
 * parent class for database connections
 * uses PDO
 */

namespace Cat;

use PDO;
use PDOException;

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
    public function __construct($userName='zsmith', $password='y47RvFvkBbtm', $hostName='db01.efsnetworks.com', $dbName='efs_zach_cat_creator', $options=[])
    {
        $this->isConnected = TRUE;//if true then we connected to db

        //connect to db
        try {
            $this->databaseData = new PDO ("mysql:host=$hostName;dbname=$dbName", $userName, $password);
            $this->databaseData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "successfully connectd to db<br /><br />";
        } catch (PDOException $e) {
            echo "connection failed: " . $e->getMessage() . "<br /><br />";
        }
    }

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
            echo $e->getMessage();
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