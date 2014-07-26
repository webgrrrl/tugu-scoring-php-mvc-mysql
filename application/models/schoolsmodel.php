<?php

class SchoolsModel
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
        $sql = "SELECT * FROM schools ORDER BY SchoolLevel, SchoolName";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getSchoolByID($school_id)
    {
        $sql = "SELECT * FROM schools WHERE SchoolID = :schoolid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':schoolid' => $school_id ));                                        
        return $query -> fetch();
    }

    public function getSchoolsByLevel($school_level)
    {
      if($school_level == "0") {
        $sql = "SELECT * FROM schools ORDER BY SchoolName";
      } else {
        $sql = "SELECT * FROM schools WHERE SchoolLevel = :schoollevel ORDER BY SchoolName";
      }
      $query = $this->db->prepare($sql);
      $query->execute(array(':schoollevel' => $school_level ));                                        
      return $query -> fetchAll();
    }
    
    /**
     * Add a school to database
     * @param string $school SchoolName
     */
    public function addSchool($schoolname, $schoollevel)
    {
        // clean the input from javascript code for example
        $school = strip_tags($school);
        
        $sql = "INSERT INTO schools (SchoolName, SchoolLevel) VALUES (:schoolname, :schoollevel)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':schoolname' => $schoolname, ':schoollevel' => $schoollevel));
    }

    /**
     * Delete a school in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     */
    public function deleteSchool($school_id)
    {
        $sql = "DELETE FROM schools WHERE SchoolID = :school_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':school_id' => $school_id));
    }
    
    /**
     * Update school record in the database
     */
    public function updateSchool($schoolid, $schoolname)
    {
      // clean the input from javascript code for example
        $sql = "UPDATE schools SET SchoolName = :schoolname WHERE SchoolID = :schoolid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':schoolid' => $schoolid,':schoolname' => $schoolname));
    }
    
}