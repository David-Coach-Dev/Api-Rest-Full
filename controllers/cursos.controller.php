<?php
  class ControllerCursos{
    /*******************
     *? Petición GET
    ********************/
    public function index(){
      $cursos =ModelosCursos::index("cursos");
      $json = array(
        "detalle" => $cursos,
      );
      echo json_encode($json, true);
    }
    /*******************
     *? Petición POST
    ********************/
    public function create(){
      $json = array(
        "detalle" => "Te encuentras en un vista de crear cursos..."
      );
      echo json_encode($json, true);
    }
    /**********************
     *? Petición GET x ID
    ***********************/
    public function show($id){
      $json = array(
        "detalle" => "Este es el curso con el id ".$id." ..."
      );
      echo json_encode($json, true);
    }
    /**********************
     *? Petición PUT x ID
    ***********************/
      public function update($id){
      $json = array(
        "detalle" => "curso con el id ".$id." fue actualizado..."
      );
      echo json_encode($json, true);
    }
    /*************************
     *? Petición DELETE x ID
    **************************/
      public function delete($id){
      $json = array(
        "detalle" => "curso con el id ".$id." fue borrado..."
      );
      echo json_encode($json, true);
    }
  }
?>