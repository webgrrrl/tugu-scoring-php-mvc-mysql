<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * http://poopoo/login/index
     * By default will always check if login exists in db
     * then sets all the session ids
     * and forwards to proper pages based on login levels          
     */
    public function index()
    {
      /* put login values into variables for easy reference */
      if( isset($_POST['userlogin']) ) { $loginid = $_POST['userlogin']; } else { $loginid = ""; } 
      if( isset($_POST['userpassword']) ) { $loginpassword = $_POST['userpassword']; } else { $loginpassword = ""; }
      if($loginid == "" || $loginpassword == "") { 
        header( 'location: ' . URL ); 
      } else { 
        // load users model before validating login record
        $users_model = $this->loadModel('UsersModel');
        $users = $users_model -> getLogin($loginid, $loginpassword);
        if($users) {
          // login process, write the user data into session
          session_start();
          $_SESSION['UserID'] = $users -> UserID;
          $_SESSION['UserLogin'] = $loginid;
          $_SESSION['UserName'] = $users -> UserName;
          $_SESSION['LevelID'] = $users -> LevelID;
          /* if schoolid exist, load school model and add schoolname as session */
          $_SESSION['SchoolID'] = $users -> SchoolID;
          if($_SESSION['SchoolID'] != 0) {
            $schools_model = $this -> loadModel('SchoolsModel');
            $school = $schools_model -> getSchoolByID($_SESSION['SchoolID']);
            $_SESSION['SchoolName'] = $school -> SchoolName;
          }
          
          switch($_SESSION['LevelID']) {
            case 1: header('location: ' . URL . 'jury/'); break;
            case 2: header( 'location: ' . URL . 'judge/' ); break;
            case 3: header( 'location: ' . URL . 'auditor/' ); break;
            case 4: header( 'location: ' . URL . 'admin/' ); break;
            default: header( 'location: ' . URL ); break;
          }
      
        } else {
          header( 'location: ' . URL ); 
        }
      }
    }
    
    /**
     * http://poopoo/login/logout
     * obviously
     */
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        // redirect user to base URL
        header('location: ' . URL);
    }
    
}