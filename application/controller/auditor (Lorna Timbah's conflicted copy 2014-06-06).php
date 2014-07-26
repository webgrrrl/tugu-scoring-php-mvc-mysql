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
     * This method handles default or what happens when user logs in as jury i.e. lowest access level 1)
     * http://yourproject/home/index     
     */
    public function index()
    {
        // load views for jury
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: judge
     * This method handles what happens when you log in as judge level 2
     */
    public function judge()
    {
        // load views for judge
        require 'application/views/_templates/header.php';
        require 'application/views/home/judge.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: auditor
     * This method handles what happens when you log in as auditor level 4
     */
    public function auditor()
    {
        // load views for auditor
        require 'application/views/_templates/header.php';
        require 'application/views/home/nav_reports.php';
        require 'application/views/home/auditor.php';
        require 'application/views/_templates/footer.php';
    }                                                         
    
    /**
     * PAGE: admin
     * This method handles what happens when you log in as admin level 8
     */
    public function admin()
    {
        // load views for admin
        require 'application/views/_templates/header.php';
        require 'application/views/home/nav_reports.php';
        require 'application/views/home/nav_housekeeping.php';
        require 'application/views/home/admin.php';
        require 'application/views/_templates/footer.php';
    }
}
