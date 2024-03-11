<?php
include '../config/db.php';
include '../script/jdf/jdf.php';

$alertAdd = null;
$alertError = null;
$hasRegister = false;
$hasLogin = false;
$user_id = 0;

// SELECT POST
$course = $_GET['course'];
$result = $conn->prepare("SELECT * FROM course WHERE slug=?");
$result->bindValue(1, $course);
$result->execute();
$post = $result->fetch(PDO::FETCH_ASSOC);

// has Register in course
if(isset($_SESSION['login'])){
    $user_id = $_SESSION['id'];
    $hasLogin = true;

    $result = $conn->prepare("SELECT * FROM store WHERE user_id=? AND course_id=?");
    $result->bindValue(1, $user_id);
    $result->bindValue(2, $post['id']);
    $result->execute(); 
    if($result->rowCount() >= 1){
        $hasRegister = true;
    }
}



if (isset($_POST['add'])) {
    $result = $conn->prepare("SELECT * FROM store WHERE user_id=? AND course_id=?");
    $result->bindValue(1, $_SESSION['id']);
    $result->bindValue(2, $post['id']);
    $result->execute();

    if ($result->rowCount() >= 1) {
        $alertError = true;
    } else {
        $result = $conn->prepare("INSERT INTO store SET user_id=? , course_id=?");
        $result->bindValue(1, $_SESSION['id']);
        $result->bindValue(2, $post['id']);
        $result->execute();
        $alertAdd = true;
    }
}


// SELECT MENUs
$result = $conn->prepare("SELECT * FROM menu ORDER BY sort");
$result->execute();
$menus = $result->fetchall(PDO::FETCH_ASSOC);

$cats = $conn->prepare("SELECT * FROM menu WHERE z!=0");
$cats->execute();
$cats = $cats->fetchall(PDO::FETCH_ASSOC);

$tags = explode(',', $post['tag']);

// SELECT Part
$result = $conn->prepare("SELECT * FROM `part` WHERE course=?");
$result->bindValue(1 , $post['id']);
$result->execute();
$parts = $result->fetchAll(PDO::FETCH_ASSOC);

// Add Comment
if (isset($_POST['add_comment'])){
    $comment = $_POST['comment_body'];
    $reply = $_POST['reply_form'];
    $rating = $_POST['rating'];
    $result = $conn->prepare("INSERT INTO comments SET sender=? , course=? , content=? , rating=? , date=? , reply=?");
    $result->bindValue(1, $user_id );
    $result->bindValue(2, $post['id'] );
    $result->bindValue(3, $comment );
    $result->bindValue(4, $rating );
    $result->bindValue(5, time() );
    $result->bindValue(6, $reply);
    $result->execute();
}

// SELECT Comment
$result = $conn->prepare("SELECT comments.* , user.name as username FROM `comments` JOIN user ON comments.sender = user.id WHERE comments.course=? ORDER BY comments.date DESC");
$result->bindValue(1,$post['id']);
$result->execute();
$records = $result->rowCount();
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
$sum = 0;
foreach($comments as $item_comment){
    $sum += $item_comment['rating'];
}
if($sum == 0)
    $avg = 0;
else
    $avg = round($sum / $records);

?>

<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $post["title"] ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    .nav-link {
        color: #333 !important;
    }

    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
    }

    .rating-css input {
        display: none;
    }

    .rating-css input+label {
        font-size: 30px;
        cursor: pointer;
    }

    .rating-css input:checked+label~label {
        color: #333;
    }

    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }

    .rating-test {
        color: #333;
    }
    </style>
</head>

<body>
    <div class="container top-header">
        <img src="../image/logo.svg" alt="logo header" width="80px">
        <div class="search-box d-none d-lg-flex">


            <div class="input-group md-form form-sm form-1 pl-0">
                <input class="form-control my-0 py-1" type="text" style="font-size: 14px;"
                    placeholder="دنبال چه آموزشی میگردی؟" aria-label="Search">
                <div class="input-group-prepend">
                    <span style="background-color: #007bff;" class="input-group-text purple lighten-3"
                        id="basic-text1"><svg style="color: #fff;" width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                            <path fill-rule="evenodd"
                                d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg></span>
                </div>
            </div>
        </div>
        <div class="instagram-icon">
            <nav class="navbar navbar-expand-lg" style="width: 100%; direction: ltr;">
                <div style="margin-left: -16px; margin-right: -22px;">
                    <div class="container">
                        <ul class="navbar-nav">
                            <?php if (isset($_SESSION['login'])) { ?>
                            <li class="nav-item dropdown">
                                <a style="color:#333; padding-left: 35px; margin-top: -50px;" class="nav-link" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: #fff">
                                    <svg width="0.8em" height="0.8em" viewBox="0 0 16 16" class="bi bi-caret-down-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                    <?php echo $_SESSION['email'] ?>
                                    <img src="../image/avatar-2.jpg"
                                        style="margin-top: -13px; border-radius: 50%; border: 2px solid #ccc;"
                                        width="50px" alt="">
                                </a>
                                <div class="dropdown-menu myaccont-dropdown dropdown-menu-right text-right"
                                    aria-labelledby="navbarDropdown" style="margin-right: -40px;"><br>
                                    <span><?php echo $_SESSION['password'] ?></span>
                                    <hr>
                                    <a class="dropmenu" href="#" style="margin-top: -20px;">
                                        <svg style="color: #6fc341; margin-left: 2px;" width="0.4em" height="0.4em"
                                            viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <?php if ($_SESSION['role'] == 1) {
                                            echo 'کاربر عادی';
                                        } else {
                                            echo 'مدیر';
                                        } ?></a>
                                    <a class="dropmenu" href="#">
                                        <svg style="color: #6fc341; margin-left: 2px;" width="0.4em" height="0.4em"
                                            viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        <?php if ($_SESSION['status'] == 0) { ?> <a href="" class="btn btn-danger"
                                            style="margin: 15px 15px 0 0;">غیرفعال</a> <?php } else { ?>
                                        <a href="" class="btn btn-success" style="margin: 15px 15px 0 0;">فعال</a>
                                        <?php } ?></a>

                                    <?php if ($_SESSION['role'] == 3) { ?>
                                    <a class="dropmenu" href="admin">
                                        <svg style="color: #6fc341; margin-left: 2px;" width="0.4em" height="0.4em"
                                            viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" />
                                        </svg>
                                        پنل ادمین</a>
                                    <?php } ?>

                                </div>
                            </li>
                            <?php } else { ?>
                            <li style="margin-top: -40px">
                                <a href="<?= base_url ?>pages/login.php" class="btn btn-primary">ورود</a>
                                <a href="pages/register.php" class="btn btn-primary">ثبت نام</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light" id="nav-menu" style="width: 100%;">
        <button style="margin-bottom: 10px;" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"
            style=" margin-left: -16px; margin-right: -22px;">
            <div class="container">
                <ul class="navbar-nav" style="color: #0b0b0b">
                    <?php foreach ($menus as $menu) {
                    if ($menu['z'] == 0) { ?>
                    <li class="nav-item dropdown">
                        <a href="<?php echo $menu['src']; ?>" class="nav-link  <?php foreach ($menus as $z) {
                                if ($menu['id'] == $z['z']) { ?> dropdown-toggle <?php }
                            } ?>" " href=" #" id="navbarDropdown" role="button" <?php foreach ($menus as $z) {
                                if ($menu['id'] == $z['z']) { ?> data-toggle="dropdown" <?php }
                            } ?> aria-haspopup="true" aria-expanded="false" style="color: #fff">
                            <?php echo $menu['title']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <?php foreach ($menus as $ul) {
                                    if ($menu['id'] == $ul['z']) { ?>
                            <a class="dropmenu" href="<?php echo $ul['src']; ?>"><?php echo $ul['title']; ?></a>
                            <?php }
                                } ?>
                        </div>
                    </li>
                    <?php }
                } ?>
                    <?php if (isset($_SESSION['login'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php" style="color: #fff;">خروج<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- content page -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <img src="../image/takhfif-banner.gif" width="100%" alt="" style="padding: 30px;">
            </div>
            <div class="col-12 col-lg-4"><br><br>
                <div class="information-post shadow p-3 mb-5 bg-white rounded box-caption-dore">
                    <p class="paddingright18 font18pixel">قیمت این دوره : <span
                            style="color: #6fc341;"><?= $post['value'] ?>
                            تومان</span></p>
                    <hr>
                    <br>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <span>مدرس دوره : محمد معین باغ شیخی <a href="">(رزومه)</a></span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        <span> تعداد دانشجویان این دوره : ۱۵۰ نفر</span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-camera-video-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.667 3h6.666C10.253 3 11 3.746 11 4.667v6.666c0 .92-.746 1.667-1.667 1.667H2.667C1.747 13 1 12.254 1 11.333V4.667C1 3.747 1.746 3 2.667 3z" />
                            <path
                                d="M7.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L7.404 7.304a.802.802 0 0 0 0 1.393z" />
                        </svg>
                        <span> تعداد ویدیوها : ۲۳ ویدیو</span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        </svg>
                        <span> مدت زمان دوره : ۹:۲۴:۰۰</span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" />
                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                        </svg>
                        <span> سطح دوره : <?php if ($post['level'] == 1) {
                            echo 'مقدماتی';
                        } elseif ($post['level'] == 2) {
                            echo 'متوسط';
                        } elseif ($post['level'] == 3) {
                            echo 'پیشرفته';
                        } ?></span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                        <span> وضعیت دوره : <span style="color: #00b3e9;"> <?php if ($post['status'] == 0) {
                                echo 'درحال برگذاری';
                            } else {
                                echo 'تکمیل شده';
                            } ?></span></span>
                    </p>
                    <p class="informationbox paddingright18">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM0 5h16v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5zm9.336 7.79c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z" />
                        </svg>
                        <!--                        <span> تاریخ آخرین بروزرسانی : </span>-->
                        <span><?= jdate('Y-m-d', $post['update_date']); ?></span>
                    </p>
                    <div class="rating-css alert">
                        <div class="star-icon" style="direction: ltr;">
                            <?php for($i = 1; $i<=5; $i++){ ?>
                            <input type="radio">
                            <label class="fa fa-star rating-test" <?php if($i <= $avg){ ?> style="color: #ffe400;"
                                <?php } ?>></label>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <?php if (isset($_SESSION['login']) && $hasRegister == false) { ?>
                    <form method="post">
                        <input class="btn btn-success add-butt login-in-dore login-in-dore-hover" type="submit"
                            name="add" value="ثبتــــ نام در این دوره">
                    </form>
                    <?php }else if(isset($_SESSION['login']) && $hasRegister == true){ ?>
                    <form method="post">
                        <input class="btn btn-info add-butt login-in-dore" type="submit" name="add"
                            value="شما دانشجوی این دوره هستید">
                    </form>
                    <?php } else { ?>
                    <a href="login.php" class="btn btn-warning d-block" style="padding: 10px 14px;">ابتدا وارد
                        شـــوید</a>
                    <?php } ?>
                </div>

                <div class="information-post shadow p-3 mb-5 bg-white rounded box-caption-dore">
                    <p style="font-size: 17px;">
                        <svg style="opacity: 0.35; margin-bottom: 0px; margin-left: 6px; font-size: 17px;" width="1em"
                            height="1em" viewBox="0 0 16 16" class="bi bi-funnel-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                        </svg>
                        دسته بندی :
                    </p>
                    <hr>
                    <div style="padding: 7px;">
                        <div class="category-tags-div"><a class="category-tags" href="">
                                <?php foreach ($cats as $cat) {
                                if ($post['cat'] == $cat['id']) {
                                    echo $cat['title'];
                                }
                            } ?></a></div>
                    </div>
                </div>

                <div class="information-post shadow p-3 mb-5 bg-white rounded box-caption-dore">
                    <p style="font-size: 17px;">
                        <svg style="opacity: 0.35; margin-bottom: 0px; margin-left: 6px; font-size: 17px;" width="1em"
                            height="1em" viewBox="0 0 16 16" class="bi bi-tags" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z" />
                            <path fill-rule="evenodd"
                                d="M5.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z" />
                        </svg>
                        برچسب ها :
                    </p>
                    <hr>
                    <div style="padding: 7px;">
                        <?php foreach ($tags as $tag): ?>
                        <div class="category-tags-div">
                            <a class="category-tags category-tags-2" href="">
                                <?= $tag ?>
                            </a>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="image-tab-banner">
                    <img src="../image/bannertab.png" style="padding: 0 25px;" alt="">
                </div>
            </div>

            <div class="col-12 col-lg-8" style="border: 1px solid #ecf0f4;">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="image-course">
                        <img src="../assets/upload/course/<?= $post['image'] ?>" width="100%" alt="">
                    </div>
                    <div class="content-course">
                        <h5 class="title-dore"><?= $post['title'] ?></h5>
                        <p class="caption-dore">
                            <?= $post['content'] ?>
                        </p>
                    </div>

                    <div class="alert alert-success">
                        لطفا سوالات خود را راجع به این آموزش در این بخش <a href="#" style="color: #007bff;">پرسش و
                            پاسخ</a> مطرح کنید به سوالات در قسمت نظرات
                        پاسخ داده نخواهد شد.
                    </div>
                    <div>
                        <h5 style="padding: 25px;">
                            فهرستـــ ویدیوها
                        </h5>
                        <br>
                        <video style="border-radius: 20px;" class="video-item" id="intro-video"
                            src="<?= $post['intro'] ?>" controls width="100%"></video>
                    </div>
                    <br><br>
                    <div class="alert alert-warning">
                        در صورتیکه ویدئو نمایش داده نشد آن را دانلود کنید و با KmPlayer مشاهده کنید.
                    </div>
                    <br>
                    <div class="alert alert-info">
                        راهنما ! جهت دریافت لینک دانلود تمامی قسمت ها بر روی این لینک .کلیک کنید.
                    </div>
                    <br><br>

                    <div class="box-download">
                        <?php foreach ($parts as $key => $part) { ?>
                        <div class="item-download">
                            <span class="number-item"><?= ++$key ?></span>
                            <span class="title-item-download"><?= $part['title'] ?></span><br
                                class="d-flex d-lg-none"><br class="d-flex d-lg-none">
                            <span class="time-item-download"><?= $part['time'] ?></span>
                            <span
                                class="stutos-item-download"><?php if ($part['status'] == 'free'){echo 'رایگان';}else if($part['status'] == 'cash'){echo 'نقدی';} ?></span>

                            <br class="d-flex d-lg-none"><br class="d-flex d-lg-none">

                            <?php if($part['status'] == 'free'){ ?>
                            <a href="../assets/upload/part/<?= $part['link'] ?>" download>
                                <span class="green-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-arrow-down-circle-fill" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z" />
                                    </svg>
                                </span>
                            </a>
                            <?php }else{
                                if($hasLogin){
                                if($hasRegister == false){ ?>
                            <span id="no-register" class="green-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-arrow-down-circle-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z" />
                                </svg>
                            </span>
                            <?php }else{?>
                            <a href="../assets/upload/part/<?= $part['link'] ?>" download>
                                <span class="green-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-arrow-down-circle-fill" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z" />
                                    </svg>
                                </span>
                            </a>
                            <?php }}else{ ?>
                            <span id="no-login" class="green-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-arrow-down-circle-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z" />
                                </svg>
                            </span>
                            <?php }} ?>

                            <?php if($part['status'] == 'free'){ ?>
                            <a href="#intro-video"><span id="part-video" link="<?= $part['link'] ?>"
                                    class="blue-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg></span></a>
                            <?php }else{
                                if($hasLogin){
                                if($hasRegister == false){ ?>
                            <span id="no-register" class="blue-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                </svg></span>
                            <?php }else{ ?>
                            <a href="#intro-video"><span id="part-video" link="<?= $part['link'] ?>"
                                    class="blue-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg></span></a>
                            <?php }}else{ ?>
                            <span id="no-login" class="blue-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                </svg></span>
                            <?php } } ?>

                            <span class="light-logo"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-file-earmark-text-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                </svg></span>
                            <br class="d-flex d-lg-none">
                        </div>
                        <?php } ?>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
                        </script>
                        <script>
                        $(document).on('click', '#part-video', function() {
                            var link = '../assets/upload/part/' + $(this).attr('link')
                            $("#intro-video").attr('src', link)
                        })

                        $(document).on('click', '#no-register', function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'bottom',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'warning',
                                title: 'شما در این دوره ثبت نام نکردید'
                            })
                        })
                        $(document).on('click', '#no-login', function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'bottom',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'warning',
                                title: 'ابتدا وارد حساب خود شوید'
                            })
                        })
                        </script>
                    </div>
                </div>

                <?php if(isset($_SESSION['login'])){ ?>
                <div class="add-comment">
                    <label>متن کامنت:</label>
                    <form method="post" id="comment">
                        <textarea name="comment_body" id="comment_body" class="editor">
                        </textarea>
                        <input name="reply_form" type="hidden" value="0" id="reply_form">
                        <br>
                        <div>
                            <p class="alert alert-info alert-reply" style="display: none;cursor: pointer;">شما در
                                حال پاسخ دادن به کامنت
                                هستید. برای
                                ثبت کامنت خود کلیک کنید</p>
                        </div>
                        <input type="hidden" value="5" id="rating" name="rating">

                        <div class="rating-css alert">
                            <div class="star-icon" style="direction: ltr;">
                                <input type="radio" name="rating1" id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="ثبت" name="add_comment">
                    </form>
                </div>
                <?php }else{ ?>
                <div class="alert alert-warning">
                    برای ثبت نظر خود باید ابتدا <a href="<?= base_url ?>pages/login.php">وارد </a> سایت شوید
                </div>
                <?php } ?>
                <br><br>
                <?php if ($comments){ foreach ($comments as $comment) {if($comment["reply"] == 0){ ?>
                <div class="comment-box">
                    <div class="image-comment-box">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Rp-rD5_wRCJIV0H00Wh2CrPbVM9SBpOUwrgZVnfwfyyX3ODeRs_CV2f5O7bt7pXdc5c&usqp=CAU"
                            alt="">
                    </div>
                    <div class="comment-body">
                        <div class="comment-info" style=" margin: 10px;opacity: 0.8">
                            <span class="comment-username"
                                style="float: right;margin-left: 10px"><?= $comment['username'] ?></span>
                            <span>|</span>
                            <span class="comment-date"><?= jdate('Y-m-d', $comment['date']); ?></span>
                            <a href="#comment" class="btn btn-primary" commentid="<?= $comment['id']; ?>"
                                style="font-size: 12px;margin-right: 5px;" id="reply_comment">پاسخ</a>
                        </div>
                        <p class="comment-text"><?= strip_tags($comment['content']) ?></p>
                    </div>
                </div>
                <?php foreach($comments as $replies){if($replies['reply'] == $comment['id']){ ?>
                <div class="comment-box" style="margin: 40px;">
                    <div class="image-comment-box">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Rp-rD5_wRCJIV0H00Wh2CrPbVM9SBpOUwrgZVnfwfyyX3ODeRs_CV2f5O7bt7pXdc5c&usqp=CAU"
                            alt="">
                    </div>
                    <div class="comment-body">
                        <div class="comment-info" style=" margin: 10px;opacity: 0.8">
                            <span class="comment-username"
                                style="float: right;margin-left: 10px"><?= $replies['username'] ?></span>
                            <span>|</span>
                            <span class="comment-date"><?= jdate('Y-m-d', $replies['date']); ?></span>
                        </div>
                        <p class="comment-text"><?= strip_tags($replies['content']) ?></p>
                    </div>
                </div>
                <?php }}}}}else{ ?>
                <div>
                    <p class="alert alert-warning">
                        کامنتی برای این دوره ثبت نشده است. شما اولین نفر باشید!
                    </p>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
    </div>
    </div>

    <script>
    $(document).on('click', "#reply_comment", function() {
        const id = $(this).attr("commentid")
        $("#reply_form").val(id)
        $(".alert-reply").slideDown()
    })
    $(".alert-reply").click(function() {
        $(this).slideUp()
        $("#reply_form").val(0)
    })
    </script>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <div class="footer-back">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4"><br>
                        <h6>درباره راکت</h6>
                        <hr class="header-caption-footer">
                        <p class="caption-footer">راکت یکی از پرتلاش‌ترین و بروزترین وبسایت های آموزشی در سطح ایران است
                            که همیشه تلاش کرده تا
                            بتواند جدیدترین و بروزترین مقالات و دوره‌های آموزشی را در اختیار علاقه‌مندان ایرانی قرار
                            دهد. تبدیل کردن برنامه نویسان ایرانی به بهترین برنامه نویسان جهان هدف ماست</p>
                    </div>
                    <div class="col-12 col-lg-1"></div>
                    <div class="col-12 col-lg-2"><br>
                        <h6>بخش های سایت</h6>
                        <hr class="header-caption-footer">
                        <a style="color: #fff; display:block;margin-top: 10px;" href="">قوانین و مقررات</a>
                        <a style="color: #fff; display:block;margin-top: 10px;"" href="">تبلیغات</a>
                    <a style=" color: #fff; display:block;margin-top: 10px;"" href="">درباره راکت</a>
                        <a style="color: #fff; display:block;margin-top: 10px;"" href="">ارتباط با ما</a>
                </div>
                <div class=" col-12 col-lg-1">
                    </div>
                    <div class="col-12 col-lg-3"><br>
                        <h6>ارتباط با ما</h6>
                        <hr class="header-caption-footer">
                        <p class="caption-footer">شما میتوانید با استفاده از یکی از راه‌های زیر با ما ارتباط برقرار کنید
                        </p>
                        <div>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                <span>
                                    ایمیل :‌ info@roocket.ir
                                </span>
                        </div>

                        <div style="margin-top: 10px;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-forward-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM12.646.646a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                <span> تماس: 09135882813</span>
                        </div>
                        <br>
                    </div>
                </div>
                <br class="d-none d-lg-flex">
            </div>
        </div>
    </footer>
    <footer class="footer2">
        <div class="container">
            <p>کليه حقوق محصولات و محتوای اين سایت متعلق به راکت می باشد و هر گونه کپی برداری از محتوا و محصولات سایت
                غیر
                مجاز و بدون رضایت ماست</p>
        </div>
    </footer>

    <img src="../image/teleg2.png" alt="" class="fixed-bottom d-none d-lg-block">

    <?php if ($alertAdd) { ?>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'دوره به سبد خرید شما اضافه شد'
    })
    </script>
    <?php } ?>

    <?php if ($alertError) { ?>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'error',
        title: 'دوره قبلا به سبد خرید اضافه شده'
    })
    </script>
    <?php } ?>

</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/javascript.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../script/ckeditor5/build/ckeditor.js"></script>
<script>
$("#rating1").click(function() {
    $("#rating").val("1")
})
$("#rating2").click(function() {
    $("#rating").val("2")
})
$("#rating3").click(function() {
    $("#rating").val("3")
})
$("#rating4").click(function() {
    $("#rating").val("4")
})
$("#rating5").click(function() {
    $("#rating").val("5")
})
</script>
<script>
ClassicEditor
    .create(document.querySelector('.editor'), {

        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'outdent',
                'indent',
                '|',
                'imageUpload',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo',
                'code',
                'codeBlock',
                'fontBackgroundColor',
                'fontColor',
                'fontSize',
                'highlight'
            ]
        },
        language: 'fa',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side',
                'linkImage'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        licenseKey: '',


    })
    .then(editor => {
        window.editor = editor;








    })
    .catch(error => {
        console.error('Oops, something went wrong!');
        console.error(
            'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
        );
        console.warn('Build id: fotmady28o1t-fx1wlfayz8ed');
        console.error(error);
    });
</script>

</html>