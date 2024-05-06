<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColHome</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <?php include('loyouts/header.php')?>
    
    <div class="header">
            <div class="header-content container">
                <div class="header-txt">
                    <h1>Compra venta de casas</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus explicabo ad dolorum? Illum
                        dolorum iure nisi animi, et vitae tenetur illo, corporis eveniet quia dolor alias doloribus fuga,
                        distinctio aut.</p>
                    <a href="houses.php" class="btn-1">Ver más</a>
                </div>
            </div>
    </div>

    <main>
        <section >
            <div class="title-section">
                <div class="title-content">
                    <h2>Encuentra </h2>
                    <hr>
                </div>
            </div>
            <div  class="information">
                <div class="information-item">
                    <i class="fa-solid fa-house"></i>
                    <h3>+300 Casas</h3>
                </div>
                <div class="information-item">
                    <i class="fa-solid fa-building"></i>
                    <h3>+500 Apartamentos</h3>
                </div>
                <div class="information-item">
                    <i class="fa-solid fa-house-chimney-window"></i>
                    <h3>+50 Fincas</h3>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="title-section">
                <div class="title-content">
                    <h2>Asesoramiento</h2>
                    <hr>
                </div>
            </div>
            <div class="content-advice ">
                <div class="advice-img">
                    <img id="img-asesor" src="imgs/asesor.jpg" alt="imagen de asesor">
                </div>
                <div class="advice-txt">
                    <h3>Asesores Expertos</h3>
                    <p>Contamos con los mejores asesores que te pueden ayudar la mejor opcion de vivienda 
                        que se ajuste tanto a tu presupuesto como a tus necesidades 
                    </p>
                    <a href="contact.php" class="btn-1">Contactanos</a>
                </div>

            </div>
        </section>

        <section class="container">
            <div class="title-section">
                <div class="title-content">
                    <h2>Viviendas</h2>
                    <hr>
                </div>
            </div>

            <div class="card-container">
                
            <?php  include('server/get_homes-index.php');?>

            <?php while($homes =$homes_index->fetch_assoc()) {?>

                <figure class="card">
                    <div class="card-image">
                        <img src="imgs/<?php echo $homes['home_image1']; ?>" alt="Imagen">
                    </div>
                    <div class="card-info">
                        <h2><?php echo $homes['home_category']; ?></h2>
                        <h3>$<?php echo $homes['home_price']; ?></h3>
                        <h3><?php echo $homes['home_city']; ?></h3>
                        <h3><?php echo $homes['home_neighborhood']; ?></strong></h3>
                        <p><strong>Descripción:</strong> <?php echo $homes['home_description']; ?></p>
                        <a href="<?php echo "single_house.php?home_id=".$homes['home_id'];?>" class="card-btn">Ver</a>
                    </div>
                </figure>

            <?php } ?>
            </div>
            <a href="houses.php" class="btn">Ver mas </a>
        </section>
    </main>

    <?php include('loyouts/footer.php')?>
</body>

</html>