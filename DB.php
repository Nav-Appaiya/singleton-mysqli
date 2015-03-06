<?php

/**
 * Created by Nav Appaiya.
 * Date: 06-03-2015
 * Time: 13:14
 */
class DB {
    
    // Holds your instance
    public static $instance;
    
    // Encapsulate the needed attributes
    private static  $username,
                    $password,
                    $database,
                    $host,
                    $mysqli;

    /**
     * These are non-static variables,
     * meaning they are not bind to a instance
     */
    private $query,
            $results = [],
            $count = 0;


    /**
     * Checks if we have a valid instance of Mysli object
     * To work with.
     */
    private function __construct() {
        if(!self::$mysqli instanceof mysqli) {
            die("Sorry, we dont have a valid Mysql connection object. ");
        }
    }

    /**
     * Database Setup ($user, $pass, $db, $host[optional])
     * Setup the connection by
     * passing user, pass, database and a optional
     * host to this connect. (otherwise it defaults in localhost)
     * Dies on connect_error, and returns a mysqli object on success
     * TODO: Implementing throw catch exception handling
     * */
    public static function setup( $user, $pass, $db, $host='localhost') {
        self::$username = $user;
        self::$password = $pass;
        self::$database = $db;
        self::$host     = $host;

        self::$mysqli = new mysqli(
                                self::$host,
                                self::$username,
                                self::$password,
                                self::$database
                            );

        if(self::$mysqli->connect_error){
            die('Connection trew this Error: ' . self::$mysqli->connect_error);
        }

        return self::$mysqli;
    }
    
    /**
     * Make sure that only one instance is returned
     * @returned DB instance
     * */
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new DB();
        }

        return self::$instance;
    }
    
    /**
     * Execute query's against database
     * 
     * */
    public function query($sql) {
        if($this->query = self::$mysqli->query($sql)) {
            while($row = $this->query->fetch_object()) {
                $this->results[] = $row;
            }
            $this->count = $this->query->num_rows;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function count(){
        return $this->count;
    }


    /**
     * Returns the Results as
     * object referenced by columnname.
     * TODO: @Nav Returning results as array option
     * @return array
     */
    public function results(){
        return $this->results;
    }
}

?>