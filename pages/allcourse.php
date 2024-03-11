<?php
include '../config/db.php';

// Limit word caption
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
$slug = false;
$search = false;
if(isset($_GET['slug'])){
    $slug = $_GET['slug'];
}
if(isset($_POST['search'])){
    $search = $_POST['search'];
}
// SELECT MENUs
$result = $conn->prepare("SELECT * FROM menu ORDER BY sort");
$result->execute();
$menus = $result->fetchall(PDO::FETCH_ASSOC);

// SELECT POSTs
$sql = "SELECT course.*, menu.src AS category FROM course JOIN menu ON course.cat = menu.id";
if($slug){
    $sql .= " WHERE menu.src='".$slug."'";
}
if($slug && $search){
    $sql .= " AND course.title LIKE '%".$search."%'";
}else if(!$slug && $search){
    $sql .= " WHERE course.title LIKE '%".$search."%'";
}
$sql .= " ORDER BY update_date DESC";
// var_dump($sql);die;
$posts = $conn->prepare($sql);
$posts->execute();
$posts = $posts->fetchall(PDO::FETCH_ASSOC);
if(isset($_GET['page'])){
    $page_id = ($_GET['page'] -1) * 5;
    $sql = "SELECT course.*, menu.src AS category FROM course JOIN menu ON course.cat = menu.id";
    if($slug){
        $sql .= " WHERE menu.src='".$slug."'";
    }
    $sql .= "ORDER BY update_date DESC LIMIT 5 OFFSET $page_id";
    $posts = $conn->prepare($sql);
    $posts->execute();
    $posts = $posts->fetchall(PDO::FETCH_ASSOC);

}
// page count
$page_count = $conn->prepare("SELECT COUNT(*) FROM course");
$page_count->execute();
$page_counts = $page_count->fetch(PDO::FETCH_ASSOC);
$pages_number = ceil($page_counts["COUNT(*)"] / 5);
?>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تاپ لرن</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- top header -->
    <div class="container top-header">
        <img src="../image/logo.svg" alt="logo header" width="80px">
        <div class="search-box d-none d-lg-flex">


            <div class="input-group md-form form-sm form-1 pl-0">
                <form method="POST">
                    <input class="form-control my-0 py-1" type="text" style="font-size: 14px;"
                        placeholder="دنبال چه آموزشی میگردی؟" aria-label="Search" name="search" <?php if($search){ ?>
                        value="<?= $search ?>" <?php } ?>>
                    <button class="input-group-prepend">
                        <span style="background-color: #007bff;" class="input-group-text purple lighten-3"
                            id="basic-text1"><svg style="color: #fff;" width="1em" height="1em" viewBox="0 0 16 16"
                                class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                <path fill-rule="evenodd"
                                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                            </svg></span>
                    </button>
                </form>
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
                                    <a class="dropmenu" href="pages/shop.php">
                                        سبد خرید
                                    </a>
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

    <!-- nav menu -->

    <nav class="navbar navbar-expand-lg navbar-light" id="nav-menu" style="width: 100%;">
        <button style="margin-bottom: 10px;" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"
            style="background-color: #333; margin-left: -16px; margin-right: -22px;">
            <div class="container">
                <ul class="navbar-nav">
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
                        <a class="nav-link" href="pages/logout.php" style="color: #fff;">خروج<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- posts website -->

    <div class="container">
        <div>
            <p class="hero-header">جدیدترین دوره‌ها</p>
            <hr style="border-top: 3px solid rgba(0, 0, 0, 0.1); margin-top: -18px;">
            <a href="" class="btn btn-dark moredore"
                style="float: left; margin-top: -34px; color: #fff; font-size: 12px;">مشاهده همه دوره ها</a>
        </div>
        <hr style="border-top: 3px solid rgba(0, 0, 0, 0.1); margin-top: -19px; margin-bottom: -0;">

        <div class="row" style="margin-right: 0; margin-left: 0; width: 100%;">

            <?php foreach ($posts

        as $post): ?>
            <div class="col-12 col-md-6 col-lg-3 post-item">
                <a href="pages/singelpage.php?course=<?= $post['slug'] ?>">
                    <div class="image-item">
                        <img src="../assets/upload/course/<?= $post['image'] ?>" width="100%" alt="">
                    </div>

                    <div class="caption-item">
                        <div class="title-item">
                            <a href="pages/singelpage.php?course=<?= $post['slug'] ?>""><span><?= $post['title'] ?></span>
            </a>
        </div>

        <div class=" cap-item">
                                <p><?= limit_words($post['content'], 18); ?></p>
                        </div>

                        <div class="like-item">
                            <span class="like-item2">۱۵
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </span>

                            <span class="time-item">۰۴:۳۴:۴۲
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"></path>
                                    <path fill-rule="evenodd"
                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                    </path>
                                </svg>
                            </span>

                            <span class="shop-item">
                                <?= $post['value'] ?> تومان
                            </span>
                        </div>
                    </div>

                </a>
            </div>
            <?php endforeach; ?>

        </div>

        <div class="row">
            <div class="pagination-box">
                <?php for($i= 1; $i <= $pages_number; $i++){ ?>
                <a href="allcourse.php?page=<?= $i ?>" class="btn btn-secondary page-item"><?= $i ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <br><br><br>
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

    <img src="image/teleg2.png" alt="" class="fixed-bottom d-none d-lg-block">

    <?php if (isset($_SESSION['alert_login'])) { ?>
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
        title: 'ورود با موفقیت انجام شد'
    })
    </script>
    <?php }
unset($_SESSION['alert_login']);
?>

</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/javascript.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>