<?php include 'header.php';
$num = 1;

$result = $conn->prepare("SELECT * FROM user");
$result->execute();
$users = $result->fetchall(PDO::FETCH_ASSOC);

?>

    <table class="table table-striped m-0">
        <thead>
        <tr>
            <th>#</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>سطح کاربری</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user){ ?>
            <tr>
                <th scope="row"><?php echo $num++; ?></th>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><span class="label label-info"><?php if ($user['role'] == 1){echo 'کاربر عادی';}elseif ($user['role'] == 2){echo 'مدرس';}elseif ($user['role'] == 3){echo 'ادمین';} ?></span></td>
                <td><a href="edituser.php?id=<?php echo $user['id'] ?>" class="btn btn-warning">ویرایش</a> <a href="deleteuser.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">حذف</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>