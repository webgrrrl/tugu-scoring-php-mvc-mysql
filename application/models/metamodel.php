<?php

class MetaModel
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
     * Get the meta value based on the meta name
     */
    public function getMetaValue($meta_name)
    {
        $sql = "SELECT MetaValue FROM metadata WHERE MetaName = :metaname";
        $query = $this->db->prepare($sql);
        $query->execute(array(':metaname' => $meta_name));
        return $query->fetchAll();
    }

    public function updateMetaValue($meta_name, $meta_value)
    {
        $sql = "UPDATE metadata SET MetaValue = :metavalue WHERE MetaName = :metaname";
        $query = $this->db->prepare($sql);
        $query->execute(array(':metaname' => $meta_name, ':metavalue' => $meta_value ));
        return $query->fetchAll();
    }
}