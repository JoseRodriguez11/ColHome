<?php

    session_start();
    include('server/connection.php');
    if (!isset($_SESSION['logged_in'])) {

        header('location: login.php');
        exit;
    }

    //cerrar sesion
    if(isset($_GET['logout'])){
        if(isset($_SESSION['logged_in'])){
            unset($_SESSION['logged_in']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);

            header('location: login.php');
            exit;
        }
    }

    if(isset($_POST['change_password'])){

        $newPassword = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_SESSION['user_email'];

        if($newPassword !== $confirmPassword){
            header('location: account.php?error=Las contraseñas no coinciden');
        }
        else if(strlen($newPassword) < 6){
            header('location: account.php?error=La Nueva contraseña debe tener al menos 6 caracteres');
        }else{
            $newPassword = md5($newPassword);
            $stmt = $conn->prepare("UPDATE user SET user_password=? WHERE user_email=?");
            $stmt->bind_param('ss',$newPassword, $email);
            
            if($stmt->execute()){
               
                header('location: account.php?message=Se cambio la contraseña correctamente');
            }else{
                header('location: account.php?error=No se pudo actualizar la contraseña intente nuevamente');
            }

        }
    }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cuenta</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
 
    <?php include('loyouts/header.php')?>

    <main>
        <section class="content-account container ">
            <div class="information_account">
                <H2>Informacion del usuario</H2>
                <h3>Nombre</h3>
                <h4><?php if(isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];} ?></h4>
                <h3>Correo:</h3>
                <h4><?php if(isset($_SESSION['user_email'])) {echo $_SESSION['user_email'];} ?></h4>

                <a href="account.php?logout=1" class="btn-logout" >Cerrar Sesion</a>
            </div>
            <form action="account.php" method="post">
                <h2>Cambiar contraseña</h2>
                <p style="color: rgb(102, 8, 8); font-size:18px; "><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
                <p style="color: green; font-size:18px; "><?php if(isset($_GET['message'])) {echo $_GET['message'];}?></p>
        
                <div class="input-group-account">
                    <label for="password">Nueva Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Nueva contraseña">

                    <label for="confirmPassword">Confirme Contraseña</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirme contraseña">

                    <input type="submit" class="btn-account" name="change_password" value="Cambiar contraseña">
                </div>
            </form>

        </section>
    </main>


    <?php include('loyouts/footer.php')?>
</body>

</html>