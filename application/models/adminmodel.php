<?php

class AdminModel
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
     * Get all participants from database
     */
    public function getAllSchools()
    {
        $sql = "SELECT * FROM schools";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a school to database
     */
    public function addSchool($school)
    {
        // clean the input from javascript code for example
        $school = strip_tags($school);
        
        $sql = "INSERT INTO schools (SchoolName) VALUES (:school)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':school' => $school);
    }

    /**
     * Delete a school in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $school_id Id of school
     */
    public function deleteSchool($school_id)
    {
        $sql = "DELETE FROM schools WHERE SchoolID = :school_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':school_id' => $school_id));
    }
}