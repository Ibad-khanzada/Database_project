<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>

    <!-- Task creation form -->
    <form action="add_task.php" method="POST">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required><br>

        <label for="task_description">Description:</label>
        <textarea name="task_description"></textarea><br>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date"><br>

        <input type="submit" value="Add Task">
    </form>

    <h2>Task List</h2>
    <?php
    // PHP code to retrieve and display tasks from the database
    $conn = new mysqli("localhost", "root", "", "task_manager");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h3>{$row['task_name']}</h3>";
            echo "<p>{$row['task_description']}</p>";
            echo "<p>Due Date: {$row['due_date']}</p>";
            echo "<p>Created At: {$row['created_at']}</p>";
            echo "<a href='delete_task.php?id={$row['id']}'>Delete Task</a>";
        }
    } else {
        echo "No tasks found.";
    }

    $conn->close();
    ?>
</body>
</html>
