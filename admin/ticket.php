<?php
include 'header.php';

function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

$result = $conn->prepare("SELECT * FROM `ticket` WHERE reply=0");
$result->execute();
$ticket_list = $result->fetchall(PDO::FETCH_ASSOC);

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان</th>
            <th scope="col">توضیحات</th>
            <th scope="col">تاریخ</th>
            <th scope="col">عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ticket_list as $key=> $itemTicket): ?>
        <tr>
            <th scope="row"><?= $key+1 ?></th>
            <td><?= $itemTicket["title"] ?></td>
            <td><?= limit_words(strip_tags($itemTicket["description"]),12) ?></td>
            <td><?= jdate("Y-m-d",$itemTicket["time"]) ?></td>
            <td><a href="ticket_detail.php?main=<?= $itemTicket["id"] ?>" class="btn btn-secondary">بیشتر</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>