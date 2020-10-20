<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <?php
    include 'elements/libs_head.php';
    ?>
</head>
<body>
<h3>
    <? ?>
    <a href="<?php echo $pageData['link'] ?>" style="margin-left: 1%"><?php echo $pageData['label'] ?></a>
    <a href="/addtask" style="margin-left: 80%">Add task</a>
</h3>
<center>
    <form method="post">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" class ="t_number" style="width: 5%">#</th>
            <th scope="col" class = "mail" style="width: 15%">User mail
            <th scope="col" class = "username" style="width: 15%">Nickname</th>
            <th scope="col" class = "task" style="width: 65%">Task</th>
            <th scope="col" class = "task" style="width: 65%">Status</th>
            <?if($_SESSION['admin'] == true): ?>
            <th scope="col" class = "select" style="width: 65%">Select for action</th>
            <? endif; ?>
        </tr>
        </thead>
        <tbody>
        <?foreach ($pageData['tasks']['request'] as &$number): ?>
        <tr>

            <th scope="row"><?echo $number['id']?></th>
            <td><?echo $number['email']?></td>
            <td><?echo $number['nickname']?></td>
            <td><?echo $number['task']?></td>
            <td><?echo $number['tstatus']?></td>
            <?if($_SESSION['admin'] == true): ?>
                <td>
                    <input type="checkbox" name = '<?echo $number['id']?>' value= <?echo $number['id']?>>
                </td>
            <? endif; ?>

        </tr>
        <?endforeach;?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example" style="margin-left: 45%;
margin-top: 5%">
        <ul class="pagination">
            <?for($i = 1;$i<=$pageData['tasks']['count']['pages']; $i++):?>
                <?if ($i == $_GET['page_']):?>
                    <li class="page-item"><a style="color: gray" class="page-link" href=""><?echo $i?></a></li>
                    <?continue;?>
                <?endif; ?>
                <li class="page-item"><a class="page-link" href="page?page = <?echo $i?>"><?echo $i?></a></li>
            <? endfor;?>
        </ul>
    </nav>
        <p>
            <input type="submit" name="action" class="btn btn-info" value="sort" >
            <? if($_SESSION['admin'] == true): ?>
                <input type="submit" name="action" class="btn btn-outline-danger" style="margin-left: 20%" value="DELETE" >
                <input type="submit" name="action" class="btn btn-outline-success" style="margin-left: 20%" value="finished" >
            <?endif;?>
        </p>
            <select size="3" style="margin-right: 40%" multiple name="sort">
                <option disabled>Choose sort column: </option>
                <option value="email">Mail</option>
                <option value="nickname">User name</option>
                <option value="tstatus">Status</option>
            </select>

    <?//print_r($_POST) ?>

    </form>
</center>
<?php
include 'elements/libs_body.php';
?>
</body>
</html>