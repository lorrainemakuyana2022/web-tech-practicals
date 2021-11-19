<?php
//connect to database class
require_once (dirname(__FILE__)).'/../settings/db_class.php';

class Search extends db_connection {

    public function create($input){
        // sql query
        $sql = "INSERT INTO `practical_lab_table` (`search_term`) VALUES ('$input')";

        // run query
        return $this->db_query($sql);
    }

    public function getInputs(){
        //sql query
        $sql = "SELECT * FROM `practical_lab_table`";

        //run query
        return $this->db_query($sql);
    }

    public function getSearchTerm($id){
        // sql query
        $sql = "SELECT * FROM `practical_lab_table` WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function getSearch($find){
        // sql query
        $sql = "SELECT * FROM `practical_lab_table` WHERE `search_term`='$find'";

        // run query
        return $this->db_query($sql);
    }

    public function updateSearch($id, $input){
        // sql query
        $sql = "UPDATE `practical_lab_table` SET `search_term`='$input' WHERE `lab_id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function deleteSearch($id){
        // sql query
        $sql = "DELETE FROM `practical_lab_table` WHERE `lab_id`='$id'";

        // run query
        return $this->db_query($sql);
    }
}

?>