<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <?php
    include 'elements/libs_head.php';
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<center>
    <h3><a href="/">Main</a></h3>
<?//print_r($_POST)?>
    <p>Task id: <?echo $pageData['task_info'][0]['id']?></p>
    <p>Author's nickname: <?echo $pageData['task_info'][0]['nickname']?></p>
    <p>Author's email: <?echo $pageData['task_info'][0]['email']?></p>
    <p>Status: <?echo $pageData['task_info'][0]['tstatus']?></p>
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Edit task</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="" name="task" rows="4"><?echo $pageData['task_info'][0]['task']?></textarea>
        </div>
        <style>
form
            {
                margin-top: 10%;
            }
            .form-control
            {
                width: 40%;
            }
        </style>
        <?if (isset($pageData['error'])): ?>
            <h3 style="color: red"><?echo $pageData['error']?></h3>
        <?endif;?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>
<?php
include 'elements/libs_body.php';
?>
</body>
</html>