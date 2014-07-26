<?php

/**
 * Class Admin
 * Controls all methods when a user logs in as Admin
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Admin extends Controller
{
    /**
     * http://poopoo/admin/index     
     */
    public function index()
    {
      // load metadata model to grab day switch status
      $meta_model = $this->loadModel('MetaModel');
      $metavalue = $meta_model->getMetaValue('DaySwitch');
      $daySwitch = $metavalue[0] -> MetaValue;
      
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

      // load views for dashboard
      require 'application/views/_templates/header.php';
      require 'application/views/admin/nav.php';
      require 'application/views/admin/index.php';
      require 'application/views/_templates/footer.php';
    }

    public function index2()
    {
      // load metadata model to grab day switch status
      $meta_model = $this->loadModel('MetaModel');
      $metavalue = $meta_model->getMetaValue('DaySwitch');
      $daySwitch = $metavalue[0] -> MetaValue;
      
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

      // load views for dashboard
      require 'application/views/_templates/header.php';
      require 'application/views/admin/nav.php';
      require 'application/views/admin/index2.php';
      require 'application/views/_templates/footer.php';
    }

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
      
      // load views for dashboard
      require 'application/views/_templates/header.php';
      require 'application/views/admin/nav.php';
      require 'application/views/admin/index3.php';
      require 'application/views/_templates/footer.php';
    }

    /**
     * This method displays the schools
     * http://poopoo/admin/schools     
     */
    public function schools()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models for schools, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $schools_model = $this->loadModel('SchoolsModel');
        $schools = $schools_model->getAllSchools();

        // load views for schools
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/schools.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * This action adds a school to the schools database
     * http://poopoo/admin/addSchool     
     */        
    public function addSchool()
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

    /**
     * This action deletes a school from the schools database
     * http://poopoo/admin/deleteSchool/(school id)
     */        
    public function deleteSchool($school_id)
    {
        // if we have an id of a school that should be deleted
        if (isset($school_id)) {
            // load model, perform an action on the model
            $schools_model = $this->loadModel('SchoolsModel');
            $schools_model->deleteSchool($school_id);
        }

        // where to go after record has been deleted
        header('location: ' . URL . 'admin/schools');
    }

    /**
     * This action updates a school record in the schools database
     * http://poopoo/admin/updateSchool/
     */        
    public function updateSchool()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_update_school"])) {
            // load model, perform an action on the model
            $schools_model = $this->loadModel('SchoolsModel');
            $schools_model->updateSchool($_POST["schoolid"],$_POST["schoolname"]);
        }

        // where to go after record has been added
        header('location: ' . URL . 'admin/schools');
    }

    /**
     * This method displays the categories
     * http://poopoo/admin/categories
     */
    public function categories()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models for categories, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $categories_model = $this->loadModel('CategoriesModel');
        $categories = $categories_model->getAllCategories();

        // load views for schools
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/categories.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * This action adds a category to the category database
     * http://poopoo/admin/addCategory
     */        
    public function addCategory()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_category"])) {
            // load model, perform an action on the model
            $categories_model = $this->loadModel('CategoriesModel');
            $categories_model->addCategory($_POST["categoryname"]);
        }

        // where to go after school has been added
        header('location: ' . URL . 'admin/categories');
    }

    /**
     * This action deletes a category from the categories database
     * http://poopoo/admin/deleteCategory/(school id)
     */        
    public function deleteCategory($category_id)
    {
        // if we have an id of a record that should be deleted
        if (isset($category_id)) {
            // load model, perform an action on the model
            $categories_model = $this->loadModel('CategoriesModel');
            $categories_model->deleteCategory($category_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/categories');
    }

    /**
     * This action updates a record in the categories database
     * http://poopoo/admin/updateCategory/
     */        
    public function updateCategory()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_update_category"])) {
            // load model, perform an action on the model
            $categories_model = $this->loadModel('CategoriesModel');
            $categories_model->updateCategory($_POST["categoryid"],$_POST["categoryname"],$_POST["categoryposition"]);
        }

        // where to go after record has been updated
        header('location: ' . URL . 'admin/categories');
    }

    public function elements()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models for elements, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $elements_model = $this->loadModel('ElementsModel');
        $elements = $elements_model->getAllElements();

        // load views for elements
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/elements.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * This action adds a element to the elements database
     * http://poopoo/admin/addElement
     */        
    public function addElement()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_element"])) {
            // load model, perform an action on the model
            $elements_model = $this->loadModel('ElementsModel');
            $elements_model->addElement($_POST["elementname"], $_POST["elementcode"]);
        }

        // where to go after school has been added
        header('location: ' . URL . 'admin/elements');
    }

    /**
     * This action deletes a element from the elements database
     * http://poopoo/admin/deleteElement/(school id)
     */        
    public function deleteElement($element_id)
    {
        // if we have an id of a record that should be deleted
        if (isset($element_id)) {
            // load model, perform an action on the model
            $elements_model = $this->loadModel('ElementsModel');
            $elements_model->deleteElement($element_id);
        }

        // where to go after record has been deleted
        header('location: ' . URL . 'admin/elements');
    }

    /**
     * This action updates a record in the elements database
     * http://poopoo/admin/updateElement/
     */        
    public function updateElement()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_update_element"])) {
            // load model, perform an action on the model
            $elements_model = $this->loadModel('ElementsModel');
            $elements_model->updateElement($_POST["elementid"],$_POST["elementname"],$_POST["elementcode"]);
        }

        // where to go after record has been updated
        header('location: ' . URL . 'admin/elements');
    }

    /**
     * This method displays the percentages
     * http://poopoo/admin/percentages     
     */
    public function percentages()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        // get all categories
        $categories_model = $this->loadModel('CategoriesModel');
        $categories = $categories_model->getAllCategories();
        // get all elements
        $elements_model = $this->loadModel('ElementsModel');
        $elements = $elements_model->getAllElements();
        // load percentages model
        $percentages_model = $this->loadModel('PercentagesModel');
        
        // load views for percentages
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/percentages.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function addPercentages()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_percentages"])) {
            // load model, perform an action on the model
            $percentages_model = $this->loadModel('PercentagesModel');
            $percentages_model->addPercentages($_POST["categoryid"], $_POST["elementid"], $_POST["percentagevalue"]);
        }

        // where to go after record has been added
        header('location: ' . URL . 'admin/percentages');
    }
                                                                 
    public function updatePercentages()
    {
      // if this data was submitted 
      if (isset($_POST["submit_update_percentages"])) {                                                     
        // if new record, run insert model                                                                       
        $percentages_model = $this->loadModel('PercentagesModel');
        $percentages_model->updatePercentages($_POST["percentageid"], $_POST["elementid"], $_POST["percentagevalue"]);
      }

      // where to go after record has been updated
      header('location: ' . URL . 'admin/percentages');
    }

    public function deletePercentage($id)
    {
        // if we have an id of a record that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $percentages_model = $this->loadModel('PercentagesModel');
            $percentages_model->deletePercentage($id);
        }

        // where to go after record has been deleted
        header('location: ' . URL . 'admin/percentages');
    }
    
    public function schedules($schedule_day)
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        // get all categories
        $schools_model = $this->loadModel('SchoolsModel');
        $schools = $schools_model->getAllSchools();
        // get all categories
        $categories_model = $this->loadModel('CategoriesModel');
        $categories = $categories_model->getAllCategories();
        // load schedules model
        $schedules_model = $this->loadModel('SchedulesModel');
        $strScheduleDay = $schedule_day;
                        
        // load views for percentages
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/schedules.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function addSchedule()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_schedule"])) {
            // load model, perform an action on the model
            $schedules_model = $this->loadModel('SchedulesModel');
            $schedules_model->addSchedule($_POST["scheduleday"], $_POST["schoolid"], $_POST["categoryid"], $_POST["scheduleslot"]);
        }

        // where to go after record has been added
        header('location: ' . URL . 'admin/schedules/' . $_POST["scheduleday"]);
    }
    
    public function deleteSchedule($schedule_id)
    {
        // if we have an id of a record that should be deleted
        if (isset($schedule_id)) {
            // load model, perform an action on the model
            $schedules_model = $this->loadModel('SchedulesModel');
            $schedules_model->deleteSchedule($schedule_id);
        }

        // where to go after record has been deleted
        header('location: ' . URL . 'admin/schedules/' . $_POST["scheduleday"]);
    }

    /**
     * This action updates a record in the schedules database
     * http://poopoo/admin/updateSchedule/
     */        
    public function updateSchedule()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_update_schedule"])) {
            // load model, perform an action on the model
            $schedules_model = $this->loadModel('SchedulesModel');
            $schedules_model->updateSchedule($_POST["schoolid"],$_POST["categoryid"],$_POST["scheduleslot"], $_POST["scheduleid"]);
        }

        // where to go after record has been updated
        header('location: ' . URL . 'admin/schedules/' . $_POST["scheduleday"]);
    }

    public function users()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load models, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        // get all schools
        $schools_model = $this->loadModel('SchoolsModel');
        $schools = $schools_model->getAllSchools();                                                                                   
        // load users model
        $users_model = $this->loadModel('UsersModel');
                        
        // load views for percentages
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/users.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function addUser()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_user"])) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->addUser($_POST["userlogin"], $_POST["username"], $_POST["userpassword"], $_POST["levelid"], $_POST["schoolid"]);
        }

        // where to go after record has been added
        header('location: ' . URL . 'admin/users');
    }
    
    public function deleteUser($user_id)
    {
        // if we have an id of a record that should be deleted
        if (isset($user_id)) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->deleteUser($user_id);
        }

        // where to go after record has been deleted
        header('location: ' . URL . 'admin/users');
    }

    /**
     * This action updates a record in the users database
     * http://poopoo/admin/updateUser/
     */        
    public function updateUser()
    {
        // if we have POST data to create a new entry
        if (isset($_POST["submit_update_user"])) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $users_model->updateUser($_POST["userlogin"], $_POST["username"], $_POST["userpassword"], $_POST["levelid"], $_POST["schoolid"], $_POST["userid"]);
        }

        // where to go after record has been updated
        header('location: ' . URL . 'admin/users');
    }

    public function verify()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load views for dashboard
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/auditor/verify.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function mark()
    {
        // load metadata model to grab day switch status
        $meta_model = $this->loadModel('MetaModel');
        $metavalue = $meta_model->getMetaValue('DaySwitch');
        $daySwitch = $metavalue[0] -> MetaValue;
        
        // load views for dashboard
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/auditor/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function winners()
    {   
        // load views for dashboard
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/auditor/winners.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function switchDay()                                 
    {
        if (isset($_POST["submit_switch_day"])) {
            // load model, perform an action on the model
            $meta_model = $this->loadModel('MetaModel');
            $meta_model->updateMetaValue('DaySwitch', $_POST["submit_switch_day"]);
        }

        // where to go after record has been updated
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    
}