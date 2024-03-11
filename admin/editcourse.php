<?php
include 'header.php';

$successadd = null;
$id = $_GET['id'];

$result = $conn->prepare("SELECT * FROM course WHERE id=?");
$result->bindValue(1, $id);
$result->execute();
$post = $result->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['sub'])) {

    // Uploader Configs
    $target_dir = "../assets/upload/course/";
    $image_name = $_FILES["fileToUpload"]["name"];
    if (empty($image_name)){
        $new_name = $post['image'];
    }else{
        $new_name = rand(1000, 100000) . '-' . basename($_FILES["fileToUpload"]["name"]);
    }
    $target_file = $target_dir . $new_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($new_name)) . " has been uploaded.";
            echo "<script> Swal.fire({
  position: 'top - end',
  icon: 'success',
  title: 'تصویر با موفقیت افزوده شد',
  showConfirmButton: false,
  timer: 1500
}) </script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $new_name;
    $tag = $_POST['tag'];
    $slug = $_POST['slug'];
    $value = $_POST['value'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $intro = $_POST['intro'];
    $cat = $_POST['cat'];

    $result = $conn->prepare('UPDATE course SET title=? , content=? , image=? , tag=? , slug=? , value=? , level=? , update_date=? , status=? , intro=? , cat=? WHERE id=?');
    $result->bindValue(1, $title);
    $result->bindValue(2, $content);
    $result->bindValue(3, $image);
    $result->bindValue(4, $tag);
    $result->bindValue(5, $slug);
    $result->bindValue(6, $value);
    $result->bindValue(7, $level);
    $result->bindValue(8, time());
    $result->bindValue(9, $status);
    $result->bindValue(10 , $intro);
    $result->bindValue(11 , $cat);
    $result->bindValue(12, $id);
    $result->execute();
    $successadd = true;
}

$menues = $conn->prepare("SELECT * FROM menu WHERE z!=0");
$menues->execute();
$menues = $menues->fetchall(PDO::FETCH_ASSOC);
?>
    <style>
        label {
            margin-top: 10px;
            margin-bottom: 5px;
        }
    </style>

    <form method="POST" enctype="multipart/form-data">
        <label>عنوان دوره آموزشی:</label>
        <input name="title" type="text" class="form-control" value="<?= $post['title'] ?>">

        <label>توضیحات:</label>
        <textarea name="content" id="my_editor" class="editor">
            <?= $post['content'] ?>
        </textarea>

        <label>تصویر:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <label>ویدیو معرفی:</label>
        <input name="intro" type="text" class="form-control" value="<?= $post['intro'] ?>">

        <label>برچسب ها:</label>
        <input name="tag" type="text" class="form-control" value="<?= $post['tag'] ?>">

        <label>دسته بندی:</label>
        <select name="cat" class="form-control">
            <?php foreach ($menues as $menu): ?>
                <option value="<?= $menu['id'] ?>" <?php if ($post['cat'] == $menu['id']) { ?> selected <?php } ?> ><?= $menu['title'] ?> </option>
            <?php endforeach; ?>
        </select><br>

        <label>آدرس اینترنتی:</label>
        <input name="slug" type="text" class="form-control" value="<?= $post['slug'] ?>">

        <label>قیمت:</label>
        <input name="value" type="text" class="form-control" value="<?= $post['value'] ?>">

        <label>سطح دوره:</label>
        <select name="level" class="form-control">
            <option value="1" <?php if ($post['level'] == 1): ?> selected <?php endif; ?>>مقدماتی</option>
            <option value="2" <?php if ($post['level'] == 2): ?> selected <?php endif; ?>>متوسط</option>
            <option value="3" <?php if ($post['level'] == 3): ?> selected <?php endif; ?>>پیشرفته</option>
        </select>

        <label>وضعیت دوره</label><br>
        <label>تکمیل شده</label>
        <input type="radio" name="status" value="1" <?php if ($post['status'] == 1){ ?> checked <?php } ?>>
        <label>درحال برگذاری</label>
        <input type="radio" name="status" value="0" <?php if ($post['status'] == 0){ ?> checked <?php } ?>>
        <br>
        <br>

        <br>
        <input type="submit" name="sub" value="ویرایش" class="btn btn-success">
        <a href="course.php" class="btn btn-danger">بازگشت</a>
    </form>
    <br><br>
<?php
if ($successadd) {
    echo '<p class="alert alert-success">پست مورد نظر با موفقیت ویرایش شد.</p>';
}
?>
    <br><br>

<?php include 'footer.php'; ?>