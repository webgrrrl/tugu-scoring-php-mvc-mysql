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
        // load views for dashboard
        require 'application/views/_templates/header.php';
        require 'application/views/admin/nav.php';
        require 'application/views/admin/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * This method displays the schools
     * http://poopoo/admin/schools     
     */
    public function schools()
    {
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
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_school"])) {
            // load model, perform an action on the model
            $schools_model = $this->loadModel('SchoolsModel');
            $schools_model->addSchool($_POST["schoolname"]);
        }

        // where to go after song has been added
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

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/schools');
    }

    /**
     * This action updates a school record in the schools database
     * http://poopoo/admin/updateSchool/(school id)
     */        
    public function updateSchool($school_id, $school_name)
    {
        // if we have an id of a school that should be updated
        if (isset($school_id)) {
            // load model, perform an action on the model
            $schools_model = $this->loadModel('SchoolsModel');
            $schools_model->updateSchool($school_id, $school_name);
        }

        // where to go after school has been updated
        header('location: ' . URL . 'admin/schools');
    }
}