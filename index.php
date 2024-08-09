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
        .task-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            position: relative;
        }

        .task-table th, .task-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .task-table th {
            background-color: #f2f2f2;
        }

        .pointer {
            position: absolute;
            height: 40px;
            width: 10px;
            background-color: gray;
            left: -15px;
            transition: top 0.3s ease-in-out;
        }

        tr:hover .pointer {
            display: none;
        }
        
        .task-table tr {
            height: 40px;
            position: relative;
        }

        .task-table tr:hover {
            background-color: #eaeaea;
        }

        .task-table tr:hover td {
            color: black;
        }

        .highlight {
            background-color: #eaeaea;
        }

        .highlight td {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <h1 style="text-align:center;">To-Do List</h1>
    <table class="task-table">
        <tr id="highlighted-task" class="highlight" style="display: none;">
            <td colspan="3"></td>
        </tr>
        <tbody>
            <?php foreach ($tasks as $index => $task): ?>
                <tr data-index="<?php echo $index; ?>">
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="slider.js"></script>
</body>
</html>
