
<?php include('header.php'); ?>
<?php  
    
    include('../server/connection.php');
    if(isset($_GET['home_id'])){
        $home_id= $_GET['home_id'];
        $stmt = $conn->prepare("SELECT * FROM houses WHERE home_id=?");
        $stmt->bind_param('i',$home_id);
        $stmt->execute();
        $homes = $stmt->get_result();
    }else if(isset($_POST['edit-home'])){
        $home_id = $_POST['home_id'];
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

        $stmt1 = $conn->prepare("UPDATE houses SET home_category=?, home_price=?,home_city=?, home_neighborhood=?, home_location=? , home_rooms=?, home_bathrooms=?,
                                                    home_meters=?, home_description=?, home_importance=?, home_image1=?, home_image2=?, home_image3=?  
                                                WHERE home_id=?");
        if (!$stmt1) {
            die('Error de la consulta SQL: ' . $conn->error);
        }
        $stmt1->bind_param('sisssiiisssssi',$home_category,$home_price,$home_city,$home_neighborhood,$home_location,$home_rooms,$home_bathrooms,$home_meters,$home_description,$home_importance,$home_image1,$home_image2,$home_image3,$home_id);

        if($stmt1->execute()){
            header('location: dashboard.php?edit-message=cambios realizados con exito');
        }else{
            header('location: dashboard.php?edit-error=No se pudo realizar los cambions intenta de nuevo');
        }
    }
    else{
        header('dashboard.php');
        exit;
    }
 

?>
<section class="edit-home container ">
<form action="edit_home.php" method="post">
    <h2>Editar</h2>
    <div class="input-group">
        <?php foreach($homes as $home ) {?>
        <input type="hidden" name="home_id" value="<?php echo$home['home_id']?>">
        <label for="category">Categoria</label>
        <select name="category" id="category" required>
            <option value="casa">Casa</option>
            <option value="apartamento">Apartamento</option>
            <option value="finca">Finca</option>
        </select>
        
        <label for="price">Precio</label>
        <input type="number" name="price" id="price" value="<?php echo $home['home_price'] ?>" placeholder="Precio" required>

        <label for="city">Ciudad</label>
        <input type="text" name="city" id="city" value="<?php echo $home['home_city'] ?>" placeholder="Ciudad" required>

        <label for="neighborhood">Barrio</label>
        <input type="text" name="neighborhood" id="neighborhood" value="<?php echo $home['home_neighborhood'] ?>" placeholder="Barrio" required>

        <label for="location">Departamento</label>
        <input type="text" name="location" id="location" value="<?php echo $home['home_location'] ?>"placeholder="Departamento" required>

        <label for="rooms">Habitaciones</label>
        <input type="number" name="rooms" id="rooms" value="<?php echo $home['home_rooms'] ?>" placeholder="habitaciones" required>

        <label for="bathrooms">Baños</label>
        <input type="number" name="bathrooms" id="bathrooms" value="<?php echo $home['home_bathrooms'] ?>"placeholder="Baños" required>

        <label for="meters">Metros Cuadrados</label>
        <input type="number" name="meters" id="meters" value="<?php echo $home['home_meters'] ?>"placeholder="Metros cuadrados" required>

        <label for="description">Descripcion</label>
        <input style="height: 100px;" type="text" name="description" id="description" value="<?php  echo $home['home_description'] ?>" placeholder="Descripcion" required>

        <label for="importance">Importancia</label>
        <input type="text" name="importance" id="importance" value="<?php  echo $home['home_importance'] ?>" placeholder="importancia" required>

        <label for="image1">Imagen principal</label>
        <input type="text" name="image1" id="image1"  value="<?php echo $home['home_image1'] ?>" placeholder="ruta de imagen" required>
        <label for="image2">Imagen 2</label>
        <input type="text" name="image2" id="imag2"  value="<?php echo $home['home_image2'] ?>" placeholder="ruta de imagen" required>
        <label for="image3">Imagen 3</label>
        <input type="text" name="image3" id="image3" value="<?php echo $home['home_image3'] ?>" placeholder="ruta de imagen" required>

        <input type="submit" class="btn-edit-home" name="edit-home" value="Editar">

        <?php }?>
    </div>
</form>
</section>

</body>

</html>