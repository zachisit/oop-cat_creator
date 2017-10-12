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
            $stmt->bindParam('username', $username,PDO::PARAM_STR) ;
            $stmt->bindParam('password', $password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count) {
                $_SESSION['uid']=$data->uid; //storing user session value
                return true;
            } else {
                error_log("user login incorrect", 0);
                return false;
            }
        } catch(\PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
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
            $stmt = $db->prepare("SELECT email,username,name FROM userLogin WHERE uid=:uid");
            $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //user data
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}
