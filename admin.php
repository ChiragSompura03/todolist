<?php
require_once 'controller.php';

$taskController = new TaskController('localhost', 'root', '', 'todo_list');

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'list':
        require 'template_list.php';
        break;

    case 'add':
        require 'template_edit.php';
        break;

    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $taskController->addTask($title, $description);
        }
        header('Location: admin.php?action=list');
        break;

    case 'edit':
        require 'template_edit.php';
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $taskController->updateTask($id, $title, $description);
        }
        header('Location: admin.php?action=list');
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $taskController->deleteTask($_GET['id']);
        }
        header('Location: admin.php?action=list');
        break;

    default:
        require 'template_list.php';
        break;
}
