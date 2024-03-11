<?php include 'header.php'; 
$main = $_GET["main"];
$id = $_SESSION['id'];
if(isset($_POST['sub'])){
    $description = $_POST['description'];

    $result = $conn->prepare('INSERT INTO ticket SET title=? , description=? , sender=? , reply=?, main=?, time=?');
    $result->bindValue(1 , "");
    $result->bindValue(2 , $description);
    $result->bindValue(3 , $id);
    $result->bindValue(4 , $main);
    $result->bindValue(5 , $main);
    $result->bindValue(6 , time());
    $result->execute();

}

$result = $conn->prepare("SELECT ticket.*, user.name AS user_name, user.role AS user_role  FROM `ticket` LEFT JOIN user ON user.id = ticket.sender WHERE main=$main ORDER BY id ASC");
$result->execute();
$tickets = $result->fetchall(PDO::FETCH_ASSOC);
?>
<style>
.admin {
    width: 400px;
    padding: 12px;
    background-color: #D7D7D7;
    border-radius: 15px;
}

.user {
    width: 400px;
    padding: 12px;
    background-color: #EEDFDF;
    border-radius: 15px;
}
</style>
<div>
    <?php foreach($tickets as $ticket){ ?>
    <div class="<?php if($ticket["user_role"] == 3){ ?>admin<?php }else{ ?>user<?php } ?>">
        <span><?= $ticket["user_name"] ?></span>
        <?= $ticket["description"] ?>
    </div>
    <br>
    <?php } ?>
</div>
<br><br>
<form method="post" id="comment">
    <label>متن تیکت:</label>
    <textarea name="description" class="editor"></textarea>
    <br>
    <input name="reply_form" type="hidden" value="0" id="reply_form">
    <input type="submit" class="btn btn-success" value="ثبت" name="sub">
</form>
<br><br>
<?php include 'footer.php'; ?>