<?php

class CategoriesModel
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
     * Get all categories from database
     */
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories ORDER BY CategoryPosition";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getCategory($category_id)
    {
        $sql = "SELECT * FROM categories WHERE CategoryID = :category_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':category_id' => $category_id));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetch();
    }

    /**
     * Add a category to database
     */
    public function addCategory($categoryname)
    {
        // clean the input from javascript code for example
        $categoryname = strip_tags($categoryname);
        
        $sql = "INSERT INTO categories (CategoryName) VALUES (:categoryname)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':categoryname' => $categoryname));
    }

    /**
     * Delete a category in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     */
    public function deleteCategory($category_id)
    {
        $sql = "DELETE FROM categories WHERE CategoryID = :category_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':category_id' => $category_id));
    }
    
    /**
     * Update category record in the database
     */
    public function updateCategory($categoryid,$categoryname,$categoryposition)
    {
      // clean the input from javascript code for example
      $categoryname = strip_tags($categoryname);
      
      $sql = "UPDATE categories SET CategoryName = :categoryname, CategoryPosition = :categoryposition WHERE CategoryID = :categoryid";
      $query = $this->db->prepare($sql);
      $query->execute(array(':categoryid' => $categoryid,':categoryname' => $categoryname,':categoryposition' => $categoryposition));
    }
    
}