<?php
/**
 * user Class
 * used for user login primarily
 */

namespace Cat;

require 'classDatabase.php';
use PDO;
use PDOException;

class userClass
{
    protected $username;
    protected $password;

    /*public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }*/

    /**
     * User Login
     * @param $usernameEmail
     * @param $password
     * @return bool
     */
    public function userLogin($username, $password)
    {
        $db = Database::getFactory()->getConnection();

        try {
            /*$stmt = $db->prepare("SELECT uid .'
            . 'FROM userLogin .'
            .'WHERE userName=:username. '
            . 'AND userPass=:password");*/
            $stmt = $db->prepare("SELECT uid FROM userLogin WHERE userName=:username AND userPass=:password");

            //@TODO:hash salt password
            $stmt->bindParam(':username', $username,PDO::PARAM_STR) ;
            $stmt->bindParam(':password', $password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;

            if ($count) {
                $_SESSION['uid']=$data->uid; //storing user session value
                return true;
            } else {
                return false;
            }
        } catch(\PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
            error_log('db connection issue', 0);
        }

    }

    /**
     * User Details
     * @param $uid
     * @return mixed
     */
    public function userDetails($uid)
    {
        try{
            $db = Database::getFactory()->getConnection();
            $stmt = $db->prepare("SELECT email FROM userLogin WHERE uid=:uid");
            $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //user data
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    /**
     * Create Password
     * @param int $length
     * @return string
     */
    private function createPassword($length = 50)
    {
        //create random password with 8 alpha characters
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = '';

        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters))];
        }

        return $string;
    }
}
