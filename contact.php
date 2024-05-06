<?php
    include('server/connection.php');

    if(isset($_POST['contact_user'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $contac = $_POST['contac'];
        $feeling = $_POST['feeling'];

        $stmt = $conn -> prepare("INSERT INTO contact (stakeholders_name,stakeholders_number,stakeholders_email,stakeholders_interest,stakeholders_contact)
                                    VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss',$name,$phone,$email,$feeling,$contac);

        if($stmt->execute()){
            header('location: contact.php?message=Registro exitoso Pronto te contactaremos');
        }else{
            header('location: contact.php?error=No se pudo realizar el registro');
        }
    }


?>





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

    <?php include('loyouts/header.php')?>


    <main>
        <section class="content-contact container ">
            <div class="information_contact">
                <H2>Contactanos</H2>
                <h3>Correo:</h3>
                <h4>contactocolhome@gmail.com</h4>
                <h3>Tel:</h3>
                <h4>311 xxx xxxx</h4>
                
            </div>
            <form  action="contact.php"  method="post">
                <h2>Dejanos Contactarte</h2>
                <p style="color: green; font-size:20px;"><?php if(isset($_GET['message'])) {echo $_GET['message'];}?></p>    
                <p style="color: rgb(102, 8, 8); font-size:20px;"><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>    
                <div class="input-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre">

                    <label for="phone">Telefono</label>
                    <input type="tel" name="phone" id="phone" placeholder="Telefono">

                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" placeholder="Correo">

                    <div class="contact-form">
                        <h4>¿Como te gustaría ser contactado?</h4>
                        
                            <label ><input type="radio"  name="contac" value="Correo" checked>Correo</label>
                            <label ><input type="radio"  name="contac" value="WhatsApp">WhatsApp</label>
                            <label ><input type="radio" name="contac" value="llamada">llamada</label>

                    </div>

                    <div class="contact-form">
                        <h4>¿Cual es tu interés?</h4>
                        
                            <label ><input type="radio" name="feeling" value="Compra">Compra</label>
                            <label ><input type="radio" name="feeling" value="venta">venta</label>
                            <label ><input type="radio" name="feeling" value="Asesoramiento" checked>Asesoramiento</label>

                    </div>

                    <div class="form-txt-contact">
                        <a href="t&c.php">Terminos y Condiciones</a>
                    </div>
                    <input type="submit"  name="contact_user" class="btn-contact">
                </div>
            </form>

        </section>

    </main>

    <?php include('loyouts/footer.php')?>

</body>

</html>
