<?php

class JurymarksModel
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
    
    // addMarks(jury id, school id, category id, points)
    public function addMarks($user_id, $school_id, $category_id, $schedule_id, $points)
    {   
        $sql = "INSERT INTO jurymarks(UserID, SchoolID, CategoryID, ScheduleID, JurymarkPoints) VALUES (:userid, :schoolid, :categoryid, :scheduleid, :points)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userid' => $user_id, ':schoolid' => $school_id, ':scheduleid' => $schedule_id, ':categoryid' => $category_id, ':scheduleid' => $schedule_id, ':points' => $points ));
    }

    public function getMarksByUser($user_id)
    {
        $sql = "SELECT * FROM jurymarks WHERE UserID = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':userid' => $user_id ));
        return $query->fetchAll();
    }
    
    public function getMarksAudit($user_id, $school_id, $category_id)
    {
        $sql = "SELECT * FROM jurymarks WHERE UserID = :userid AND SchoolID = :schoolid AND CategoryID = :categoryid";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':userid' => $user_id, ':schoolid' => $school_id, ':categoryid' => $category_id ) );
        return $query->fetch();
    }

    public function getAllMarksAudit($school_id, $category_id)
    {
        $sql = "SELECT SUM(JurymarkPoints) AS TotalPoints FROM jurymarks WHERE SchoolID = :schoolid AND CategoryID = :categoryid";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':schoolid' => $school_id, ':categoryid' => $category_id ) );
        return $query->fetch();
    }

}