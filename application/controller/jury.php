<?php

/**
 * Class Jury
 * Controls all methods when a user logs in as a Jury 
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Jury extends Controller
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
      
      // load schools model
      $schools_model = $this->loadModel('SchoolsModel');

      // load jurymarks model
      $jurymarks_model = $this->loadModel('JurymarksModel');

      // load views for jury
      require 'application/views/_templates/header.php';
      require 'application/views/jury/index.php';
      require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: http://poopoo/jury/mark/
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

      $categories_model = $this->loadModel('CategoriesModel');
      $categories = $categories_model->getCategory($categoryid);
      
      // load views
      require 'application/views/_templates/header.php';
      require 'application/views/jury/mark.php';
      require 'application/views/_templates/footer.php';
      
    }

    public function addMarks()
    {
      if(isset($_POST['submit_add_marks'])) {
        // load model, perform an action on the model
        $jurymarks_model = $this->loadModel('JurymarksModel');
        // addMarks(jury id, school id, category id, points)
        $jurymarks_model->addMarks($_POST['userid'], $_POST['schoolid'], $_POST['categoryid'], $_POST["scheduleid"], $_POST["jurymarkpoints"] );
        
        header('location: ' . URL . 'jury/index');
        
      }
      
    }
}