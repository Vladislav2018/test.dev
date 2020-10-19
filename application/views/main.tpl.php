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
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" class ="t_number" style="width: 5%">#</th>
            <th scope="col" class = "mail" style="width: 15%">User mail</th>
            <th scope="col" class = "username" style="width: 15%">Username</th>
            <th scope="col" class = "task" style="width: 65%">Task</th>
            <?if($pageData['mode'] == 'admin'): ?>
            <th scope="col" class = "select" style="width: 65%">Select</th>
            <? endif; ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td></td>

        </tbody>
    </table>
    <nav aria-label="Page navigation example" style="margin-left: 45%;
margin-top: 5%">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</center>
<?php
include 'elements/libs_body.php';
?>
</body>
</html>