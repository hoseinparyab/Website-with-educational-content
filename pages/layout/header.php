
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تاپ لرن</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
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
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="nav-item dropdown">
                                <a style="color:#333; padding-left: 35px; margin-top: -50px;" class="nav-link" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   style="color: #fff">
                                    <svg width="0.8em" height="0.8em" viewBox="0 0 16 16" class="bi bi-caret-down-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
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
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>
                                        <?php if ($_SESSION['role'] == 1) {
                                            echo 'کاربر عادی';
                                        } else if($_SESSION['role'] == 2) {
                                            echo 'مدرس';
                                        }else{
                                            echo 'مدیر';
                                        } ?></a>
                                    <a class="dropmenu" href="#">
                                        <svg style="color: #6fc341; margin-left: 2px;" width="0.4em" height="0.4em"
                                             viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>
                                        <?php if ($_SESSION['status'] == 0) { ?> <a href=""
                                                                                    class="btn btn-danger"
                                                                                    style="margin: 15px 15px 0 0;">غیرفعال</a> <?php } else { ?>
                                            <a href=""
                                               class="btn btn-success"
                                               style="margin: 15px 15px 0 0;">فعال</a> <?php } ?></a>
                                    <a class="dropmenu" href="shop.php">
                                        سبد خرید
                                    </a>
                                    <?php if ($_SESSION['role'] == 3) { ?>

                                        <a class="dropmenu" href="../admin">
                                            <svg style="color: #6fc341; margin-left: 2px;" width="0.4em" height="0.4em"
                                                 viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="8" cy="8" r="8"/>
                                            </svg>
                                            پنل ادمین</a>
                                    <?php } ?>

                                </div>
                            </li>
                        <?php } else { ?>
                            <li style="margin-top: -40px">
                                <a href="login.php" class="btn btn-primary">ورود</a>
                                <a href="register.php" class="btn btn-primary">ثبت نام</a>
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
         style="background-color: #333; margin-left: -16px; margin-right: -22px;">
        <div class="container">
            <ul class="navbar-nav">
                <?php foreach ($menus as $menu) {
                    if ($menu['z'] == 0) { ?>
                        <li class="nav-item dropdown">
                            <a href="<?php echo $menu['src']; ?>" class="nav-link  <?php foreach ($menus as $z) {
                                if ($menu['id'] == $z['z']) { ?> dropdown-toggle <?php }
                            } ?>" " href="#" id="navbarDropdown" role="button"
                            <?php foreach ($menus as $z) {
                                if ($menu['id'] == $z['z']) { ?> data-toggle="dropdown" <?php }
                            } ?> aria-haspopup="true" aria-expanded="false" style="color: #fff">
                            <?php echo $menu['title']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                <?php foreach ($menus as $ul) {
                                    if ($menu['id'] == $ul['z']) { ?>
                                        <a class="dropmenu"
                                           href="<?php echo $ul['src']; ?>"><?php echo $ul['title']; ?></a>
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