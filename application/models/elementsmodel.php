<?php

class ElementsModel
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
     * Get all elements from database
     */
    public function getAllElements()
    {
        $sql = "SELECT * FROM elements ORDER BY ElementName";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getElement($element_id)
    {
        $sql = "SELECT * FROM elements WHERE ElementID = :elementid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':elementid' => $element_id));
        return $query->fetch();
    }
    
    public function addElement($elementname, $elementcode)
    {
        $sql = "INSERT INTO elements (ElementName, ElementCode) VALUES (:elementname, :elementcode)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':elementname' => $elementname, ':elementcode' => $elementcode));
    }

    /**
     * Delete a element in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     */
    public function deleteElement($element_id)
    {
        $sql = "DELETE FROM elements WHERE ElementID = :element_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':element_id' => $element_id));
    }
    
    /**
     * Update element record in the database
     */
    public function updateElement($elementid, $elementname, $elementcode)
    {
      // clean the input from javascript code for example
      $elementname = strip_tags($elementname);
      $elementcode = strip_tags($elementcode);
      
      $sql = "UPDATE elements SET ElementName = :elementname, ElementCode = :elementcode WHERE ElementID = :elementid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':elementid' => $elementid,':elementname' => $elementname,':elementcode' => $elementcode));
    }
    
}