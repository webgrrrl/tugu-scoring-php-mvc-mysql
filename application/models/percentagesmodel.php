<?php

class PercentagesModel
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
     * Get all percentages from database
     */
    public function getPercentage($categoryid, $elementid)
    {
        $sql = "SELECT * FROM percentages WHERE CategoryID = :categoryid AND ElementID = :elementid ORDER BY PercentageValue DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':categoryid' => $categoryid, ':elementid' => $elementid ));                                        
        return $query -> fetch();
    }
                                                                                                                                                        
    public function getPercentages($categoryid)
    {
        $sql = "SELECT * FROM percentages WHERE CategoryID = :categoryid ORDER BY PercentageValue DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':categoryid' => $categoryid));                                        
        return $query -> fetchAll();
    }
                                                                                                                                                        
    public function getPercentageMark($categoryid)
    {
        $sql = "SELECT * FROM percentages WHERE CategoryID = :categoryid ORDER BY PercentageValue DESC";
        $query = $this->db->prepare($sql);
        $query->execute(array(':categoryid' => $categoryid));                                        
        return $query -> fetchAll();
    }

    /**                                                                                                                                                 
     * Add a category to database
     */
    public function addPercentages($categoryid,$elementid,$percentagevalue)
    {   
        $sql = "INSERT INTO percentages(CategoryID, ElementID, PercentageValue) VALUES (:categoryid,:elementid,:percentagevalue)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':categoryid' => $categoryid, ':elementid' => $elementid, ':percentagevalue' => $percentagevalue ));
    }

    /**
     * Update percentage record in the database
     */
    public function updatePercentages($percentageid, $elementid, $percentagevalue)
    {      
      $sql = "UPDATE percentages SET ElementID = :elementid, PercentageValue = :percentagevalue WHERE PercentageID = :percentageid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':percentagevalue' => $percentagevalue, ':elementid' => $elementid, ':percentageid' => $percentageid));
    }
    
    public function deletePercentage($percentageid)
    {      
      $sql = "DELETE FROM percentages WHERE PercentageID = :percentageid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':percentageid' => $percentageid));
    }
}