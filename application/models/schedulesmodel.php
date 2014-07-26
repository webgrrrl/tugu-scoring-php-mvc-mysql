<?php

class SchedulesModel
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
     * Get schedules from database based on the days
     */
    public function getSchedules($scheduleday)
    {
        $sql = "SELECT * FROM schedules WHERE ScheduleDay = :scheduleday ORDER BY ScheduleSlot";
        $query = $this->db->prepare($sql);
        $query->execute(array(':scheduleday' => $scheduleday ));                                        
        return $query -> fetchAll();
    }

    public function getScheduleByDay($schedule_day)
    {
        $sql = "SELECT * FROM schedules WHERE ScheduleDay = :scheduleday ORDER BY ScheduleSlot";
        $query = $this->db->prepare($sql);
        $query->execute(array(':scheduleday' => $schedule_day));      
        return $query -> fetchAll();
    }
    
    /** called by jury/index
     * getScheduleByDayJury($scheduleday, $_SESSION['SchoolID'], $filterID);
     * */         
    public function getScheduleByDayJury($schedule_day, $school_id, $schedule_id)
    {
      $sqlNot = "";
      if($schedule_id != "") {
        $explodeID = explode(",", $schedule_id );
        $i = 0;
        $countID = count(explode(",", $schedule_id ));
        while($i < $countID) {
          $sqlNot = $sqlNot . " AND ScheduleID != " . $explodeID[$i] . " ";
          ++$i;
        }
      }
      $sql = "SELECT * FROM schedules WHERE ScheduleDay = :scheduleday AND SchoolID != :schoolid " . $sqlNot . " ORDER BY ScheduleSlot";
      $query = $this->db->prepare($sql);
      $query->execute(array(':scheduleday' => $schedule_day, ':schoolid' => $school_id ));             
      return $query -> fetchAll();
    }

    public function getScheduleByID($schedule_id)
    {
        $sql = "SELECT * FROM schedules WHERE ScheduleID = :scheduleid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':scheduleid' => $schedule_id ));                                        
        return $query -> fetch();
    }
    
    /**
     * Add a category to database
     */
    public function addSchedule($scheduleday, $schoolid, $categoryid, $scheduleslot)
    {   
        $sql = "INSERT INTO schedules(ScheduleDay, SchoolID, CategoryID, ScheduleSlot) VALUES (:scheduleday, :schoolid, :categoryid, :scheduleslot)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':scheduleday' => $scheduleday, ':schoolid' => $schoolid, ':categoryid' => $categoryid, ':scheduleslot' => $scheduleslot ));
    }

    /**
     * Update schedule record in the database
     */
    public function updateSchedule($schoolid, $categoryid, $scheduleslot, $scheduleid)
    {      
      $sql = "UPDATE schedules SET SchoolID = :schoolid, CategoryID = :categoryid, ScheduleSlot = :scheduleslot WHERE ScheduleID = :scheduleid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':schoolid' => $schoolid,':categoryid' => $categoryid,':scheduleslot' => $scheduleslot,':scheduleid' => $scheduleid));
    }
    
    public function deleteSchedule($schedule_id)
    {
      $sql = "DELETE FROM schedules WHERE ScheduleID = :schedule_id";
      $query = $this->db->prepare($sql);
      $query->execute(array(':schedule_id' => $schedule_id));
    }
    
}