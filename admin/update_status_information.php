<?php
    include('../server/connection.php');
    session_start();
    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: login.php');
        exit;
    }

    if(isset($_GET['information_id'])){

        $information_id = $_GET['information_id'];
        
        $update_status= 'Correo enviado';
        $stmt = $conn->prepare("UPDATE send_information SET status_answer=? WHERE information_id=?");
        if (!$stmt) {
            die('Error de la consulta SQL: ' . $conn->error);
        }
        $stmt->bind_param('si',$update_status,$information_id);

        if($stmt->execute()){
            echo "hola";
            header('location: send_information.php?message=Modificado con exito');
        }else{
            header('location: send_information.php?error=No se pudo modificar intente de nuevo');
        }

    }



?>