<?php

    session_start();
    include('../server/connection.php');
    if(!isset($_SESSION['admin_logged_in'])){
        header('location: login.php');
        exit;
    }

    if(isset($_GET['home_id'])){
        $home_id= $_GET['home_id'];
        $stmt = $conn->prepare("DELETE FROM houses WHERE home_id=?");
        $stmt->bind_param('i',$home_id);
        
        if($stmt->execute()){
            header('location: dashboard.php?deleted_sucessfully=Se elimino un registro con exito');

        }else{
            header('location: dashboard.php?deleted_fail=No se pudo eliminar el registro intenta de nuevo ');

        }
        
    }


?>