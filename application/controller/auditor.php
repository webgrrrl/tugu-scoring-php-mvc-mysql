<?php

/**
 * Class Auditor
 * Controls all methods when a user logs in as a Auditor 
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Auditor extends Controller
{

    public function index()
    {
      $selectedLevel = "0";
      $selectedJudge = "0";
      
      if(isset($_POST["submit_filter_view"])) {
        $selectedLevel = $_POST["schoollevel"];
        $selectedJudge = $_POST["judgeid"];
      }
      // load schools models for listing
      $schools_model = $this->loadModel('SchoolsModel');

      // load judges for listing
      $users_model = $this->loadModel('UsersModel');
      $judges = $users_model->getJudges();
      
      // load percentages for creative and tradition teams
      $percentages_model = $this -> loadModel('PercentagesModel');

      // load element codes for creative and tradition teams
      $elements_model = $this -> loadModel('ElementsModel');

      // load views for auditor
      require 'application/views/_templates/header.php';
      require 'application/views/auditor/nav.php';
      require 'application/views/auditor/index.php';
      require 'application/views/_templates/footer.php';
    }

    /** auditor/index2
     * for when the auditor needs to verify scores for kreatif & tradisi
     * */          
    public function index2()
    {
      $selectedLevel = "0";
      $selectedJudge = "0";
      
      if(isset($_POST["submit_filter_view"])) {
        $selectedLevel = $_POST["schoollevel"];
        $selectedJudge = $_POST["judgeid"];
      }
      // load schools models for listing
      $schools_model = $this->loadModel('SchoolsModel');

      // load judges for listing
      $users_model = $this->loadModel('UsersModel');
      $judges = $users_model->getJudges();
      
      // load percentages for creative and tradition teams
      $percentages_model = $this -> loadModel('PercentagesModel');

      // load element codes for creative and tradition teams
      $elements_model = $this -> loadModel('ElementsModel');
      
      // load views for auditor
      require 'application/views/_templates/header.php';
      require 'application/views/auditor/nav.php';
      require 'application/views/auditor/index2.php';
      require 'application/views/_templates/footer.php';
    }
    
    /** auditor/index3
     * for when the auditor needs to verify scores by the jury
     * */          
    public function index3()
    {
      $selectedLevel = "0";
      $selectedJury = "0";
      
      if(isset($_POST["submit_filter_view"])) {
        $selectedLevel = $_POST["schoollevel"];
        $selectedJury = $_POST["juryid"];
      }
      // load schools models for listing
      $schools_model = $this->loadModel('SchoolsModel');

      // load judges for listing
      $users_model = $this->loadModel('UsersModel');
      $juries = $users_model->getJuries();
                                                      
      // load judges for listing
      $categories_model = $this->loadModel('CategoriesModel');
      $categories = $categories_model->getAllCategories();
      
      // load scores model for jury
      $jurymarks_model = $this -> loadModel('JurymarksModel');
      
      // load views for auditor
      require 'application/views/_templates/header.php';
      require 'application/views/auditor/nav.php';
      require 'application/views/auditor/index3.php';
      require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: auditor
     * This method handles what happens when you log in as auditor level 2
     */
    public function winners()
    {
        // load views for auditor
        require 'application/views/_templates/header.php';
        require 'application/views/auditor/nav.php';
        require 'application/views/auditor/winners.php';
        require 'application/views/_templates/footer.php';
    }
}