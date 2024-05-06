
<?php

    include('server/connection.php');
    session_start();


    if (isset($_SESSION['logged_in'])){
        header('location: account.php');
        exit;
    }

    if(isset($_POST['register'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $agree_tc =$_POST['agree_tc'];

        //valida que acepte terminos y condiciones
        if(!$agree_tc){
            header('location: register.php?error_tc=Aceptar los terminos y condiciones');
        }

        //valida que la contraseña se mayor a 6 caracteres 
        else if(strlen($password) < 6){
            header('location: register.php?error_ps=La contraseña debe tener al menos 6 caracteres');
        }
        else{

            //verifiaca que no hayan registros anterior en la BD con el mismo correo
            $stmt1=$conn-> prepare("SELECT count(*)FROM user where user_email=?");
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();
    
            
            //si hay un registro
            if($num_rows != 0 ){
                header('location: register.php?error_email= El correo ya se encuentra registrado');
            }else{

                //se registra nuevo usuario
                $stmt = $conn->prepare("INSERT INTO user (user_name,user_email,user_password) 
                                    VALUES (?,?,?)");
                $stmt->bind_param('sss',$name,$email,md5($password));

                if($stmt->execute()){
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('location: account.php?resgister=registro exitoso');
                }else{
                    header('location: register.php?error_register=Error al crear la cuneta intentalo de Nuevo');
                }
            }

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
        
            <div class="form-box register  wrapper">
            
                <form action="register.php"  method="post">
                    <h2>Registro</h2>
                    
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></i></span>
                        <input type="text" name="name" required>
                        <label >Nombre</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="email" required>
                        <p style="color: rgb(102, 8, 8); font-size:16px;"><?php if(isset($_GET['error_email'])) {echo $_GET['error_email'];}?></p>
                        <label >Correo</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" required>
                        <p style="color: rgb(102, 8, 8); font-size:16px;"><?php if(isset($_GET['error_ps'])) {echo $_GET['error_ps'];}?></p>
                        <label >Contraseña</label>
                    </div>
                    <div class="remenber-forgot">
                        <label ><input type="checkbox" name="agree_tc"> Acepto Terminos y Condiciones</label>
                        
                    </div>
                    <p style="color: rgb(102, 8, 8); font-size:16px;"><?php if(isset($_GET['error_tc'])) {echo $_GET['error_tc'];}?></p>

                    <button type="submit" class="from-login-btn" name="register">Registrar</button>

                    <div class="login-register">
                        <p>¿Ya tienes una cuenta?<a href="login.php" class="login-link">Iniciar Sesion </a> </p>
                    </div>
                </form>
            </div>

        </div>
    </main>

</body>

</html>
