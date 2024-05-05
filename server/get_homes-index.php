<?php

    include('connection.php');

    $stmt = $conn->prepare("SELECT * FROM houses LIMIT 4 ");

    $stmt->execute();

    $homes_index = $stmt->get_result();

?>