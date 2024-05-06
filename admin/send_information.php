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
$stmt1 = $conn->prepare("SELECT COUNT(*)  As total_question FROM send_information ");
$stmt1->execute();
$stmt1->bind_result($total_question);
$stmt1->store_result();
$stmt1->fetch();

//productos por pagina
$total_question_per_page = 10;
$offset = ($page_no - 1) * $total_question_per_page;
$previus_page = $page_no - 1;
$next_page = $page_no + 1;


$total_no_of_pages = ceil($total_question / $total_question_per_page);

//se obtienen todos los productos
$stmt2 = $conn->prepare("SELECT u.user_id,u.user_name, u.user_email,h.home_id, h.home_category, h.home_city, h.home_importance,r.information_message,r.information_date,r.status_answer,r.information_id
                        FROM send_information AS r
                        JOIN user AS u ON r.user_id = u.user_id
                        JOIN houses AS h ON r.home_id = h.home_id LIMIT $offset,$total_question_per_page");
$stmt2->execute();
$questions = $stmt2->get_result();

?>

<?php include('header.php'); ?>
<main>


    <div class="title-section">
        <div class="title-content">
            <h2>solicitudes de informacion </h2>
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
                    <th>Id_usuario</th>
                    <th>Nombre_Usuario</th>
                    <th>correo_Usuario</th>
                    <th>id_vivienda</th>
                    <th>vivienda_tipo</th>
                    <th>vivienda_ciudad</th>
                    <th>vivienda_importancia</th>
                    <th>Mensaje</th>
                    <th>fecha</th>
                    <th>Estado</th>
                    <th>Cambiar estado</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($questions as $question) {?>
                <tr>
                    <td><?php echo $question['user_id'] ?></td>
                    <td><?php echo $question['user_name'] ?></td>
                    <td><?php echo $question['user_email'] ?></td>
                    <td><?php echo $question['home_id'] ?></td>
                    <td><?php echo $question['home_category'] ?></td>
                    <td><?php echo $question['home_city'] ?></td>
                    <td><?php echo $question['home_importance'] ?></td>
                    <td><?php echo $question['information_message'] ?></td>
                    <td><?php echo $question['information_date'] ?></td>
                    <td><?php echo $question['status_answer'] ?></td>

                    <td ><a class="btn-dasboard btn-editar" href="update_status_information.php?information_id=<?php echo $question['information_id'];?>" name="change-status">enviado</a></td>
                    
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