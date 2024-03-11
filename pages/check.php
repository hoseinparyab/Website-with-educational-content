<?php
include "../config/db.php";
$Errorchek= null;
$SuccessCheck=null;
if (isset($_GET['check'])){
    global $conn;
    $active = $_GET['check'];
    $gt = $conn->prepare("UPDATE user SET status=? WHERE active=?");
    $gt->bindValue(1, 1 ); // Set status in 0 to 1
    $gt->bindValue(2, $active);
    $gt->execute();
    $gt = $conn -> prepare("SELECT active FROM user WHERE active=?");
    $gt ->bindValue(1,$active);
    $gt->execute();
    if ($gt->rowCount()>=1){
        $SuccessCheck = true;
    }elseif ($gt->rowCount()<=0){
        $Errorchek= true;
    }
}
?>

<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>آکادمی</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <!-- top header -->
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
                        <li style="margin-top: -40px ;list-style :none;">
                                <a href="login.php" class="btn btn-primary">ورود</a>
                                <a href="register.php" class="btn btn-primary">ثبت نام</a>
                        </li>
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
                    <li class="nav-item d-block d-lg-none">
                        <input type="search" width="100%" placeholder="دنبال چی میگردی؟" class="serchbox-mobile">
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: #fff; margin-top: -2px;">برنامه نویسی<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #fff">طراحی سایت</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: #fff;">گرافیک<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: #fff;">انیمیشن<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: #fff;">برنامه نویسی موبایل<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
                            بازی سازی
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <a class="dropmenu" href="#">یونیتی</a>
                            <a class="dropmenu" href="#">آنریل انجین</a>
                            <a class="dropmenu" href="#">java</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>


    <div class="container">
        <div class="row">
            <div class="register-item">
                <div class="header-register">
                    <h4>ثبت نام در سایت</h4>
                    <p>با ثبت نام در سایت ، از مزایای کاربران سایت بهره مند شوید</p>
                    <img src="https://toplearn.com/Site/images/register.svg" width="320px" style="margin-right: 98px;"alt="">
                </div>

                <div class="input-register">
                    <form method="GET">
                        <input name="check" type="number" style="display: block; width: 385px;" placeholder="کد اعتبار سنجی را وارد کنید" class="text-test"><br>
                        <input name="sub" type="submit"  value="تایید" class="btn btn-info" >  
                    </form>
                </div>

            </div>
        </div>
        </div>
    </div>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
                        <a style="color: #fff; display:block;margin-top: 10px;""  href="">تبلیغات</a>
                        <a style=" color: #fff; display:block;margin-top: 10px;"" href="">درباره راکت</a>
                        <a style="color: #fff; display:block;margin-top: 10px;""  href="">ارتباط با ما</a>
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
                        </div><br>
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
</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/javascript.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php if($_GET['Success']==true){?>
    <script>toastr.warning(' ثبت نام با موفقیت انجام شد لطفا حساب خود را تایید کنید')</script>
<?php }?>

<?php if($SuccessCheck){?>
    <script>toastr.success('حساب کاربری شما با موفقیت فعال شد لطفا از  دکمه ورود وارد پنل شوید')</script>
<?php }?>

<?php if($Errorchek){?>
    <script>toastr.error('کد فعالسازی نانعتبر است')</script>
<?php }?>
</html>
