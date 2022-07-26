<?php
    require('./functions.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>to.do</title>
</head>
<body>
    <header class="page-header">
        <div class="page-header-container">
            <h1>to.do</h1>
        </div>
    </header>
    <div class="page-content">
        <div class="page-content-container">
            <form action="index.php?action=create" method="POST">
                <div class="input-container">
                    <input 
                        type="text" 
                        name="task" 
                        maxlength="200" 
                        class="input-text"
                        placeholder="Nova tarefa">
                    <button type="submit" class="btn-submit">do</button>
                </div>
            </form>
            <table>
                <tbody>
                    <?php foreach ($tasks as $id => $task) : ?>
                        <?php if($task->done):?>
                            <tr>
                                <td width="2.2rem">
                                    <a href="index.php?action=done&id=<?php echo$id?>" class="link-done">
                                        <span class="material-icons-outlined">check_box</span>
                                    </a>
                                </td>
                                <td class="td-done">
                                    <?php echo $task->text?>
                                </td>
                                <td width="2.2rem">
                                    <a href="index.php?action=delete&id=<?php echo $id?>" class="link-trash">
                                        <span class="material-icons-outlined">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php else :?>
                            <tr>
                                <td width="2.2rem">
                                    <a href="index.php?action=done&id=<?php echo$id?>" class="link-not-done">
                                        <span class="material-icons-outlined">check_box_outline_blank</span>
                                    </a>
                                </td>
                                <td class="td-not-done">
                                    <?php echo $task->text?>
                                </td>
                                <td width="2.2rem">
                                    <a href="index.php?action=delete&id=<?php echo $id?>" class="link-trash">
                                        <span class="material-icons-outlined">delete</span>
                                    </a>
                                </td>
                            </tr>                               
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>