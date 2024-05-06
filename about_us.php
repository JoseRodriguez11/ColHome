<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
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
        <section class="container-details container">
 
            <div >
                <div class="title-section">
                    <div class="title-content">
                        <h2>SOBRE NOSOTROS</h2>
                        <hr>
                    </div>
                </div>
                <details open>
                    <summary>
                        Conocenos 
                    </summary>
                    <div>
                        <p>En COLHOME, nos dedicamos apasionadamente a facilitar los sueños de nuestros clientes de encontrar el hogar perfecto en Colombia. Desde casas y apartamentos urbanos hasta tranquilas fincas campestres, nuestro compromiso es ofrecer un servicio excepcional y personalizado que supere las expectativas de quienes confían en nosotros para hacer realidad sus aspiraciones de bienes raíces.</p>

                    </div>
                </details>
                <details>
                    <summary>
                        Nuestra Misión
                    </summary>
                    <div>
                        <p>Nuestra misión es ser el aliado de confianza para aquellos que buscan comprar, vender o alquilar propiedades en Colombia. Nos esforzamos por ofrecer un servicio integral y transparente que garantice la satisfacción de nuestros clientes en cada paso del proceso. Estamos comprometidos con la excelencia, la ética y la integridad en todas nuestras transacciones, buscando siempre superar las expectativas y construir relaciones de confianza a largo plazo.</p>
                    </div>
                </details>
                <details>
                    <summary>
                        Nuestra Vision 
                    </summary>
                    <div>
                        <p>En COLHOME, tenemos la visión de ser líderes en el mercado de bienes raíces en Colombia, reconocidos por nuestra calidad de servicio, nuestra innovación y nuestra capacidad para adaptarnos a las necesidades cambiantes de nuestros clientes y del mercado. Nos esforzamos por ser un referente de excelencia en la industria, ofreciendo soluciones creativas y personalizadas que agreguen valor a cada transacción y mejoren la experiencia general de nuestros clientes.

                            Nuestro equipo está formado por profesionales altamente capacitados y comprometidos, con un profundo conocimiento del mercado inmobiliario colombiano y una pasión por ayudar a nuestros clientes a encontrar el lugar perfecto para llamar hogar. Nos enorgullece nuestro compromiso con la satisfacción del cliente y nuestro enfoque en construir relaciones sólidas y duraderas.
                            
                            En COLHOME, creemos que cada propiedad tiene una historia única y que cada cliente merece una atención personalizada. Estamos aquí para ayudarte a escribir el próximo capítulo de tu vida en el lugar que siempre has soñado llamar hogar.</p>
                    </div>
                </details>
                <details>
                    <summary>
                        Ubicacion
                    </summary>
                    <div>
                        <p> <strong>Colombia</strong></p>
                    </div>
                </details>
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