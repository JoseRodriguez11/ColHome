
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
$stmt1 = $conn->prepare("SELECT COUNT(*)  As stakeholders FROM contact ");
$stmt1->execute();
$stmt1->bind_result($stakeholders);
$stmt1->store_result();
$stmt1->fetch();

//productos por pagina
$total_stakeholders_per_page = 10;
$offset = ($page_no - 1) * $total_stakeholders_per_page;
$previus_page = $page_no - 1;
$next_page = $page_no + 1;


$total_no_of_pages = ceil($stakeholders / $total_stakeholders_per_page);

//se obtienen todos los productos
$stmt2 = $conn->prepare("SELECT * FROM contact LIMIT $offset,$total_stakeholders_per_page");
$stmt2->execute();
$stakeholders = $stmt2->get_result();

?>

<?php include('header.php'); ?>

<main>
<div class="title-section">
        <div class="title-content">
            <h2>Personas Interesadas </h2>
            <hr>
            <?php if(isset($_GET['message'])) {?>
            <p style="color: green; font-size: 22px"><?php echo $_GET['message']?></p>
            <?php }?>
            <?php if(isset($_GET['error'])) {?>
            <p style="color: red; font-size: 22px"><?php echo $_GET['error']?></p>
            <?php }?>
        </div>
    </div>
    

    <div class="container-dashboard container">

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>Numero</th>
                    <th>Email</th>
                    <th>interés</th>
                    <th>Forma de contacto</th>
                    <th>Estado</th>
                    <th>Contactar</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($stakeholders as $stakeholder) {?>
                <tr>
                    <td><?php echo $stakeholder['stakeholders_id']; ?></td>
                    <td><?php echo $stakeholder['stakeholders_name']; ?></td>
                    <td><?php echo $stakeholder['stakeholders_number'] ;?></td>
                    <td><?php echo $stakeholder['stakeholders_email'] ;?></td>
                    <td><?php echo $stakeholder['stakeholders_interest'] ;?></td>
                    <td><?php echo $stakeholder['stakeholders_contact'] ;?></td>
                    <td><?php echo $stakeholder['stakeholders_state'] ;?></td>
                    
                    <td><a class="btn-dasboard btn-eliminar" href="update_contact_stakeholder.php?stakeholder_id=<?php echo $stakeholder['stakeholders_id'];?>">contactado</a></td>
                    
                    
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














