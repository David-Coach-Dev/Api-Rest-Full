<?php
  require_once "connection.php";
  class ModelosClientes{
    /*******************
    ** Petición GET
    ********************/
    static public function index($tabla){
      $stmt=Connection::connect()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
      $stmt->close();
      $stmt=null;
    }
    /*******************
    ** Petición POST
    ********************/
    static public function create($tabla, $datos){
      $stmt = Connection::connect()->prepare("INSERT INTO $tabla(nombre, apellido, email, id_cliente, llave_secreta, created_at, updated_at) VALUES (:nombre, :apellido, :email, :id_cliente, :llave_secreta, :created_at, :updated_at)");
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
      $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
      $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
      $stmt->bindParam(":llave_secreta", $datos["llave_secreta"], PDO::PARAM_STR);
      $stmt->bindParam(":created_at", $datos["created_at"], PDO::PARAM_STR);
      $stmt->bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);
      if ($stmt->execute()) {
        return "ok";
      } else {
        print_r(Connection::connect()->errorInfo());
      }
      $stmt->close();
      $stmt=null;
    }
  }
?>
