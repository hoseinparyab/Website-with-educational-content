<?php
include '../config/db.php';
$id = $_SESSION['id'];
$num = 1;

// SELECT MENUs
$result = $conn->prepare("SELECT * FROM menu ORDER BY sort");
$result->execute();
$menus = $result->fetchall(PDO::FETCH_ASSOC);

// Select items store
$result = $conn->prepare("SELECT store.id , course.title AS course , course.value FROM store JOIN course ON course_id = course.id WHERE user_id= ? AND store.status= ?");
$result->bindValue(1 , $id);
$result->bindValue(2 , 0);
$result->execute();
$items = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'layout/header.php';?>

<!-- nav menu -->

<br>


<div class="container">
    <?php if (!empty($items)){ ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $total = 0;
        foreach ($items as $item): ?>
            <tr>
                <th scope="row"><?= $num++ ?></th>
                <td><?= $item['course'] ?></td>
                <td><?= $item['value'] ?></td>
                <td><a href="basket/delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">حذف</a></td>
            </tr>
            <?php
        $total += $item['value'];
        endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <?php 
if(isset($_POST['off'])){
    $code = $_POST['code'];
    $result = $conn->prepare("SELECT * FROM percents WHERE code=? LIMIT 1");
    $result->bindValue(1 , $code);
    $result->execute();
    $items = $result->fetch(PDO::FETCH_ASSOC);
    if($items){
        $off = $items['perc'];
        $total = ($total/100)*(100-$off);
        echo "<p class='alert alert-success'>تخفیف با موفقیت اعمال شد</p>";
    }
    else
        echo "<p class='alert alert-warning'>کد وارد شده صحیح نیست</p>";
}

?>
    <form method="post" action="shop.php">
        <input type="text" name="code" class="form-control" placeholder="کد تخفیف"
            style="width: 200px; display: inline;">
        <input type="submit" value="اعمال تخفیف" class="btn btn-success" name="off">
    </form>

    <div class="alert alert-dark"> مجموع مبلغ سبد خرید شما : <?= $total ?></div>
    <form method="post" action="../pages/basket/pay.php">
        <input type="hidden" value="<?= $total ?>" name="amount">
        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="user">
        <input type="submit" value="پرداخت" class="btn btn-primary" name="pay">
    </form>
    <?php }else{ ?>
    <img src="../image/emptybasket.jpg" alt="" style="max-width: 40%; display: block; margin: 0 auto;">
    <a href="../" class="btn btn-dark" style="margin: 0 auto; display: block; width: 140px;">بازگشت به سایت</a>
    <?php } ?>
</div>



<br><br><br><br><br><br><br><br><br><br>

<?php
include 'layout/footer.php';
?>