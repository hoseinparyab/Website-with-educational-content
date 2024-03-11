<?php
include 'header.php';
// include '../script/jdf/jdf.php';
$id = $_GET['course'];

$result = $conn->prepare("SELECT * FROM course WHERE id=?");
$result->bindValue(1, $id);
$result->execute();
$course = $result->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['sub'])){
    if (!empty($_FILES['fileToUpload'])) {
        $status = $_POST['status'];
        // Uploader Configs
        $target_dir = "../assets/upload/part/";
        $new_name = rand(1000, 100000) . '-' . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $new_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allow certain file formats
        if ($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "mp3") {
            echo "Sorry, only mp4 , mkv , mp3.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script> Swal.fire({
                position: 'top - end',
                icon: 'error',
                title: 'ویدیو با موفقیت بارگذاری نشد',
                showConfirmButton: false,
                timer: 1500
            }) </script>";
        }else {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            echo "<script> Swal.fire({
                position: 'top - end',
                icon: 'success',
                title: 'ویدیو با موفقیت بارگذاری شد',
                showConfirmButton: false,
                timer: 1500
            }) </script>";
            $result = $conn->prepare("INSERT INTO part SET link=? , course=?, status=?");
            $result->bindValue(1 , $new_name);
            $result->bindValue(2 , $id);
            $result->bindValue(3 , $status);
            $result->execute();
        }
    }
}

?>
<h4> مدیریت جلسات دوره : <?= $course['title'] ?></h4>

<form method="POST" enctype="multipart/form-data">
    <label>ویدیو:</label>
    <input type="file" name="fileToUpload">
    <br>
    <label>نوع:</label>
    <br>
    <select name="status" class="form-control">
        <option value="free" selected>رایگان</option>
        <option value="cash">نقدی</option>
    </select>
    <br>
    <input type="submit" name="sub" value="ثبت" class="btn btn-success">
</form>


<?php include 'footer.php'; ?>
