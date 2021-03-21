<?php
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['urgency'])) {
        
        require 'db_connection.php';

        $title = $_POST['title'];
        $description = $_POST['description'];
        $urgency = $_POST['urgency'];

        $stmt = $conn->prepare("INSERT INTO todos (title, description, urgency) VALUES (?, ?, ?)");
        $res = $stmt->execute([$title, $description, $urgency]);

        header("Location: ./index.php");
        
        $conn = null;
        exit();
    }