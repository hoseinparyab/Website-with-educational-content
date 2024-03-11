<?php include 'header.php'; 
$num = 1;
if(isset($_POST['sub'])){
    $title = $_POST['title'];
    $z = $_POST['z'];
    $sort = $_POST['sort'];
    $src = $_POST['src'];

    $result = $conn->prepare('INSERT INTO menu SET title=? , z=? , sort=? , src=?');
    $result->bindValue(1 , $title);
    $result->bindValue(2 , $z);
    $result->bindValue(3 , $sort);
    $result->bindValue(4 , $src);
    $result->execute();

}

$result = $conn->prepare("SELECT * FROM menu");
$result->execute();
$menus = $result->fetchall(PDO::FETCH_ASSOC);

?>

<form method="POST" style="max-width: 400px;">
    <input type="text" name="title" placeholder="عنوان منو" class="form-control"><br>
    <select name="z" class="form-control">
        <option value="0">بدون سرگروه</option>
        <?php foreach($menus as $menu){ ?>
        <option value="<?php echo $menu['id'] ?>"><?php echo $menu['title'] ?></option>
        <?php } ?>
    </select><br>
    <input type="number" name="sort" placeholder="اولویت بندی" class="form-control" value="1"><br>
    <input type="text" name="src" placeholder="آدرس" class="form-control" value="#"><br>
    <input type="submit" name="sub" value="افزودن" class="btn btn-success">
</form>
<br><br>

<table class="table table-striped m-0">
    <thead>
        <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>سرگروه</th>
            <th>اولویت بندی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($menus as $menu){ ?>
            <tr>
            <th scope="row"><?php echo $num++; ?></th>
            <td><?php echo $menu['title'] ?></td>
            <td><span class="label label-primary"><?php foreach($menus as $item){if($menu['z'] == $item['id']){echo $item['title'];}} ?></span></td>
            <td><?php echo $menu['sort'] ?></td>
            <td><a href="editmenu.php?id=<?php echo $menu['id'] ?>" class="btn btn-warning">ویرایش</a> <a href="deletemenu.php?id=<?php echo $menu['id'] ?>" class="btn btn-danger">حذف</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>