<?php
include 'header.php';

if(isset($_POST['sub'])){
    $title = $_POST['title'];
    $z = $_POST['z'];
    $sort = $_POST['sort'];
    $src = $_POST['src'];

    $result = $conn->prepare('UPDATE menu SET title=? , z=? , sort=? , src=? WHERE id=?');
    $result->bindValue(1 , $title);
    $result->bindValue(2 , $z);
    $result->bindValue(3 , $sort);
    $result->bindValue(4 , $src);
    $result->bindValue(5 , $_GET['id']);
    $result->execute();
    echo '<script>window.location="menu.php";</script>';
}

$result = $conn->prepare("SELECT * FROM menu");
$result->execute();
$menus = $result->fetchall(PDO::FETCH_ASSOC);

$result = $conn->prepare("SELECT * FROM menu WHERE id=?");
$result->bindValue(1 , $_GET['id']);
$result->execute();
$itemmenu = $result->fetch(PDO::FETCH_ASSOC);

?>
<form method="POST" style="max-width: 400px;">
    <input type="text" name="title" placeholder="عنوان منو" class="form-control" value="<?php echo $itemmenu['title']?>"><br>
    <select name="z" class="form-control">
        <option value="0">بدون سرگروه</option>
        <?php foreach($menus as $menu){ ?>
            <option <?php if ($menu['id'] == $itemmenu['z']){ ?> selected <?php } ?> value="<?php echo $menu['id'] ?>"><?php echo $menu['title'] ?></option>
        <?php } ?>
    </select><br>
    <input type="number" name="sort" placeholder="اولویت بندی" class="form-control" value="<?php echo $itemmenu['sort']?>"><br>
    <input type="text" name="src" placeholder="آدرس" class="form-control" value="<?php echo $itemmenu['src']?>"><br>
    <input type="submit" name="sub" value="ویرایش" class="btn btn-success">
</form>
<?php include 'footer.php'; ?>
