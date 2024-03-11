<?php
include 'header.php';
$id = $_GET['id'];

if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $result = $conn->prepare("UPDATE user SET name=? , email=? , role=? WHERE id=?");
    $result->bindValue(1 , $name);
    $result->bindValue(2 , $email);
    $result->bindValue(3 , $role);
    $result->bindValue(4 , $id);
    $result->execute();

    echo '<script>window.location="users.php";</script>';
}

$result = $conn->prepare("SELECT * FROM user WHERE id=?");
$result->bindValue(1 , $id);
$result->execute();
$user = $result->fetch(PDO::FETCH_ASSOC);

?>
<form method="POST" style="max-width: 400px;">
    <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>"><br>
    <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>"><br>
    <select name="role" class="form-control">
        <option value="1" <?php if ($user['role'] == 1){ ?> selected <?php } ?>>کاربر عادی</option>
        <option value="2" <?php if ($user['role'] == 2){ ?> selected <?php } ?>>مدرس</option>
        <option value="3" <?php if ($user['role'] == 3){ ?> selected <?php } ?>>مدیر</option>
    </select>
    <br>
    <input type="submit" name="sub" value="ویرایش" class="btn btn-success">
</form>
<?php include 'footer.php'; ?>
