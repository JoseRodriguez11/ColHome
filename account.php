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
    <header>
        <div class="menu">
            <a href="#" class="logo">COLHOME</a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="imgs/menu.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="houses.html">Casas</a></li>
                    <li><a href="about_us.html">Sobre Nosotros</a></li>
                    <li><a href="contact.html">Contacto</a></li>

                </ul>
            </nav>
            <a class="btn-login" href="login.php">Login</a>
        </div>


    </header>

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


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Empresa</h4>
                    <ul>
                        <li><a href="about_us.html">Sobre nosotro</a></li>
                        <li><a href="t&c.html">T&C</a></li>
                        <li><a href="contact.html">Contacto</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Busquedas</h4>
                    <ul>
                        <li><a href="houses.html">Todos los resultados </a></li>
                        <li><a href="houses.html">Mas Recientes</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Siguenos en </h4>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>