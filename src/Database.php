<?php
  class Database {

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host=' . $_ENV["RDS_HOSTNAME"] . ';dbname=' . $_ENV["RDS_DB_NAME"] . ';port=' . $_ENV["RDS_PORT"];
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

        // Create PDO instance
      try {
        $this->dbh = new PDO($dsn, $_ENV["RDS_USERNAME"], $_ENV["RDS_PASSWORD"], $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    public function query($sql){
          $this->stmt = $this->dbh->prepare($sql);
          $this->execute();
        }

    public function execute(){
          return $this->stmt->execute();
        }

    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>