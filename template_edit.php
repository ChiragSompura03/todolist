<?php
require_once 'controller.php';

$taskController = new TaskController('localhost', 'root', '', 'todo_list');
$task = null;

if (isset($_GET['id'])) {
    $task = $taskController->getTaskById($_GET['id']);
}

$title = $task ? 'Edit Task' : 'Add New Task';
$action = $task ? 'update&id=' . $task['id'] : 'create';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title; ?></title>
    <style>
        button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background-color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #333;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <form action="admin.php?action=<?php echo $action; ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title'] ?? ''); ?>" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($task['description'] ?? ''); ?></textarea>
        
        <button type="submit"><?php echo $task ? 'Update' : 'Add'; ?> Task</button>
    </form>
</body>
</html>
