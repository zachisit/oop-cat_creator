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

    //get one single row
    //@todo pipe in row id via var
    public function getRow($query, $params = [])
    {
        /*try
        {
            $stmt = $this->databaseData->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();//not fetchall since only one row
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }*/
    }

    /**
     * Get All Rows
     * @param $query
     * @return array
     */
    public function getRows($query)
    {
        try
        {
            $stmt = $this->databaseData->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Insert New Record
     * @param $data
     */
    public function insertRow($data) {
        try
        {
            $stmt = $this->databaseData->prepare("INSERT INTO users (" . implode(', ', array_keys($data)) . ") VALUES (:" . implode(', :', array_keys($data)) . ")");

            foreach($data as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->execute();
            echo 'record created successfully';
        } catch (\PDOException $e) {
            echo 'Adding new record failed' . $e->getMessage();
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

        try
        {
            $stmt = $this->databaseData->prepare("DELETE FROM users WHERE id = '{$id}'");
            //@TODO: check if record exists first, create if/else around this
            $stmt->execute();
            echo 'record deleted successfully';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}