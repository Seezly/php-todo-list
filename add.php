<?php
    require 'db_connection.php';

    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['urgency'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $urgency = $_POST['urgency'];

        $stmt = $conn->prepare("INSERT INTO todos (title, description, urgency) VALUES (?, ?, ?)");
        $res = $stmt->execute([$title, $description, $urgency]);

        if($res){
            header("Location: index.php");
        }

        $conn = null;
        exit();
    }