<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    $task_description = $_POST["task_description"];
    $due_date = $_POST["due_date"];

    $conn = new mysqli("localhost", "root", "", "task_manager");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tasks (task_name, task_description, due_date) VALUES ('$task_name', '$task_description', '$due_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
