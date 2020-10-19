<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageData['Title'] ?></title>
    <?php
    include 'elements/libs_head.php';
    ?>
</head>
<body>
<center>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <? if($pageData['mode'] = 'admin'): ?>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" readonly aria-describedby="emailHelp" value="<?echo $pageData['email']?>" placeholder="">
            <? else: ?>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exampleInputText1">Nickname</label>
            <input type="text" name="nick" maxlength=25 class="form-control" id="exampleFormControlTextarea1" aria-describedby="textHelp" placeholder="Enter Your Nick">

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Add task</label>
            <textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="4"></textarea>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>
<?php
include 'elements/libs_body.php';
?>
</body>
</html>
