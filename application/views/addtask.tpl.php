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
    <h3><a href="/">Main</a></h3>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <? if($_SESSION['admin'] == true): ?>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" readonly aria-describedby="emailHelp" value="<?echo $pageData['email']?>" placeholder="">
            <? else: ?>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <?endif;?>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exampleInputText1">Nickname</label>
            <? if($_SESSION['admin'] == true && isset($pageData['nick'])): ?>
            <input type="text" name="nick" maxlength=25 class="form-control" id="exampleFormControlTextarea1" readonly value="<?echo $pageData['nick']?>" aria-describedby="textHelp" placeholder="">
            <? else: ?>
            <input type="text" name="nick" maxlength=25 class="form-control" id="exampleFormControlTextarea1" aria-describedby="textHelp" placeholder="Enter your nick">
            <?endif;?>
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
