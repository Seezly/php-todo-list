<?php
    if (isset($_POST['id'])) {
        
        require 'db_connection.php';

        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]);

        header("Location: index.php");

        $conn = null;
        exit();
    }