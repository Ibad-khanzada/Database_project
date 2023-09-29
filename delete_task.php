<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $task_id = $_GET["id"];

    $conn = new mysqli("localhost", "root", "", "task_manager");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM tasks WHERE id=$task_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting task: " . $conn->error;
    }

    $conn->close();
}
?>
