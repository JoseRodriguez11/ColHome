<?php
    include('../server/connection.php');
    session_start();
    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: login.php');
        exit;
    }

    if(isset($_GET['stakeholder_id'])){

        $stakeholders_id = $_GET['stakeholders_id'];
        $update_status= 'Contactado';
        $stmt = $conn->prepare("UPDATE contact SET stakeholders_state=? WHERE stakeholders_id=?");
        if (!$stmt) {
            die('Error de la consulta SQL: ' . $conn->error);
        }
        $stmt->bind_param('si',$update_status,$stakeholders_id);

        if($stmt->execute()){
            
            header('location: contact.php?message=Modificado con exito');
        }else{
            header('location: contact.php?error=No se pudo modificar intente de nuevo');
        }

    }



?>