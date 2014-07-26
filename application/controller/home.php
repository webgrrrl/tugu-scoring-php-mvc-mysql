<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://poopoo/home/index (which is the default page btw)
     */
    
    public function index()
    {
      if( isset($_POST['loginid']) ) { $loginid = $_POST['loginid']; } else { $loginid = ""; }
      if($loginid == "jury" ) {
        header('location: ' . URL . 'jury/');
      } elseif($loginid == "judge" ) {
        header( 'location: ' . URL . 'judge/' );
      } elseif($loginid == "auditor" ) {
        header( 'location: ' . URL . 'auditor/' );
      } elseif($loginid == "admin" ) {
        header( 'location: ' . URL . 'admin/' );
      } else {
          // always show the login page by default
          require 'application/views/_templates/header.php';
          require 'application/views/home/index.php';
          require 'application/views/_templates/footer.php';
      }
    }

    /**
     * The login action, when you do login/login
     */
    public function login()
    {
      if(isset($_POST['submit_login'])) {
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('LoginsModel');
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = $login_model->checkLogin($_POST['userlogin'], $_POST['userpassword']);

        // check login status
        if ($login_successful) {
          // if YES, then move user to based on user levels (btw this is a browser-redirection, not a rendered view!)
          $loginid = $_SESSION['UserLogin'];
          if($loginid == "jury" ) {
            header('location: ' . URL . 'jury/');
          } elseif($loginid == "judge" ) {
            header( 'location: ' . URL . 'judge/' );
          } elseif($loginid == "auditor" ) {
            header( 'location: ' . URL . 'auditor/' );
          } elseif($loginid == "admin" ) {
            header( 'location: ' . URL . 'admin/' );
          } else {
            // always show the login page by default
            $_SESSION["feedback_negative"] = 3;
            header( 'location: ' . URL . 'home/index' );
          }
        } else {
          // if NO, then move user to login/index (login form) again
          header('location: ' . URL . 'home/index');
        }
      }
    }

    /**
     * The logout action, login/logout
     */
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        // redirect user to base URL
        header('location: ' . URL);
    }
    
}