
<?php

    include('server/connection.php');
    session_start();
    

    if(isset($_POST['more-information'])){
        if(isset($_SESSION['logged_in'])){
            $user_id = $_SESSION['user_id'];
            $user_email = $_SESSION['user_email'];
            $user_message = $_POST['message'];
            $homeId = (int)$_POST['home_id'];
            
            $stmt1 = $conn->prepare("INSERT INTO send_information (user_id,home_id,information_message)
                                    VALUES (?,?,?) ");
            $stmt1->bind_param('iis',$user_id,$homeId,$user_message);
            
            if($stmt1->execute()){
                header('location: single_house.php?message=Mensaje enviado Pronto resiviras Informacion');
            }else{
                header('location: single_house.php?error=Ocurrio un error intenta enviar el mesaje de nuevo');
            }
        }else{
            header('location: login.php');
        }
    }
    else if(isset($_GET['home_id'])){

        $home_id = $_GET['home_id'];
        $stmt = $conn->prepare("SELECT * FROM houses WHERE home_id= ? ");
        $stmt->bind_param("i",$home_id);

        $stmt->execute();
    
        $home_information = $stmt->get_result();

    }else{
        header('location: index.php');
        echo $home_id;
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

    <?php include('loyouts/header.php')?>


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
                <?php $nueva= $home['home_id'];?>
            <?php }?>
                
                <div class="content-form-single-product">
                    <div class="form-single-house ">
                        <form action="single_house.php" method="post">
                            <h2>Pedir más Informacion</h2>
                            <div class="input-group">

                                <label for="message">Mensaje</label>
                                <textarea name="message" id="message" cols="30" rows="5"
                                    placeholder="Mensaje"></textarea>

                                <div class="form-txt-contact">
                                    <a href="t&c.html">Terminos y Condiciones</a>
                                </div>
                                <p style="color: rgb(102, 8, 8); font-size:16px;"><?php if(isset($_POST['more-information'])) {echo $_GET['error'];}?></p>
                                <p style="color: rgb(102, 8, 8); font-size:16px;"><?php if(isset($_POST['more-information'])) {echo $_GET['message'];}?></p>
                                <input type="hidden" name="home_id" value="<?php echo $nueva;?>">
                                <input type="submit" class="btn-form-single-house" name="more-information" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include('loyouts/footer.php')?>

</body>

</html>
