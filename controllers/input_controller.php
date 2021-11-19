<?php
//connect to post class
include_once (dirname(__FILE__)).'/../classes/input_class.php';

// Inserting a new post
function createInput($input){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->create($input);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function getInputs(){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->getInputs();

    if($runQuery){
        $searchs = array();
        while($record = $search->db_fetch()){
            $searchs[] = $record;
        }
        return $searchs;
    }else{
        return false;
    }
}

function getSearchTerm($id){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->getSearchTerm($id);

    if($runQuery){

        $searchs = $search->db_fetch();
        if(!empty($searchs)){
            return $searchs;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function getSearch($term){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->getSearch($term);

    if($runQuery){

        $searchs = $search->db_fetch();
        if(!empty($searchs)){
            return $searchs;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateSearch($id, $input){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->updateSearch($id, $input);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deleteSearch($id){
    // Create new post object
    $search = new Search;

    // Run query
    $runQuery = $search->deleteSearch($id);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}
?>