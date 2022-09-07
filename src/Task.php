<?php

  require_once 'Database.php';

  class Task {
    private $db;

    public function __construct( ?Database $db = null ) {
        // set the db if none is provided
        if( is_null($db) )
        {
            $db = new Database;
        }

        $this->db = $db;
    }

    public function getAllTasks() {
      $this->db->query('SELECT * FROM store');
      $results = $this->db->resultSet();

      return $results;
    }
} 