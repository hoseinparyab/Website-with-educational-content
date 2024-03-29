<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>آقای ادمین | قالب واکنشگرا مدیریتی</title>

    <!-- Plugins css-->
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- App CSS -->
    <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo"><span>آقای<span>ادمین</span></span><i class="zmdi zmdi-layers"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title">فرم های پیشرفته</h4>
                    </li>
                </ul>

                <!-- Right(Notification and Searchbox -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline m-b-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="zmdi zmdi-notifications-none"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="به دنبال چه می گردی ؟؟؟"
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!-- User -->
            <div class="user-box">
                <div class="user-img">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                </div>
                <h5><a href="#">علی یدالهی</a> </h5>
                <ul class="list-inline">
                    <li>
                        <a href="#" >
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-custom">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End User -->

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">دسته بندی ها</li>

                    <li>
                        <a href="index.html" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> داشبورد </span> </a>
                    </li>

                    <li>
                        <a href="typography.html" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> نوشته ها </span> </a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> رابط کاربی </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="ui-buttons.html">دکمه ها</a></li>
                            <li><a href="ui-cards.html">کارد</a></li>
                            <li><a href="ui-draggable-cards.html">کارت های جابه جا شونده</a></li>
                            <li><a href="ui-checkbox-radio.html">چک باکس ها</a></li>
                            <li><a href="ui-material-icons.html">آیکون های طراحی متریال</a></li>
                            <li><a href="ui-font-awesome-icons.html">فونت آسوم</a></li>
                            <li><a href="ui-themify-icons.html">تم فی آیکون</a></li>
                            <li><a href="ui-modals.html">مدل ها</a></li>
                            <li><a href="ui-notification.html">اطلاعات</a></li>
                            <li><a href="ui-range-slider.html">نوار تغیرات</a></li>
                            <li><a href="ui-components.html">اجزا</a>
                            <li><a href="ui-sweetalert.html">هشدار ها</a>
                            <li><a href="ui-treeview.html">نمایش درختی</a>
                            <li><a href="ui-widgets.html">ویجت ها</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect active"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right">7</span><span> فرم ها </span> </a>
                        <ul class="list-unstyled">
                            <li><a href="form-elements.html">فرم های عمومی</a></li>
                            <li class="active"><a href="form-advanced.html">فرم های پیشرفته</a></li>
                            <li><a href="form-validation.html">فرم ولیدشن</a></li>
                            <li><a href="form-wizard.html">فرم پیشفرض</a></li>
                            <li><a href="form-fileupload.html">فرم آپلود</a></li>
                            <li><a href="form-wysiwig.html">ادیتور 1</a></li>
                            <li><a href="form-xeditable.html">ادیتور 2</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i> <span> جدول ها </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="tables-basic.html">جدول پیشفرض</a></li>
                            <li><a href="tables-datatable.html">جدول داده ها</a></li>
                            <li><a href="tables-responsive.html">جدول واکنش گرا</a></li>
                            <li><a href="tables-editable.html">جدول تغیرات</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect "><i class="zmdi zmdi-chart"></i><span> چارت ها </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="chart-flot.html">چارت شماره 1</a></li>
                            <li><a href="chart-morris.html">چارت شماره 2</a></li>
                            <li><a href="chart-chartist.html">چارت شماره 3</a></li>
                            <li><a href="chart-chartjs.html">چارت شماره 4</a></li>
                            <li><a href="chart-other.html">چارت شماره 5</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="calendar.html" ><i class="zmdi zmdi-calendar"></i><span> تقویم </span></a>
                    </li>

                    <li>
                        <a href="inbox.html" class="waves-effect"><i class="zmdi zmdi-email"></i><span class="label label-purple pull-right">جدید</span><span> ایمیل </span></a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> برگه ها </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="page-starter.html">برگه خالی</a></li>
                            <li><a href="page-login.html">ورود</a></li>
                            <li><a href="page-register.html">ثبت نام</a></li>
                            <li><a href="page-recoverpw.html">فراموشی رمز</a></li>
                            <li><a href="page-lock-screen.html">قفل صفحه</a></li>
                            <li><a href="page-confirm-mail.html">تنظیمات ایمیل</a></li>
                            <li><a href="page-404.html">خطای 404</a></li>
                            <li><a href="page-500.html">خطای 500</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect "><i class="zmdi zmdi-layers"></i><span>دیگر صفحات </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="extras-projects.html">پروژ ه ها</a></li>
                            <li><a href="extras-tour.html">تور آزمایشی</a></li>
                            <li><a href="extras-taskboard.html">مدیرها</a></li>
                            <li><a href="extras-taskdetail.html">جزئیات</a></li>
                            <li><a href="extras-profile.html">پروفایل </a></li>
                            <li><a href="extras-maps.html">نقشه</a></li>
                            <li><a href="extras-contact.html">لیست تماس</a></li>
                            <li><a href="extras-pricing.html">فروش</a></li>
                            <li><a href="extras-timeline.html">خط زمان</a></li>
                            <li><a href="extras-invoice.html">صورت حساب</a></li>
                            <li><a href="extras-faq.html">سوال و جواب</a></li>
                            <li><a href="extras-gallery.html">گالری</a></li>
                            <li><a href="extras-email-template.html">تم های ایمیل</a></li>
                            <li><a href="extras-maintenance.html">تعمیرات</a></li>
                            <li><a href="extras-comingsoon.html">به زودی</a></li>
                        </ul>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">تگ های ورودی</h4>

                            <h5><b>آموزش استفاده از تگ ورودی</b></h5>
                            <p class="text-muted m-b-20 font-13">
                                کافیست کد <code>data-role="tagsinput"</code> این را در فیلد مورد نظر وارد کنید
                            </p>
                            <div class="tags-default">
                                <input type="text" value="کلمه یک,کلمه دو,کلمه سه" data-role="tagsinput" placeholder="افزودن تگ"/>
                            </div>

                            <h5 class="m-t-40"><b>استفاده از چند تگی</b></h5>
                            <p class="text-muted m-b-20 font-13">
                                با استفاده از  <code>&lt;select multiple /&gt;</code> و کد <code>&lt;option /&gt;</code>در فرم این پوت خود از چند تگی استفاده کنید
                            </p>
                            <div class="m-b-0">
                                <select multiple data-role="tagsinput">
                                    <option value="Amsterdam">کلمه یک</option>
                                    <option value="Washington">کلمه دو</option>
                                    <option value="Sydney">کلمه سه</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">سویچر</h4>

                            <h5><b>Basic</b></h5>
                            <p class="text-muted m-b-20 font-13">
                                با کد<code>
                                    data-plugin="switchery" data-color="@colors"</code>
                                برای فرم ورودی خود یک سویچر بسازید
                            </p>

                            <div class="switchery-demo">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#ffaa00"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#3DDCF7"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#7266ba"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#f76397"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#4c5667"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#98a6ad"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#ef5350"/>
                            </div>

                            <h5 class="m-t-40"><b>سایز & رنگ دلخواه</b></h5>
                            <p class="text-muted m-b-20 font-13">
                                با اسستفاده از کد <code>
                                    data-size="small",data-size="large"</code>,<code>
                                    data-color="@color" data-secondary-color="@color"</code>
                                به سویچر خ.د رنگ و سایز دلخواه بدهید
                            </p>

                            <div class="">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" data-size="small"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#3DDCF7"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#4c5667" data-size="large"/>
                                <input type="checkbox" data-plugin="switchery" data-color="#1AB394" data-secondary-color="#ED5565" />
                                <input type="checkbox" data-plugin="switchery" data-color="#fb6d9d"  data-secondary-color="#7266ba" />
                            </div>

                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">چند انتخابی</h4>
                            <h5><strong></strong></h5>
                            <p class="text-muted m-b-15 font-13">
                                با کد<code>
                                    &lt;select multiple /&gt;</code>
                                انتخاب های آسانی داشته باشید
                            </p>

                            <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]" data-plugin="multiselect">
                                <option>علی یدالهی</option>
                                <option>علی حسینی</option>
                                <option selected>فرهاد پور هاشم</option>
                                <option selected>یزدان نوروزی</option>
                                <option>عیسی زارع پور</option>
                                <option>مجتبی پور نصر اله</option>
                                <option>مهرداد مسلمی</option>

                                <option selected>حسن محقق</option>
                                <option>محمد احمدی</option>
                                <option>بهزاد </option>
                                <option>پیمان</option>
                                <option>نیما</option>

                            </select>

                            <h5 class="m-t-30"><b>انتخواب گروهی</b></h5>
                            <p class="text-muted m-b-15 font-13">
                                با کد <code>
                                    &lt;select multiple /&gt;</code>
                                چندیدن انتخاب داشته باشید
                            </p>

                            <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]" data-plugin="multiselect" data-selectable-optgroup="true">
                                <optgroup label="NFC EAST">
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                </optgroup>
                                <optgroup label="NFC NORTH">
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                </optgroup>
                                <optgroup label="NFC SOUTH">
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                </optgroup>
                                <optgroup label="NFC WEST">
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                    <option>متن دستی</option>
                                </optgroup>
                            </select>

                            <h5 class="m-t-30"><b>جستجو</b></h5>
                            <p class="text-muted m-b-15 font-13">
                                با استفاده <code>
                                    &lt;select multiple /&gt;</code>
                                در ورودیها و انتخاب ها
                            </p>

                            <select name="country" class="multi-select" multiple="" id="my_multi_select3" >
                                <option value="AF">متن دستی</option>
                                <option value="AL">متن دستی</option>
                                <option value="DZ">متن دستی</option>
                                <option value="AS">متن دستی</option>
                                <option value="AD">متن دستی</option>
                                <option value="AO">متن دستی</option>
                                <option value="AI">متن دستی</option>
                                <option value="AQ">متن دستی</option>
                                <option value="AR">متن دستی</option>
                                <option value="AM">متن دستی</option>
                                <option value="AW">متن دستی</option>
                                <option value="AU">متن دستی</option>
                                <option value="AT">متن دستی</option>
                                <option value="AZ">متن دستی</option>
                                <option value="BS">متن دستی</option>
                                <option value="BH">متن دستی</option>
                                <option value="BD">متن دستی</option>
                                <option value="BB">متن دستی</option>
                                <option value="BY">متن دستی</option>
                                <option value="BE">متن دستی</option>
                                <option value="BZ">متن دستی</option>
                                <option value="BJ">متن دستی</option>
                                <option value="BM">متن دستی</option>
                                <option value="BT">متن دستی</option>
                                <option value="BO">متن دستی</option>
                                <option value="BA">متن دستی</option>
                                <option value="BW">متن دستی</option>
                                <option value="BV">متن دستی</option>
                                <option value="BR">جمله تستی</option>
                                <option value="IO">جمله تستی</option>
                                <option value="BN">جمله تستی</option>
                                <option value="BG">جمله تستی</option>
                                <option value="BF">جمله تستی</option>
                                <option value="BI">جمله تستی</option>
                                <option value="KH">جمله تستی</option>
                                <option value="CM">جمله تستی</option>
                                <option value="CA">جمله تستی</option>
                                <option value="CV">جمله تستی</option>
                                <option value="KY">جمله تستی</option>
                                <option value="CF">جمله تستی</option>
                                <option value="TD">جمله تستی</option>
                                <option value="CL">جمله تستی</option>
                                <option value="CN">جمله تستی</option>
                                <option value="CX">جمله تستی</option>
                                <option value="CC">جمله تستی</option>
                                <option value="CO">جمله تستی</option>
                                <option value="KM">جمله تستی</option>
                                <option value="CG">جمله تستی</option>
                                <option value="CD">جمله تستی</option>

                            </select>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">انتخابی 2</h4>

                            <h5><b>تک انتخابی</b></h5>

                            <select class="form-control select2">
                                <option>انتخاب</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">متن تستی</option>
                                    <option value="HI">متن تستی</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">متن تستی</option>
                                    <option value="NV">متن تستی</option>
                                    <option value="OR">متن تستی</option>
                                    <option value="WA">متن تستی</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">متن تستی</option>
                                    <option value="CO">متن تستی</option>
                                    <option value="ID">متن تستی</option>
                                    <option value="MT">متن تستی</option>
                                    <option value="NE">متن تستی</option>
                                    <option value="NM">متن تستی متن تستی</option>
                                    <option value="ND">متن تستی متن تستی</option>
                                    <option value="UT">متن تستی</option>
                                    <option value="WY">متن تستی</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">متن تستی</option>
                                    <option value="AR">متن تستی</option>
                                    <option value="IL">متن تستی</option>
                                    <option value="IA">متن تستی</option>
                                    <option value="KS">متن تستی</option>
                                    <option value="KY">متن تستی</option>
                                    <option value="LA">متن تستی</option>
                                    <option value="MN">متن تستی</option>
                                    <option value="MS">متن تستی</option>
                                    <option value="MO">متن تستی</option>
                                    <option value="OK">متن تستی</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">متن تستی</option>
                                    <option value="TN">متن تستی</option>
                                    <option value="WI">متن تستی</option>
                                </optgroup>

                            </select>

                            <h5 class="m-t-30"><b>چند انتخابی</b></h5>

                            <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder=" اتتخابی کن ...">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">متن تستی</option>
                                    <option value="HI">متن تستی</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">متن تستی</option>
                                    <option value="NV">متن تستی</option>
                                    <option value="OR">متن تستی</option>
                                    <option value="WA">متن تستی</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">متن تستی</option>
                                    <option value="CO">متن تستی</option>
                                    <option value="ID">متن تستی</option>
                                    <option value="MT">متن تستی</option>
                                    <option value="NE">متن تستی</option>
                                    <option value="NM">متن تستی</option>
                                    <option value="ND">متن تستی</option>
                                    <option value="UT">متن تستی</option>
                                    <option value="WY">متن تستی</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">متن تستی</option>
                                    <option value="AR">متن تستی</option>
                                    <option value="IL">متن تستی</option>
                                    <option value="IA">متن تستی</option>
                                    <option value="KS">متن تستی</option>
                                    <option value="KY">متن تستی</option>
                                    <option value="LA">متن تستی</option>
                                    <option value="MN">متن تستی</option>
                                    <option value="MS">متن تستی</option>
                                    <option value="MO">متن تستی</option>
                                    <option value="OK">متن تستی</option>
                                    <option value="SD">متن تستی</option>
                                    <option value="TX">متن تستی</option>
                                    <option value="TN">متن تستی</option>
                                    <option value="WI">متن تستی</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">متن تستی</option>
                                    <option value="DE">متن تستی</option>
                                    <option value="FL">متن تستی</option>
                                    <option value="GA">متن تستی</option>
                                    <option value="IN">متن تستی</option>
                                    <option value="ME">متن تستی</option>
                                    <option value="MD">متن تستی</option>
                                    <option value="MA">متن تستی</option>
                                    <option value="MI">متن تستی</option>

                                </optgroup>
                            </select>

                            <h5 class="m-t-30"><b>محدوده انتخابی </b></h5>

                            <select class="select2-limiting" multiple="multiple">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">متن تستی</option>
                                    <option value="HI">متن تستی</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">متن تستی</option>
                                    <option value="NV">متن تستی</option>
                                    <option value="OR">متن تستی</option>
                                    <option value="WA">متن تستی</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">متن تستی</option>
                                    <option value="CO">متن تستی</option>
                                    <option value="ID">متن تستی</option>
                                    <option value="MT">متن تستی</option>
                                    <option value="NE">متن تستی</option>
                                    <option value="NM">متن تستی</option>
                                    <option value="ND">متن تستی</option>
                                    <option value="UT">متن تستی</option>
                                    <option value="WY">متن تستی</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">متن تستی</option>
                                    <option value="AR">متن تستی</option>
                                    <option value="IL">متن تستی</option>
                                    <option value="IA">متن تستی</option>
                                    <option value="KS">متن تستی</option>
                                    <option value="KY">متن تستی</option>
                                    <option value="LA">متن تستی</option>
                                    <option value="MN">متن تستی</option>
                                    <option value="MS">متن تستی</option>
                                    <option value="MO">متن تستی</option>
                                    <option value="OK">متن تستی</option>
                                    <option value="SD">متن تستی</option>
                                    <option value="TX">متن تستی</option>
                                    <option value="TN">متن تستی</option>
                                    <option value="WI">متن تستی</option>
                                </optgroup>

                            </select>
                        </div>

                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">ورودیهای پیشرفته</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-20">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>ISBN 1</label>
                                                <input type="text" placeholder="" data-mask="999-99-999-9999-9" class="form-control">
                                                <span class="font-13 text-muted">e.g "999-99-999-9999-9"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>ISBN 2</label>
                                                <input type="text" placeholder="" data-mask="999 99 999 9999 9" class="form-control">
                                                <span class="font-13 text-muted">999 99 999 9999 9</span>
                                            </div>
                                            <div class="form-group">
                                                <label>ISBN 3</label>
                                                <input type="text" placeholder="" data-mask="999/99/999/9999/9" class="form-control">
                                                <span class="font-13 text-muted">999/99/999/9999/9</span>
                                            </div>
                                            <div class="form-group">
                                                <label>IPV4</label>
                                                <input type="text" placeholder="" data-mask="999.999.999.9999" class="form-control">
                                                <span class="font-13 text-muted">192.168.110.310</span>
                                            </div>
                                            <div class="form-group m-b-0">
                                                <label>IPV6</label>
                                                <input type="text" placeholder="" data-mask="9999:9999:9999:9:999:9999:9999:9999" class="form-control">
                                                <span class="font-13 text-muted">4deg:1340:6547:2:540:h8je:ve73:98pd</span>
                                            </div>

                                        </form>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-6">
                                    <div class="p-20">
                                        <form action="#">

                                            <div class="form-group">
                                                <label>شماره متنی</label>
                                                <input type="text" placeholder="" data-mask="99-9999999" class="form-control">
                                                <span class="font-13 text-muted">99-9999999</span>
                                            </div>
                                            <div class="form-group">
                                                <label>تلفن</label>
                                                <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control">
                                                <span class="font-13 text-muted">(999) 999-9999</span>
                                            </div>
                                            <div class="form-group">
                                                <label>واحد پولی</label>
                                                <input type="text" placeholder="" data-mask="$ 999,999,999.99" class="form-control">
                                                <span class="font-13 text-muted">$ 999,999,999.99</span>
                                            </div>
                                            <div class="form-group">
                                                <label>تاریخ 1</label>
                                                <input type="text" placeholder="" data-mask="99/99/9999" class="form-control">
                                                <span class="font-13 text-muted">dd/mm/yyyy</span>
                                            </div>
                                            <div class="form-group m-b-0">
                                                <label>تاریخ  2</label>
                                                <input type="text" placeholder="" data-mask="99-99-9999" class="form-control">
                                                <span class="font-13 text-muted">dd-mm-yyyy</span>
                                            </div>

                                        </form>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                        </div>

                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">متغیر های  لمسی و واکنش گرا</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-20">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">نوع 1</label>
                                                <input class="vertical-spin" type="text" value="" name="vertical-spin">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">نوع 2</label>
                                                <input id="demo0" type="text" value="55" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">نوع 3</label>
                                                <input id="demo1" type="text" value="55" name="demo1">
                                            </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">نوع 4 </label>
                                                <input id="demo2" type="text" value="0" name="demo2" class=" form-control">
                                            </div>

                                        </form>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-6">
                                    <div class="p-20">
                                        <form>

                                            <div class="form-group">
                                                <label class="control-label">نوع 5:</label>
                                                <input id="demo3" type="text" value="" name="demo3">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">نوع 6</label>
                                                <input id="demo3_21" type="text" value="" name="demo3_21">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">نوع 7 </label>
                                                <input id="demo3_22" type="text" value="33" name="demo3_22">
                                            </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">نوع 8</label>
                                                <div class="input-group">
                                                    <input id="demo5" type="text" class="form-control" name="demo5" value="50">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">نوع 9
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="#">فعال</a></li>
                                            <li><a href="#">متن یک</a></li>
                                            <li><a href="#">متن دو</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">متن پاورقی</a></li>
																</ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">زمان</h4>

                            <div class="">
                                <label>نوع 1</label>
                                <div class="input-group m-b-15">

                                    <div class="bootstrap-timepicker">
                                        <input id="timepicker" type="text" class="form-control">
                                    </div>
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                </div><!-- input-group -->

                                <label>نوع 2</label>
                                <div class="input-group m-b-15">

                                    <div class="bootstrap-timepicker">
                                        <input id="timepicker2" type="text" class="form-control">
                                    </div>
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                </div><!-- input-group -->

                                <label>نوع 3</label>
                                <div class="input-group m-b-0">

                                    <div class="bootstrap-timepicker">
                                        <input id="timepicker3" type="text" class="form-control">
                                    </div>
                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                </div><!-- input-group -->
                            </div>

                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">رنگ بندی</h4>

                            <div class="">
                                <form action="#">
                                    <div class="form-group">
                                        <label>نوع 1</label>
                                        <input type="text" class="colorpicker-default form-control" value="#8fff00">
                                    </div>
                                    <div class="form-group">
                                        <label>نوع 2</label>
                                        <input type="text" class="colorpicker-rgba form-control" value="rgb(0,194,255,0.78)" data-color-format="rgba">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <label>نوع 3</label>
                                        <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="colorpicker-default input-group">
                                            <input type="text" readonly value="" class="form-control">
                                            <span class="input-group-btn add-on">
                                                        <button class="btn btn-white" type="button">
                                                            <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i>
                                                        </button>
                                                    </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">تاریخ</h4>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form action="#" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">نوع 1</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">نوع 2</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">نوع 3</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">نوع 4</label>
                                                <div class="col-sm-8">
                                                    <div class="input-daterange input-group" id="date-range">
                                                        <input type="text" class="form-control" name="start" />
                                                        <span class="input-group-addon bg-primary b-0 text-white">تا</span>
                                                        <input type="text" class="form-control" name="end" />
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-4">
                                    <div class="p-20">
                                        <label>نوع 5</label>
                                        <div class="input-group">
                                            <div id="datepicker-inline"></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div><!-- end col -->

                            </div><!-- end row-->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">تاریخ نوع دیگه</h4>

                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="p-20">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">نوع 1</label>
                                                <div class="col-lg-8">
                                                    <div id="reportrange" class="pull-right form-control">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">نوع 2</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">نوع 3</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                                                </div>
                                            </div>
                                            <div class="form-group m-b-0">
                                                <label class="col-lg-4 control-label">نوع 4</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control input-limit-datepicker" type="text" name="daterange" value="06/01/2015 - 06/07/2015"/>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div><!-- end col -->

                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن یک</a></li>
                                    <li><a href="#">متن دو</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">ورودی های تعریف شدهh</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-20">
                                        <h5><b>نوع 1</b></h5>
                                        <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" />

                                        <div class="m-t-20">
                                            <input type="text" maxlength="25" name="thresholdconfig" class="form-control" id="thresholdconfig" />
                                        </div>

                                        <div class="m-t-20">
                                            <h5><b>نوع 2</b></h5>
                                            <input type="text" class="form-control" maxlength="25" name="moreoptions" id="moreoptions" />
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-6">
                                    <div class="p-20">
                                        <h5><b>نوع 3</b></h5>
                                        <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />

                                        <div class="m-t-20">
                                            <h5><b>نوع 4</b></h5>
                                            <input type="text" class="form-control" maxlength="25" name="placement" id="placement" />
                                        </div>
                                        <div class="m-t-20">
                                            <h5><b>نوع5</b></h5>
                                            <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="متنی با 255 کارکتر"></textarea>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            آقای ادمین2016 ©.
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    <div class="side-bar right-bar">
        <a href="javascript:void(0);" class="right-bar-toggle">
            <i class="zmdi zmdi-close-circle-o"></i>
        </a>
        <h4 class="">اعلانات</h4>
        <div class="notification-list nicescroll">
            <ul class="list-group list-no-border user-list">
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-2.jpg" alt="">
                        </div>
                        <div class="user-desc">
                            <span class="name">کاربر شماره یک</span>
                            <span class="desc">متن کاربر شماره یک</span>
                            <span class="time">2 ساعت قبل</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-info">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">ثبت نام جدید</span>
                            <span class="desc">کاربری جدید در سایت ثبت نام کرده است</span>
                            <span class="time">5 ساعت قبل</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-pink">
                            <i class="zmdi zmdi-comment"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">پیام جدید</span>
                            <span class="desc">متن پیام جدید از کاریی جدید</span>
                            <span class="time">1 روز قبل</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item active">
                    <a href="#" class="user-list-item">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-3.jpg" alt="">
                        </div>
                        <div class="user-desc">
                            <span class="name">کاربر شماره 2</span>
                            <span class="desc">با سلام من یک متن کاملا آزمایشی هستم</span>
                            <span class="time">2 روز قبل</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item active">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-warning">
                            <i class="zmdi zmdi-settings"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">تنظیمات</span>
                            <span class="desc">تنظیمات جدید برای دسترسی و راحتی شما موجود است</span>
                            <span class="time">1 روز قبل</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap-rtl.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- Plugins Js -->
<script src="assets/plugins/switchery/switchery.min.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
    jQuery(document).ready(function() {

        //advance multiselect start
        $('#my_multi_select3').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='جستجو...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='جستجو...'>",
            afterInit: function (ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });

    });

    //Bootstrap-TouchSpin
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        verticalupclass: 'ti-plus',
        verticaldownclass: 'ti-minus'
    });
    var vspinTrue = $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    if (vspinTrue) {
        $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
    }

    $("input[name='demo1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        postfix: '%'
    });
    $("input[name='demo2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
        maxboostedstep: 10000000,
        prefix: '$'
    });
    $("input[name='demo3']").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo3_21']").TouchSpin({
        initval: 40,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo3_22']").TouchSpin({
        initval: 40,
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });

    $("input[name='demo5']").TouchSpin({
        prefix: "کم کن",
        postfix: "زیاد کن",
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });
    $("input[name='demo0']").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    });

    // Time Picker
    jQuery('#timepicker').timepicker({
        defaultTIme : false
    });
    jQuery('#timepicker2').timepicker({
        showMeridian : false
    });
    jQuery('#timepicker3').timepicker({
        minuteStep : 15
    });

    //colorpicker start

    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    $('.colorpicker-rgba').colorpicker();

    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple-date').datepicker({
        format: "mm/dd/yyyy",
        clearBtn: true,
        multidate: true,
        multidateSeparator: ","
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });

    //Date range picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-default',
        cancelClass: 'btn-primary'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-default',
        cancelClass: 'btn-primary'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2016',
        maxDate: '06/30/2016',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-default',
        cancelClass: 'btn-primary',
        dateLimit: {
            days: 6
        }
    });

    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

    $('#reportrange').daterangepicker({
        format: 'MM/DD/YYYY',
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2016',
        maxDate: '12/31/2016',
        dateLimit: {
            days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'امروز': [moment(), moment()],
            'دیروز': [moment().subtract(1, 'روز '), moment().subtract(1, 'روز')],
            'یک هفته قبل': [moment().subtract(6, 'روز'), moment()],
            'یک ماه قبل': [moment().subtract(29, 'روز'), moment()],
            'در این ماه': [moment().startOf('ماه'), moment().endOf('ماه')],
            'ماه قبل': [moment().subtract(1, 'ماه').startOf('ماه'), moment().subtract(1, 'ماه').endOf('ماه')]
        },
        opens: 'چپ',
        drops: 'پایین',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-default',
        separator: ' تا ',
        locale: {
            applyLabel: 'قبول',
            cancelLabel: 'لغو',
            fromLabel: 'فورم',
            toLabel: 'تا',
            customRangeLabel: 'متغییر',
            daysOfWeek: ['یک شنبه', 'دو شنبه', 'سه شنبه', 'جهارشنبه', 'پنج شنبه', 'جمعه', 'شنبه'],
            monthNames: ['دی', 'بهمن', 'اسفند', 'فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر'],
            firstDay: 1
        }
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    //Bootstrap-MaxLength
    $('input#defaultconfig').maxlength()

    $('input#thresholdconfig').maxlength({
        threshold: 20
    });

    $('input#moreoptions').maxlength({
        alwaysShow: true,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger"
    });

    $('input#alloptions').maxlength({
        alwaysShow: true,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' خارج از ',
        preText: 'ورودی شما ',
        postText: ' کاراکتر مورد قبول.',
        validate: true
    });

    $('textarea#textarea').maxlength({
        alwaysShow: true
    });

    $('input#placement').maxlength({
        alwaysShow: true,
        placement: 'top-left'
    });
</script>

</body>
</html>