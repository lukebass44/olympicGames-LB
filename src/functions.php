<?php

/* Add your functions here */

// have to include config.php for login credentials
include ('/home/lbass/public_html/olympicGames-LB/config/config.php');


function dbConnect(){
    /* defined in config/config.php */
    /*** connection credentials *******/
    $servername = SERVER;
    $username = USERNAME;
    $password = PASSWORD;
    $database = DATABASE;
    $dbport = PORT;
    /****** connect to database **************/

    try {
        $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4;port=$dbport", $username, $password);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $db;
}


// fetch all of the games (includes year and season) on database
function getYear($db)  {

    try {
        $stmt = $db->prepare("SELECT games_name FROM games ORDER BY games_name DESC");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 
    catch (Exception $e) {
        echo $e;
    }

}


// gets all sports on database
function getSports($db) {

    try {
        $stmt = $db->prepare("SELECT sport_name FROM sport ORDER BY sport_name");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 
    catch (Exception $e) {
        echo $e;
    }    

}


// gets all the cities on db and alphabetizes them
function getCityNames($db){

    try {
        $stmt = $db->prepare("SELECT city_name FROM city ORDER BY city_name");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 
    catch (Exception $e) {
        echo $e;
    }    

}


// gets all countries/regions alphabetically to populate select menu
function getRegions($db) {

    try {
        $stmt = $db->prepare("SELECT region_name FROM noc_region ORDER BY region_name");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 
    catch (Exception $e) {
        echo $e;
    }

}

?>