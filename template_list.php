<?php
require_once 'controller.php';

$taskController = new TaskController('localhost', 'root', '', 'todo_list');
$tasks = $taskController->getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To-Do List</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: black;
            border-radius: 5px;
            margin: 0 5px;
        }

        a:hover {
            background-color: #333;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .add-task {
            display: block;
            width: fit-content;
            margin: 0 auto 20px;
            text-decoration: none;
            color: white;
            background-color: black;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .add-task:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>
    <div style="text-align:center; margin-bottom: 20px;">
        <a href="admin.php?action=add" class="add-task">Add New Task</a>
    </div>
    <table>
        <!-- <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead> -->
        <tbody>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $index => $task): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td class="actions">
                            <a href="admin.php?action=edit&id=<?php echo $task['id']; ?>">Edit</a>
                            <a href="admin.php?action=delete&id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">No tasks found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="slider.js"></script>
</body>
</html>
