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
    protected $recordID;//record id in database, used for deleting

    /**
     * Database constructor.
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
        } catch (PDOException $e) {
            echo "connection failed: " . $e->getMessage() . "<br /><br />";
        }
    }

    /**
     * Disconnect from Database
     */
    public function disconnect()
    {
        $this->databaseData = NULL;
        $this->isConnected = FALSE;
    }

    /**
     * Get Row
     * @param $query
     * @param array $params
     */
    //get one single row
    //@todo finish this out
    public function getRow($id)
    {
        try
        {
            $stmt = $this->databaseData->prepare("SELECT * FROM users WHERE id=$id");
            $stmt->execute();
            return $stmt->fetch();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get All Rows
     * @return array
     */
    public function getAllRows()
    {
        try
        {
            $stmt = $this->databaseData->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Return Column Count
     * @param $columnName
     */
    public function returnColumnCount($columnName) {
        try
        {
            $stmt = $this->databaseData->prepare("SELECT COUNT(id) FROM users");
            $stmt->execute();
            $result = $stmt->fetchColumn($columnName);
            echo 'There are '. $result . ' number of records';
        } catch (\PDOException $e) {
            echo 'There was an issue excecuting your query:' . $e->getMessage();
        }

    }

    /**
     * Get Rows By Category
     * @param $columnName
     * @param $columnValue
     */
    //pipe in certain search query to output all rows by
    //i.e., output all rows where Coloring is Brown
    //@TODO:extend to show more than one column
    public function getRowsByCategory($columnName, $columnValue) {
        /*
         * in the cat class, getcatsbyategory
         * also in catclass, valid categories in the cat class
         */

        try
        {
            $stmt = $this->databaseData->prepare("SELECT * FROM users WHERE $columnName = '$columnValue'");
            $stmt->execute();
            //$result = $stmt->fetchAll(PDO::FETCH_CLASS, '\\Cat\\Cat');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($result);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Insert New Record
     * @param $data
     * @return string
     */
    public function insertRow($data) {
        //@TODO: check if not empty data, etc
        try
        {
            $stmt = $this->databaseData->prepare("INSERT INTO users (" . implode(', ', array_keys($data)) . ") VALUES (:" . implode(', :', array_keys($data)) . ")");

            foreach($data as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->execute();
            return 'record created successfully';
        } catch (\PDOException $e) {
            return 'Adding new record failed' . $e->getMessage();
        }
    }

    //update row
    //changes value of existing row
    public function updateRow()
    {

    }

    /**
     * Delete Database Row
     * @param $query
     */
    public function deleteRow($id)
    {
        $this->recordID = $id;

        if ($id == '') {
            return 'invalid delete: record is blank';
        } else {
            try
            {
                $stmt = $this->databaseData->prepare("DELETE FROM users WHERE id = '{$id}'");
                //@TODO: check if record exists first, create if/else around this
                $stmt->execute();
                return 'record deleted successfully';
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
        }

    }
}