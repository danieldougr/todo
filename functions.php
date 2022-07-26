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
        if(strlen[trim($_POST['task'])] > 0) {
            dbInclude(trim($_POST['task']));
        }
    }

    header("location: index.php");
}

function deleteTask() {

}

$tasks = dbRead();