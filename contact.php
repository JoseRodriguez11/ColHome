<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
        <section class="content-contact container ">
            <div class="information_contact">
                <H2>Contactanos</H2>
                <h3>Correo:</h3>
                <h4>contactocolhome@gmail.com</h4>
                <h3>Tel:</h3>
                <h4>311 xxx xxxx</h4>
                
            </div>
            <form  action="">
                <h2>Dejanos Contactarte</h2>
                <div class="input-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre">

                    <label for="phone">Telefono</label>
                    <input type="tel" name="phone" id="phone" placeholder="Telefono">

                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" placeholder="Correo">

                    <div class="contact-form">
                        <h4>¿Como te gustaría ser contactado?</h4>
                        
                            <label ><input type="checkbox"  name="email" value="Correo" checked>Correo</label>
                            <label ><input type="checkbox"  name="WhatsApp" value="WhatsApp">WhatsApp</label>
                            <label ><input type="checkbox" value="llamada">llamada</label>

                    </div>

                    <div class="contact-form">
                        <h4>¿Cual es tu interés?</h4>
                        
                            <label ><input type="checkbox" value="Compra">Compra</label>
                            <label ><input type="checkbox" value="venta">venta</label>
                            <label ><input type="checkbox" value="Asesoramiento" checked>Asesoramiento</label>

                    </div>

                    <div class="form-txt-contact">
                        <a href="t&c.html">Terminos y Condiciones</a>
                    </div>
                    <input type="submit" class="btn-contact">
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