<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario   =new Usuario();

    switch($_GET["op"]){

        /* Controller para poder listar */
        case "listar":
            $datos = $usuario->get_usuario();
            $data = array();
            foreach($datos as $row){
                $sub_array   = array();
                $sub_array[] = $row["usu_correo"];
                if ($row["est"]==1){
                    $sub_array[] = '<span class="badge badge-pill badge-success">Suscrito</span>';
                }else{
                    $sub_array[] = '<span class="badge badge-pill badge-danger">No Suscrito</span>';
                }

                if ($row["est"]==1){
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>';
                }else{
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>';
                }

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1, //Información para el datatables
                "iTotalRecords"=>count($datos), //enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($datos), //enviamos el total registros a visualizar
                "aaData"=>$data);

            echo json_encode($results);
            break;

        /* Eliminar segun ID */
        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;
    }

?>