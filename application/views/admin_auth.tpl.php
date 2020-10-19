<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
    include 'elements/libs_head.php';

    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<center>
    <form method="post" action="../models/authmodel.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
        <?php if(!empty($pageData['error'])) :?>
            <p style="color: red">
                <?php echo $pageData['error']; ?>
            </p>
        <?php endif;?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>

<?php
include 'elements/libs_body.php';
?>
</body>
</html>
