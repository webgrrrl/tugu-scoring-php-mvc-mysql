<?php

class LoginsModel
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
    public function checkLogin($user_login, $user_password)
    {
        // (we check if the password fits the password_hash via password_verify() some lines below)
        $sth = $this->db->prepare("SELECT * FROM users WHERE UserLogin = :UserLogin AND UserPassword = :UserPassword");
        $sth->execute(array(':UserLogin' => $user_login, ':UserPassword' => $user_password));
        // fetch one row (we only have one result)
        $result = $sth->fetch();
        // login process, write the user data into session
        session_start();
        $_SESSION['user_logged_in'] = true;
        $_SESSION['UserLogin'] = $user_login;
        $_SESSION['UserName'] = $result->UserName;
        $_SESSION['LevelID'] = $result->LevelID;
        // return true to make clear the login was successful
        return true;
    }

}