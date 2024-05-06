
<?php

    include('server/connection.php');

    if(isset($_GET['home_id'])){

        $home_id = $_GET['home_id'];
        $stmt = $conn->prepare("SELECT * FROM houses WHERE home_id= ? ");
        $stmt->bind_param("i",$home_id);

        $stmt->execute();
    
        $home_information = $stmt->get_result();

    }else{
        header('location: index.php');
    }


?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista producto</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <a class="btn-login" href="login.html">Login</a>
        </div>
    </header>


    <main>
        <section class="container">
            <div class="content-single-house">
                
            <?php while($home = $home_information->fetch_assoc()) {?>
                <div class="single-house-information">
                    <div class="content-slider">
                        <div class="slider">
                            
                            <img id="slider1" src="imgs/<?php echo$home['home_image1'];?>" alt="">
                            <img id="slider2" src="imgs/<?php echo$home['home_image2'];?>" alt="">
                            <img id="slider3" src="imgs/<?php echo$home['home_image3'];?>" alt="">
                            
                        </div>
                        <div class="slider-nav">
                            <a href="#slider1"></a>
                            <a href="#slider2"></a>
                            <a href="#slider3"></a>
                        </div>
                    </div>
                    <div class="single-house-text">
                        <div class="single-house-title">
                            <h1><?php echo$home['home_category'];?> en venta</h1>
                            <h1>$ <?php echo$home['home_price'];?></h1>
                        </div>
                        <div class="main-characteristics">
                            <h3><?php echo$home['home_city'];?> <span>&#8226</span> <?php echo$home['home_location'];?></h3>
                            <span class="icon"><i class="fa-solid fa-bed"></i> <?php echo$home['home_rooms'];?> Habitaciones</span>
                            <span class="icon"><i class="fa-solid fa-toilet"></i> <?php echo$home['home_bathrooms'];?> Baños</span>
                            <span class="icon"><i class="fa-solid fa-layer-group"></i> <?php echo$home['home_meters'];?> m<sup>2</sup> </span>
                        </div>
                        <div class="single-house-details">
                            <h2>Descripción</h2>
                            <p> <?php echo$home['home_description'];?></p>
                            <h2>Localizacion</h2>
                            <p><strong>Departamento:</strong><?php echo$home['home_location'];?></p>
                            <p><strong>Ciudad:</strong><?php echo$home['home_city'];?></p>
                            <p><strong>Barrio:</strong><?php echo$home['home_neighborhood'];?></p>
                        </div>
                    </div>

                </div>
            <?php }?>

                <div class="content-form-single-product">
                    <div class="form-single-house ">
                        <form action="">
                            <h2>Pedir más Informacion</h2>
                            <div class="input-group">

                                <label for="message">Mensaje</label>
                                <textarea name="message" id="message" cols="30" rows="5"
                                    placeholder="Mensaje"></textarea>

                                <div class="form-txt-contact">
                                    <a href="t&c.html">Terminos y Condiciones</a>
                                </div>
                                <input type="submit" class="btn-form-single-house" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
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

    <script>
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("menu").style.top = "0";
            } else {
                document.getElementById("menu").style.top = "-40px"; /* Altura de la barra de menú */
            }
        }
    </script>

</body>

</html>
