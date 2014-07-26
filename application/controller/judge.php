<?php

/**
 * Class Judge
 * Controls all methods when a user logs in as a Judge 
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Judge extends Controller
{
    public function index()
    {
      // load metadata model to grab day switch status
      $meta_model = $this->loadModel('MetaModel');
      $metavalue = $meta_model->getMetaValue('DaySwitch');
      $daySwitch = $metavalue[0] -> MetaValue;

      if(isset($schedule_day)) { $scheduleday = $schedule_day; } else { $scheduleday = $daySwitch; }
      // load schedules model
      $schedules_model = $this->loadModel('SchedulesModel');
      $schedules = $schedules_model -> getScheduleByDay($scheduleday);
      
      // load schools model
      $schools_model = $this->loadModel('SchoolsModel');

      // load views for judge
      require 'application/views/_templates/header.php';
      require 'application/views/judge/index.php';
      require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: judge
     * This method handles what happens when you log in as judge level 2
     */
    public function mark($scheduleid)
    {
      //load schedules model to get record
      $schedules_model = $this->loadModel('SchedulesModel');
      $schedules = $schedules_model->getScheduleByID($scheduleid);
      // get cat id from schedule
      $categoryid = $schedules -> CategoryID;
      // get school id from schedule
      $schoolid = $schedules -> SchoolID;
      // load schools model
      $schools_model = $this->loadModel('SchoolsModel');
      $schools = $schools_model -> getSchoolByID($schoolid);      

      // load percentages model
      $percentages_model = $this->loadModel('PercentagesModel');
      $percentages = $percentages_model -> getPercentageMark($categoryid);

      $categories_model = $this->loadModel('CategoriesModel');
      $categories = $categories_model->getCategory($categoryid);
        
      $elements_model = $this->loadModel('ElementsModel');
        
        // load views for judge
        require 'application/views/_templates/header.php';
        require 'application/views/judge/mark.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function addJudgeMark()
    {
        // if we have POST data to create a new school entry
        if (isset($_POST["submit_add_school"])) {
            // load model, perform an action on the model
            $schools_model = $this->loadModel('SchoolsModel');
            $schools_model->addSchool($_POST["schoolname"], $_POST["schoollevel"]);
        }

        // where to go after school has been added
        header('location: ' . URL . 'admin/schools');
    }
}