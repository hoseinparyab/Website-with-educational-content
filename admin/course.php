<?php
include 'header.php';
// include '../script/jdf/jdf.php';

$successadd = null;
$errormassage = null;
$num = 1;

if (isset($_POST['sub'])) {
    if (!empty($_POST['title'] && $_POST['value'])) {
        // Uploader Configs
        $target_dir = "../assets/upload/course/";
        $new_name = rand(1000, 100000) . '-' . basename($_FILES["fileToUpload"]["name"]);
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

        $result = $conn->prepare('INSERT INTO course SET title=? , content=? , image=? , tag=? , slug=? , value=? , level=? , create_date=? , update_date=? , status=? , intro=? , cat=?');
        $result->bindValue(1, $title);
        $result->bindValue(2, $content);
        $result->bindValue(3, $image);
        $result->bindValue(4, $tag);
        $result->bindValue(5, $slug);
        $result->bindValue(6, $value);
        $result->bindValue(7, $level);
        $result->bindValue(8, time());
        $result->bindValue(9, time());
        $result->bindValue(10, $status);
        $result->bindValue(11, $intro);
        $result->bindValue(12, $cat);
        $result->execute();
        $successadd = true;
    } else {
        $errormassage = true;
    }
}

$result = $conn->prepare("SELECT * FROM course");
$result->execute();
$posts = $result->fetchall(PDO::FETCH_ASSOC);

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
    <input name="title" type="text" class="form-control">

    <label>توضیحات:</label>
    <textarea name="content" id="my_editor" class="editor">

        </textarea>

    <label>تصویر:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <label>ویدیو معرفی:</label>
    <input name="intro" type="text" class="form-control">

    <label>برچسب ها:</label>
    <input name="tag" type="text" class="form-control">

    <label>دسته بندی:</label>
    <select name="cat" class="form-control">
        <option disabled selected>دسته بندی را انتخواب کنید</option>
        <?php foreach ($menues as $menu): ?>
        <option value="<?= $menu['id'] ?>"><?= $menu['title'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>آدرس اینترنتی:</label>
    <input name="slug" type="text" class="form-control">

    <label>قیمت:</label>
    <input name="value" type="text" class="form-control">

    <label>سطح دوره:</label>
    <select name="level" class="form-control">
        <option value="1">مقدماتی</option>
        <option value="2">متوسط</option>
        <option value="3">پیشرفته</option>
    </select><br>

    <label>وضعیت دوره</label><br>
    <label>تکمیل شده</label>
    <input type="radio" name="status" value="1">
    <label>درحال برگذاری</label>
    <input type="radio" name="status" value="0" checked>
    <br>
    <br>
    <input type="submit" name="sub" value="افزودن" class="btn btn-success">
</form>
<br><br>
<?php
if ($successadd) {
    echo '<p class="alert alert-success">پست مورد نظر با موفقیت افزوده شد.</p>';
}
if ($errormassage) {
    echo '<p class="alert alert-warning">لطفا فیلد عنوان را پر کنید.</p>';
}
?>
<br><br><br><br>

<table class="table table-striped m-0">
    <thead>
        <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>تصویر</th>
            <th>آدرس</th>
            <th>قیمت</th>
            <th>سطح</th>
            <th>تاریخ ثبت</th>
            <th>تاریخ بروزرسانی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) { ?>
        <tr>
            <th scope="row"><?php echo $num++; ?></th>
            <td><?php echo $post['title']; ?></td>
            <td><img src="../assets/upload/course/<?= $post['image']; ?>" alt="" height="80px"></td>
            <td><?php echo $post['slug']; ?></td>
            <td><?php echo $post['value']; ?></td>
            <td><?php if ($post['level'] == 1) {
                        echo 'مقدماتی';
                    } elseif ($post['level'] == 2) {
                        echo 'متوسط';
                    } elseif ($post['level'] == 3) {
                        echo 'پیشرفته';
                    } ?></td>
            <td><?php echo jdate('Y-m-d', $post['create_date']); ?></td>
            <td><?php echo jdate('Y-m-d', $post['update_date']); ?></td>
            <td>
                <a href="editcourse.php?id=<?php echo $post['id'] ?>" class="btn btn-warning">ویرایش</a>
                <a href="deletecourse.php?id=<?php echo $post['id'] ?>" class="btn btn-danger">حذف</a>
                <a href="partcourse.php?course=<?php echo $post['id'] ?>" class="btn btn-primary">مدیریت جلسات</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>