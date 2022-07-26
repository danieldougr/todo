<?php

require('./repository.php');

if(isset($_GET['action'])) {
    
    switch ($_GET['action']) {
        case 'create':
            createTask();
            break;
        case 'delete':
             deleteTask();
            break;
    }
}

function createTask() {
    
    if(isset($_POST['task'])) {
        if(strlen(trim($_POST['task'])) > 0) {
            $task['done'] = false;
            $task['text'] = trim($_POST['task']);
            
            dbInclude($task);
        }
    }

    header("location: index.php");
}

function deleteTask() {
    if(isset($_GET['id'])) {
        $tasks = dbRead();
        unset($tasks[$_GET['id']]);
        dbRewrite($tasks);
    }

    header("location: index.php");
}

$tasks = dbRead();