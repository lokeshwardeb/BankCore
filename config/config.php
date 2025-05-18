<?php

// require_once __DIR__ . '/../models/models.php';

class database {

    private $hostname;
    private $db_username;
    private $db_password;
    private $db_name;

    protected function connect()
    {
        $this->hostname = "localhost";
        $this->db_username = "root";
        $this->db_password = "";
        $this->db_name = "uob_club_form";

        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->db_name);

        return $conn;


    }

}

// new database;


?>