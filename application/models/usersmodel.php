<?php

class UsersModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get users from database based on the logins
     */
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users ORDER BY LevelID";
        $query = $this->db->prepare($sql);
        $query->execute();                                        
        return $query -> fetchAll();
    }

    public function getJudges()
    {
        $sql = "SELECT * FROM users WHERE LevelID = 2 ORDER BY UserName";
        $query = $this->db->prepare($sql);
        $query->execute();                                        
        return $query -> fetchAll();
    }

    public function getJuries()
    {
        $sql = "SELECT * FROM users WHERE LevelID = 1 ORDER BY UserName";
        $query = $this->db->prepare($sql);
        $query->execute();                                        
        return $query -> fetchAll();
    }
    
    public function addUser($userlogin, $username, $userpassword, $levelid, $schoolid)
    {   
        $sql = "INSERT INTO users(UserLogin, UserName, UserPassword, LevelID, SchoolID) VALUES (:userlogin, :username, :userpassword, :levelid, :schoolid)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userlogin' => $userlogin, ':username' => $username, ':userpassword' => $userpassword, ':levelid' => $levelid, ':schoolid' => $schoolid ));
    }

    /**
     * Update user record in the database
     */
    public function updateUser($userlogin, $username, $userpassword, $levelid, $schoolid, $userid)
    {      
      $sql = "UPDATE users SET UserLogin = :userlogin, UserName = :username, UserPassword = :userpassword, LevelID = :levelid, SchoolID = :schoolid WHERE UserID = :userid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':userlogin' => $userlogin, ':username' => $username, ':userpassword' => $userpassword, ':levelid' => $levelid, ':schoolid' => $schoolid, ':userid' => $userid));
    }
    
    public function deleteUser($user_id)
    {
      $sql = "DELETE FROM users WHERE UserID = :user_id";
      $query = $this->db->prepare($sql);
      $query->execute(array(':user_id' => $user_id));
    }
    
    public function getLogin($user_login, $user_password)
    {
        // (we check if the password fits the password_hash via password_verify() some lines below)
        $query = $this->db->prepare("SELECT * FROM users WHERE UserLogin = :UserLogin AND UserPassword = :UserPassword");
        $query->execute(array(':UserLogin' => $user_login, ':UserPassword' => $user_password));
        // fetch one row (we only have one result)
        return $query->fetch();
    }

}