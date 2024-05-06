
<?php

    include('../server/connection.php');
    session_start();
    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: login.php');
        exit;
    }

    if(isset($_POST['add-home'])){

        $home_category= $_POST['category'];
        $home_price =$_POST['price'];
        $home_city =$_POST['city'];
        $home_neighborhood= $_POST['neighborhood'];
        $home_location = $_POST['location'];
        $home_rooms =$_POST['rooms'];
        $home_bathrooms =$_POST['bathrooms'];
        $home_meters = $_POST['meters'];
        $home_description =$_POST['description'];
        $home_importance =$_POST['importance'];
        $home_image1 =$_POST['image1'];
        $home_image2 =$_POST['image2'];
        $home_image3 =$_POST['image3'];

        $stmt = $conn->prepare("INSERT INTO houses (home_category, home_price,home_city, home_neighborhood, home_location , home_rooms, home_bathrooms,
                                home_meters, home_description, home_importance, home_image1, home_image2, home_image3 ) 
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
         if (!$stmt) {
            die('Error de la consulta SQL: ' . $conn->error);
         }
        $stmt->bind_param('sisssiiisssss',$home_category,$home_price,$home_city,$home_neighborhood,$home_location,$home_rooms,$home_bathrooms,$home_meters,$home_description,$home_importance,$home_image1,$home_image2,$home_image3);

        if($stmt->execute()){
            header('location: add_home.php?message=registrado con Exito');
        }else{
            header('location: add_home.php?error=No se pudo registrar con exito');
        }
    }


?>
<?php include('header.php')?>
<section class="edit-home container ">
<form action="add_home.php" method="post">
    <h2>Agregar nueva vivienda</h2>
    <p style="color: green; font-size:18px; "><?php if(isset($_GET['message'])) {echo $_GET['message'];}?></p>
    <p style="color: rgb(102, 8, 8); font-size:18px; "><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
               
    <div class="input-group">
        
        <input type="hidden" name="home_id" >
        <label for="category">Categoria</label>
        <select name="category" id="category" required>
            <option value="casa">Casa</option>
            <option value="apartamento">Apartamento</option>
            <option value="finca">Finca</option>
        </select>
        
        <label for="price">Precio</label>
        <input type="number" name="price" id="price"  placeholder="Precio" required>

        <label for="city">Ciudad</label>
        <input type="text" name="city" id="city"  placeholder="Ciudad" required>

        <label for="neighborhood">Barrio</label>
        <input type="text" name="neighborhood" id="neighborhood"  placeholder="Barrio" required>

        <label for="location">Departamento</label>
        <input type="text" name="location" id="location" placeholder="Departamento" required>

        <label for="rooms">Habitaciones</label>
        <input type="number" name="rooms" id="rooms"  placeholder="habitaciones" required>

        <label for="bathrooms">Baños</label>
        <input type="number" name="bathrooms" id="bathrooms" placeholder="Baños" required>

        <label for="meters">Metros Cuadrados</label>
        <input type="number" name="meters" id="meters" placeholder="Metros cuadrados" required>

        <label for="description">Descripcion</label>
        <input style="height: 100px;" type="text" name="description" id="description" placeholder="Descripcion" required>

        <label for="importance">Importancia</label>
        <input type="text" name="importance" id="importance"  placeholder="importancia" required>

        <label for="image1">Imagen principal</label>
        <input type="text" name="image1" id="image1"  placeholder="ruta de imagen" required>
        <label for="image2">Imagen 2</label>
        <input type="text" name="image2" id="imag2"  placeholder="ruta de imagen" required>
        <label for="image3">Imagen 3</label>
        <input type="text" name="image3" id="image3"  placeholder="ruta de imagen" required>

        <input type="submit" class="btn-edit-home" name="add-home" value="Editar">

        
    </div>
</form>
</section>

</body>

</html>