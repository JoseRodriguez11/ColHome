<?php

include('server/connection.php');

if (isset($_POST['search'])) {

    $category = $_POST['category'];
    $price = $_POST['price'];
    $city = $_POST['city'];

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

     if ($city === null || $city === '') {
        //se obtine el numeros de registros que tenemos en la BD
        $stmt1 = $conn->prepare("SELECT COUNT(*)  As total_houses FROM houses WHERE home_category=? AND home_price<=? ");
        $stmt1->bind_param('si', $category, $price);
        $stmt1->execute();
        $stmt1->bind_result($total_houses);
        $stmt1->store_result();
        $stmt1->fetch();
        
        //productos por pagina
        $total_houses_per_page = 6;
        $offset = ($page_no - 1) * $total_houses_per_page;
        echo $offset;
        $previus_page = $page_no - 1;
        $next_page = $page_no + 1;


        $total_no_of_pages = ceil($total_houses / $total_houses_per_page);

        //se obtienen todos los productos
        $stmt2 = $conn->prepare("SELECT * FROM houses WHERE home_category=? AND home_price<=? LIMIT $total_houses_per_page");
        $stmt2->bind_param('si', $category, $price);
        $stmt2->execute();
        $houses = $stmt2->get_result();
        
    } else {
         //se obtine el numeros de registros que tenemos en la BD
        $stmt1 = $conn->prepare("SELECT COUNT(*)  As total_houses FROM houses WHERE home_category=? AND home_price<=? AND home_city=?");
        $stmt1->bind_param('sis', $category, $price,$city);
        $stmt1->execute();
        $stmt1->bind_result($total_houses);
        $stmt1->store_result();
        $stmt1->fetch();
        
        //productos por pagina
        $total_houses_per_page = 6;
        $offset = ($page_no - 1) * $total_houses_per_page;
        echo $offset;
        $previus_page = $page_no - 1;
        $next_page = $page_no + 1;


        $total_no_of_pages = ceil($total_houses / $total_houses_per_page);

        //se obtienen todos los productos
        $stmt2 = $conn->prepare("SELECT * FROM houses WHERE home_category=? AND home_price<=? AND home_city=? LIMIT $offset,$total_houses_per_page ");
        $stmt2->bind_param('sis', $category, $price,$city);
        $stmt2->execute();
        $houses = $stmt2->get_result();
    }
} else {

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    //se obtine el numeros de registros que tenemos en la BD
    $stmt1 = $conn->prepare("SELECT COUNT(*)  As total_houses FROM houses ");
    $stmt1->execute();
    $stmt1->bind_result($tota_houses);
    $stmt1->store_result();
    $stmt1->fetch();

    //productos por pagina
    $total_houses_per_page = 6;
    $offset = ($page_no - 1) * $total_houses_per_page;
    echo $offset;
    $previus_page = $page_no - 1;
    $next_page = $page_no + 1;


    $total_no_of_pages = ceil($tota_houses / $total_houses_per_page);

    //se obtienen todos los productos
    $stmt2 = $conn->prepare("SELECT * FROM houses LIMIT $offset,$total_houses_per_page");
    $stmt2->execute();
    $houses = $stmt2->get_result();
}





?>







<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <?php include('loyouts/header.php') ?>

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
                            <input type="range" min="100000000" max="2000000000" name="price" value="<?php if(isset($price) ) {echo $price;} else {echo "2000000000";}?>">
                            <div class="limit-prices">
                                <span>100.000.000</span>
                                <span>2.000.000.000</span>
                            </div>
                        </div>
                        <div class="aside-column">
                            <h3>Categorias</h3>
                            <div class="checkbox">
                                <label><input type="radio" name="category" id="category_one" value="casa" <?php if(isset($category) && $category=='casa'){echo 'checked';} ?>>Casa</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="radio" name="category" id="category_two" value="apartamento" <?php if(isset($category) && $category=='apartamento'){echo 'checked';} ?>>Apartamento</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="radio" name="category" id="category_three" value="finca" <?php if(isset($category) && $category=='finca'){echo 'checked';} ?>>Finca</label>
                            </div>

                        </div>
                        <div class="aside-column">
                            <h3>Ciudad</h3>
                            <input type="text" name="city">
                        </div>
                        <div class="aside-column">
                            <input type="submit" name="search" value="Buscar" class="btn">
                        </div>
                    </form>


                </aside>
            </div>

            <div class="card-container">
                <p style="color: rgb(102, 8, 8); font-size:30px;"><?php if ($houses->fetch_assoc() == 0) {
                                                                        echo "NO se encontraron resultados";
                                                                    } ?></p>
                <?php while ($row = $houses->fetch_assoc()) { ?>

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
                            <a href="<?php echo "single_house.php?home_id=" . $row['home_id']; ?>" class="card-btn">Ver</a>
                        </div>
                    </figure>
                <?php } ?>
            </div>

        </section>

        <div class="pagination">
            <a href=" <?php if ($page_no <= 1) {
                            echo "#";
                        } else {
                            echo "?page_no=" . ($page_no - 1);
                        } ?>">&laquo;</a>

            <a href="?page_no=1">1</a>
            <a href="?page_no=2">2</a>
            <?php if ($page_no >= 3) { ?>
                <a href="#">...</a>
                <a href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a>
            <?php } ?>
            
            <a href=" <?php if ($page_no >= $total_no_of_pages) {
                            echo "#";
                        } else {
                            echo "?page_no=" . ($page_no + 1);
                        } ?>">&raquo;</a>
        </div>

    </main>



    <?php include('loyouts/footer.php') ?>

</body>

</html>