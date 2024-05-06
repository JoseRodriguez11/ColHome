<?php

    include('server/connection.php');

    if(isset($_POST['search'])){

        $category = $_POST['category'];
        $price = $_POST['price'];
        $city = $_POST['city'];
        if ($category === "todas" ){
            $stmt = $conn->prepare("SELECT * FROM houses ");

            $stmt->execute();
        
            $hauses = $stmt->get_result();
        }
        else if($city === null || $city ===''){
            $stmt = $conn->prepare("SELECT * FROM houses WHERE home_category=? AND home_price<=? ");

            $stmt->bind_param('si',$category,$price);
            $stmt->execute();
    
            $hauses = $stmt->get_result();
           
        }else{
            $stmt = $conn->prepare("SELECT * FROM houses WHERE home_category=? AND home_price<=? AND home_city=?");

            $stmt->bind_param('sis',$category,$price,$city);
            $stmt->execute();
    
            $hauses = $stmt->get_result();
        }


    }else{
        $stmt = $conn->prepare("SELECT * FROM houses ");

        $stmt->execute();
    
        $hauses = $stmt->get_result();
    }
 




?>







<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas</title>
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
                    <li><a href="#">Contacto</a></li>
                    

                </ul>
            </nav>
            <a class="btn-login" href="login.html">Login</a>
        </div>

    </header>

    <main>
        <section class="container">
            <div class="title-section">
                <div class="title-content">
                    <h2>Viviendas</h2>
                    <hr>
                </div>
            </div>
            
            <div class="container">
                <aside class="content-aside">
                    <form class="content-form-serch" action="houses.php" method="post">
                        <div class="aside-column">
                            <h3>Clasificación</h3>
                            <label for="">Precio</label>
                            <input type="range" min="100000000" max="2000000000" name="price" value="2000000000">
                            <div class="limit-prices">
                                <span >100.000.000</span>
                                <span>2.000.000.000</span>
                            </div>
                        </div>
                        <div class="aside-column">
                            <h3>Categorias</h3>
                            <div class="checkbox">
                                <label ><input type="radio" name="category" id="category_one" value="casa" >Casa</label>
                            </div>
                            <div class="checkbox">
                                <label ><input type="radio" name="category" id="category_two" value="apartamento" >Apartamento</label>
                            </div>
                            <div class="checkbox">
                                <label ><input type="radio" name="category"  id="category_three" value="finca" >Finca</label>
                            </div>
                            <div class="checkbox">
                                <label ><input type="radio" name="category" value="todas" id="category_four" checked>Todas</label>
                            </div>
                        </div>
                        <div class="aside-column">
                            <h3>Ciudad</h3>
                            <input type="text" name="city"  >
                        </div>
                        <div class="aside-column">
                            <input type="submit" name="search" value="Buscar" class="btn">
                        </div>
                    </form>
                    
                    
                </aside>
            </div>

            <div class="card-container">
                <p style="color: rgb(102, 8, 8); font-size:30px;"><?php  if($hauses->fetch_assoc() == 0) {echo "NO se encontraron resultados";}?></p>
                <?php while($row = $hauses->fetch_assoc()) { ?>
                        
                        <figure class="card">
                            <div class="card-image">
                                <img src="imgs/<?php echo $row['home_image1']; ?>" alt="Imagen">
                            </div>
                            <div class="card-info">
                                <h2><?php echo $row['home_category']; ?></h2>
                                <h3>$<?php echo $row['home_price']; ?></h3>
                                <h3><?php echo $row['home_city']; ?> <span>&#8226</span> <?php echo $row['home_location']; ?></h3>
                                <h3><?php echo $row['home_neighborhood']; ?></strong></h3>
                                <p><strong>Descripción:</strong> <?php echo $row['home_description']; ?></p>
                                <a href="<?php echo "single_house.php?home_id=".$row['home_id']; ?>" class="card-btn">Ver</a>
                            </div>
                        </figure>
                <?php }?>
            </div>

        </section>

        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>

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
        window.onscroll = function() {scrollFunction()};
      
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
