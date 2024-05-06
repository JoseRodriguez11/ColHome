<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>t&c</title>
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
        <section>
            <div class="title-section">
                <div class="title-content">
                    <h2>Terminos y Condiciones </h2>
                    <hr>
                </div>

                <div class="contact-tc container">
                    <h4>Uso del sitio web </h4>
                    <ul class="ul-contact">
                        <li>Nos esforzamos por mantener la exactitud y la actualidad de la información proporcionada en nuestro sitio web, pero no podemos garantizar su precisión en todo momento. No asumimos responsabilidad por cualquier error u omisión en el contenido del sitio.</li>
                        <li>Nos reservamos el derecho de modificar, suspender o retirar el acceso a nuestro sitio web en cualquier momento y sin previo aviso.</li>
                    </ul>
                    <h4>Propiedad Intelectual</h4>
                    <ul class="ul-contact">
                        <li> Todos los derechos de propiedad intelectual relacionados con el contenido y el diseño de este sitio web son propiedad de COLHOME o de terceros con licencia para su uso.</li>
                        <li>  Se prohíbe la reproducción, distribución o modificación del contenido de este sitio web sin nuestro consentimiento previo por escrito.</li>
                    </ul>
                    <h4>Enlaces a Terceros</h4>
                    <ul class="ul-contact">
                        <li>  Este sitio web puede contener enlaces a sitios web de terceros que no están bajo nuestro control. No asumimos responsabilidad por el contenido de estos sitios web enlazados ni por cualquier pérdida o daño que pueda surgir del uso de los mismos.</li>
                    </ul>

                    <h4>Privacidad</h4>
                    <ul class="ul-contact">
                        <li> Nos comprometemos a proteger la privacidad de nuestros usuarios. Consulta nuestra Política de Privacidad para obtener más información sobre cómo recopilamos, utilizamos y protegemos tus datos personales.</li>
                    </ul>

                    <h4>Limitación de Responsabilidad</h4>
                    <ul class="ul-contact">
                        <li>En la máxima medida permitida por la ley, no seremos responsables por ningún daño directo, indirecto, incidental, especial, consecuente o punitivo que surja del uso o la imposibilidad de utilizar nuestro sitio web.</li>
                    </ul>

                    <h4> Ley Aplicable</h4>
                    <ul class="ul-contact">
                        <li>Estos términos y condiciones se rigen por las leyes de Colombia y cualquier disputa relacionada con estos términos y condiciones estará sujeta a la jurisdicción exclusiva de los tribunales colombianos.</li>
                    </ul>

                    <p>Al utilizar nuestro sitio web, aceptas estos términos y condiciones en su totalidad. Si tienes alguna pregunta o inquietud sobre estos términos y condiciones, no dudes en ponerte en contacto con nosotros.</p>
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
                        <li><a href="houses.html">Mis intereses </a></li>
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