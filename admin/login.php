<?php

    include('../server/connection.php');
    session_start();

    if(isset($_SESSION['admin_logged_in'])){
        header('location: dashboard.php');
        exit;
    }


    if(isset($_POST['login_btn'])){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $stmt = $conn->prepare("SELECT admin_id,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=? ");
        $stmt->bind_param('ss',$email,$password);
        

        if($stmt->execute()){

            $stmt->bind_result($admin_id,$admin_email,$admin_password);
            $stmt->store_result();
            if($stmt-> num_rows() == 1){
                 $stmt->fetch();
                 $_SESSION['admin_id']= $admin_id;
                 $_SESSION['admin_email']= $admin_email;
                 $_SESSION['admin_logged_in'] = true;

                 
                 header('location: dashboard.php');
            }else{
                header('location: login.php?error_login= Correo o Contrseña incorrecta');
            }
        }else{
            header('location: login.php?error_login= Algo salio mal Intente de nuevo ');
        }


    }



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('../imgs/i3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>

    

    <main>

        <div class="wrapper">
            <div class="form-box login ">
                <h2>Inicio Admin</h2>
                <p style="color: rgb(102, 8, 8); font-size:18px; "><?php if(isset($_GET['error_login'])) {echo $_GET['error_login'];}?></p>
                
                <form  method="post" action="login.php">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email"  name="email" required>
                        <label >Correo</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" required>
                        <label >Contraseña</label>
                    </div>
                    <button  type="submit" name="login_btn" class="from-login-btn">Ingresar </button>
                </form>
            </div>


    </main>


</body>

</html>