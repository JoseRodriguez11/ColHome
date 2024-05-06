
<?php

    include('server/connection.php');
    session_start();

    if(isset($_SESSION['logged_in'])){
        header('location: houses.php');
        exit;
    }


    if(isset($_POST['login_btn'])){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM user WHERE user_email=? AND user_password=? ");
        $stmt->bind_param('ss',$email,$password);
        

        if($stmt->execute()){

            $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
            $stmt->store_result();
            if($stmt-> num_rows() == 1){
                 $stmt->fetch();
                 $_SESSION['user_id']= $user_id;
                 $_SESSION['user_name']= $user_name;
                 $_SESSION['user_email']= $user_email;
                 $_SESSION['logged_in'] = true;

                 
                 header('location: houses.php');
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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('imgs/i3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
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
            
        </div>

    </header>

    <main>

        <div class="wrapper">
            <div class="form-box login ">
                <h2>Inicio De Sesion</h2>
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
                    <div class="remenber-forgot">
                        <label ><input type="checkbox"> Recuerdame</label>
                        <a href="#">¿Olvidaste la Contraseña?</a>
                    </div>

                    

                    <button  type="submit" name="login_btn" class="from-login-btn">Ingresar </button>

                    <div class="login-register">
                        <p>¿No tienes una cuenta?<a href="register.php" class="register-link">Registarse </a> </p>
                    </div>
                </form>
            </div>


    </main>


</body>

</html>