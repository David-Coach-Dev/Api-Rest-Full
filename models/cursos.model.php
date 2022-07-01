<?php
  require_once "connection.php";
  class ModelosCursos{
    static public function index($tabla){
      $stmt=Connection::connect()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS);
      $stmt->close();
      $stmt=null;
    }
  }
?>