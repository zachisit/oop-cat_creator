<?php
/**
 * class Database
 * parent class for database connections
 * uses PDO
 */

namespace Cat;

use PDO;
use PDOException;

require_once 'config.php';

class Database
{
    public $isConnected;//are we connected?
    protected $databaseData;//protected only use in this class
    protected $recordID;//record id in database, used for deleting

    private static $factory = false;
    private $db;

    /**
     * database constructor.
     * @param array $options
     */
    public function __construct(/*$options=[]*/)
    {
        /*$this->isConnected = TRUE;//if true then we connected to db

        //connect to db
        try {
            $this->databaseData = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            $this->databaseData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "connection failed: " . $e->getMessage() . "<br /><br />";
        }*/
    }

    /**
     * Get Factory
     * @return bool|Database
     */
    public static function getFactory()
    {
        if (!self::$factory)
            self::$factory = new Database();
        return self::$factory;
    }

    /**
     * Get Connection
     * @return PDO
     */
    public function getConnection()
    {
        if (!$this->db) {
            $this->db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        }

        return $this->db;
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
     * @param $id
     * @deprecated - moved to \Cat\getSingleCatByID
     */
    public function getRow($id)
    {
        /*try
        {
            $stmt = $this->databaseData->prepare("SELECT * FROM users WHERE id=$id");
            $stmt->execute();
            return $stmt->fetch();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }*/
    }

    /**
     * Get All Rows
     * @return array
     */
    public function getAllRows()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM users");
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
        $db = self::getConnection();

        try
        {
            $stmt = $db->prepare("INSERT INTO users (" . implode(', ', array_keys($data)) . ") VALUES (:" . implode(', :', array_keys($data)) . ")");

            foreach($data as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->execute();
            return 'record created successfully';
        } catch (\PDOException $e) {
            return 'Adding new record failed' . $e->getMessage();
        }
    }

    /**
     * Update Record
     * @param $data
     * @param $where
     * @return string
     */
    public function updateRow($data, $where)
    {
        $db = self::getConnection();
        //var_dump($data);
        //echo '<p></p>';
        //var_dump($where);
        //echo '<p></p>';

        try
        {
            $values = [];
            $qry = "UPDATE users SET";
            foreach($data as $key => $value) {
                $qry .= " {$key}=:{$key},";
                $values[":{$key}"] = $value;
            }
            $qry = rtrim($qry, ',');

            if(!empty($where)){
                $qry .= " WHERE ";

                foreach($where as $key => $value) {
                    $qry .= " {$key}=:{$key} AND";
                    //$qry .= " {$key}=:{$key}";
                    $values[":{$key}"] = $value;
                }

                $qry = substr($qry, 0, -4);
            }

            $stmt = $db->prepare($qry);

            $stmt->execute($values);

            //print_r($stmt);
            //echo '<p></p>';

            //var_dump($stmt->errorInfo());
        } catch (\PDOException $e) {
            //return 'Adding new record failed' . $e->getMessage();
            //@TODO:write to error log
            return $e;
        }
    }

    /**
     * Update Record Row
     * @param $data
     * @param $catID
     * @return string
     */
    /*public function updateRow($data, $catID)
    {
        $db = self::getConnection();

        try
        {
            foreach($data as $key => $value) {
                $columns[] = '' . $key . '=' . $value;
            }

            $stmt = $db->prepare("UPDATE users SET " . implode(', ', $columns). " WHERE id=:catID");

            print_r($stmt);

            foreach($data as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }

            $stmt->bindValue(':catID', $catID, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            return 'Adding new record failed' . $e->getMessage();
        }

    }*/

    /**
     * Delete Database Row
     * @param $query
     */
    public function deleteRow($id)
    {
        //@TODO:using wrong way to pass in variable, refer to updateRow()
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