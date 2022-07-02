<?php
  $arrayRouters = explode("/", $_SERVER['REQUEST_URI']);
  if (isset($_GET["pagina"]) && is_numeric($_GET["pagina"])) {
    $cursos = new ControllerCursos();
    $cursos->index($_GET["pagina"]);
  } else {
    if(count(array_filter($arrayRouters))==1){
    /*******************************
     ** No hay Petición en la api
     *******************************/
      $json = array(
        "detalle" => "no encontrado"
      );
      echo json_encode($json, true);
    }else if (count(array_filter($arrayRouters)) == 2){
      /*******************
       *! CURSOS
      ********************/
      if(array_filter($arrayRouters)[2]=="cursos"){
        /*******************
         ** Petición GET
        ********************/
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET"){
          $cursos = new ControllerCursos();
          $cursos->index(null);
        }
        /*******************
         ** Petición POST
        ********************/
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
          /*******************
           *? Capturar Datos
          ********************/
          $datos=array(
            "titulo" => $_POST["titulo"],
            "descripcion" => $_POST["descripcion"],
            "instructor" => $_POST["instructor"],
            "imagen" => $_POST["imagen"],
            "precio" => $_POST["precio"],
          );
          $cursos = new ControllerCursos();
          $cursos->create($datos);
        }
      }
      /*******************
       *! REGISTROS
      ********************/
      if(array_filter($arrayRouters)[2]=="registros"){
        /*******************
         ** Petición GET
        ********************/
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET"){
          $clientes = new ControllerClientes();
          $clientes->index();
        }
        /*******************
         ** Petición POST
        ********************/
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
        $datos = array(
          "nombre" => $_POST["nombre"],
          "apellido" => $_POST["apellido"],
          "email" => $_POST["email"]
        );
        $clientes = new ControllerClientes();
        $clientes->create($datos);
        }
      }
    }else
    /*******************
    *! CURSOS X ID
    ********************/
    if (array_filter($arrayRouters)[2] == "cursos" && is_numeric(array_filter($arrayRouters)[3])) {
      /*******************
       ** Petición GET
      ********************/
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET") {
        $cursos = new ControllerCursos();
        $cursos->show(array_filter($arrayRouters)[3]);
      }
      /*******************
       ** Petición PUT
      ********************/
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "PUT") {
        /**********************
        ** Capturar datos
        ***********************/
        $datos = array();
        parse_str(file_get_contents('php://input'), $datos);
        $edit_cursos = new ControllerCursos();
        $edit_cursos->update((array_filter($arrayRouters)[3]),$datos);
      }
      /*******************
       ** Petición DELETE
      ********************/
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "DELETE") {
        $borrar_cursos = new ControllerCursos();
        $borrar_cursos->delete(array_filter($arrayRouters)[3]);
      }
    }
    /*******************
    *! REGISTROS X ID
    ********************/
    if (array_filter($arrayRouters)[2] == "registros" && is_numeric(array_filter($arrayRouters)[3])) {
    /*******************
     ** Petición GET
    ********************/
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET") {
        $clientes = new ControllerClientes();
        $clientes->show(array_filter($arrayRouters)[3]);
      }
    }
  }
?>