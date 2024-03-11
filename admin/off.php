<?php include 'header.php'; 
$num=0;
$id_set = 0;
$is_update = false;
$update_data = [];

if(isset($_GET['id'])){
    $id_set = $_GET['id'];
    $is_update = true;
    $result = $conn->prepare("SELECT * FROM percents WHERE id=? LIMIT 1");
    $result->bindValue(1 , $id_set);
    $result->execute();
    $update_data = $result->fetch(PDO::FETCH_ASSOC);
    
    // Update
    if(isset($_POST['sub'])){
        $title = $_POST['title'];
        $percent = $_POST['percent'];
        $code = $_POST['code'];
        
        $result = $conn->prepare('UPDATE percents SET title=? , perc=?, code=? WHERE id=?');
        $result->bindValue(1 , $title);
        $result->bindValue(2 , $percent);
        $result->bindValue(3 , $code);
        $result->bindValue(4 , $id_set);
        $result->execute();
    }
    ?>
<?php
}
else{
    // Insert
    if(isset($_POST['sub'])){
        $title = $_POST['title'];
        $percent = $_POST['percent'];
        $code = $_POST['code'];

        $result = $conn->prepare('INSERT INTO percents SET title=? , perc=?, code=?');
        $result->bindValue(1 , $title);
        $result->bindValue(2 , $percent);
        $result->bindValue(3 , $code);
        $result->execute();
    }
}
if(isset($_GET['delete'])){
    $result = $conn->prepare("DELETE FROM percents WHERE id=?");
    $result->bindValue(1 , $id_set);
    $result->execute();
    $update_data = $result->fetch(PDO::FETCH_ASSOC);
    echo "<script>window.location='".base_url."/admin/off.php';</script>";
}

$result = $conn->prepare("SELECT * FROM percents");
$result->execute();
$percents = $result->fetchall(PDO::FETCH_ASSOC);
?>

<form method="POST" style="max-width: 400px;">
    <input type="title" name="title" <?php if($is_update){ ?> value="<?= $update_data['title']  ?>" <?php } ?>
        placeholder="عنوان تخفیف" class="form-control"><br>
    <input type="number" name="percent" <?php if($is_update){ ?> value="<?= $update_data['perc']  ?>" <?php } ?>
        placeholder="درصد تخفیف" class="form-control" max="100" min="10"><br>
    <input type="text" name="code" <?php if($is_update){ ?> value="<?= $update_data['code']  ?>" <?php } ?>
        placeholder="کد تخفیف" class="form-control"><br>
    <button id="add-btn" type="submit" name="sub" class="btn btn-success">افزودن</button>
</form>
<br><br>

<table class="table table-striped m-0">
    <thead>
        <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>درصد</th>
            <th>کد تخفیف</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($percents as $pr){ ?>
        <tr>
            <th scope="row"><?php echo ++$num; ?></th>
            <td><?php echo $pr['title'] ?></td>
            <td><?php echo $pr['perc'] ?></td>
            <td><?php echo $pr['code'] ?></td>
            <td><a href="?id=<?php echo $pr['id'] ?>" class="btn btn-warning">ویرایش</a> <a
                    href="?id=<?php echo $pr['id'] ?>&delete=true" class="btn btn-danger">حذف</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'footer.php';
if($is_update){ ?>
<script>
$("#add-btn").text("ویرایش")
</script>
<?php } ?>