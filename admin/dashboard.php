<?php

include('../server/connection.php');
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}

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
$total_houses_per_page = 10;
$offset = ($page_no - 1) * $total_houses_per_page;
$previus_page = $page_no - 1;
$next_page = $page_no + 1;


$total_no_of_pages = ceil($tota_houses / $total_houses_per_page);

//se obtienen todos los productos
$stmt2 = $conn->prepare("SELECT * FROM houses LIMIT $offset,$total_houses_per_page");
$stmt2->execute();
$houses = $stmt2->get_result();

?>

<?php include('header.php'); ?>

<main>


    <div class="title-section">
        <div class="title-content">
            <h2>Administración De Inmuebles </h2>
            <hr>
            <?php if(isset($_GET['edit-message'])) {?>
            <p style="color: green; font-size: 22px"><?php echo $_GET['edit-message']?></p>
            <?php }?>
            <?php if(isset($_GET['edit-error'])) {?>
            <p style="color: red; font-size: 22px"><?php echo $_GET['edit-error']?></p>
            <?php }?>
            <?php if(isset($_GET['deleted_sucessfully'])) {?>
            <p style="color: green; font-size: 22px"><?php echo $_GET['deleted_sucessfully']?></p>
            <?php }?>
            <?php if(isset($_GET['deleted_fail'])) {?>
            <p style="color: red; font-size: 22px"><?php echo $_GET['deleted_fail']?></p>
            <?php }?>
        </div>
    </div>
    <a class="btn btn-agregar" href="add_home.php">Agregar </a>

 

    <div class="container-dashboard container">

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoia</th>
                    <th>Ciudad</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($houses as $house) {?>
                <tr>
                    <td><?php echo $house['home_id']; ?></td>
                    <td><?php echo $house['home_category']; ?></td>
                    <td><?php echo $house['home_city'] ;?></td>
                    <td><img src="<?php echo "../imgs/".$house['home_image1'] ;?>" style="width: 70px; height:70px" ></td>
                    <td>$ <?php echo $house['home_price']; ?></td>

                    <td ><a class="btn-dasboard btn-editar" href="edit_home.php?home_id=<?php echo $house['home_id'];?>">Editar</a></td>
                    <td><a class="btn-dasboard btn-eliminar" href="delete_home.php?home_id=<?php echo $house['home_id'];?>">Eliminar</a></td>
                    
                    
                </tr>
                <?php }?>
            </tbody>
        </table>
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

    </div>

</main>

</body>

</html>