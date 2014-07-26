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
    /**
     * PAGE: index
     * This method handles default or what happens when user logs in as jury i.e. lowest access level 1)
     * http://yourproject/home/index     
     */
    public function index()
    {
        // load views for jury
        require 'application/views/_templates/header.php';
        require 'application/views/jury/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: judge
     * This method handles what happens when you log in as judge level 2
     */
    public function insert()
    {
        // load views for judge
        require 'application/views/_templates/header.php';
        require 'application/views/jury/mark.php';
        require 'application/views/_templates/footer.php';
    }
}