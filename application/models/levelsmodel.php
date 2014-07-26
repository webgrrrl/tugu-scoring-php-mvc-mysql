<?php

class LevelsModel
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
     * Get levels from database
     */
    public function getAllLevels()
    {
        $sql = "SELECT * FROM levels";
        $query = $this->db->prepare($sql);
        $query->execute();                                        
        return $query -> fetchAll();
    }

    /**
     * Add a record to database
     */
    public function addLevel($levelname, $levellevel)
    {   
        $sql = "INSERT INTO levels(LevelName, LevelLevel) VALUES (:levelname, :levellevel)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':levelname' => $levelname, ':levellevel' => $levellevel ));
    }

    /**
     * Update level record in the database
     */
    public function updateLevel($levelname, $levellevel, $levelid)
    {      
      $sql = "UPDATE levels SET LevelName = :levelname, LevelLevel = :levellevel WHERE LevelID = :levelid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':levelname' => $levelname, ':levellevel' => $levellevel, ':levelid' => $levelid ));
    }
    
    public function deleteLevel($level_id)
    {
      $sql = "DELETE FROM levels WHERE LevelID = :level_id";
      $query = $this->db->prepare($sql);
      $query->execute(array(':level_id' => $level_id));
    }
    
}