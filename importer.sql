-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2022 at 07:45 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `top`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '1',
  `date` varchar(255) NOT NULL,
  `reply` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `sender`, `course`, `content`, `rating`, `date`, `reply`) VALUES
(21, 1, 5, '<p>سلام آموزش خوبی بود</p>', 3, '1644592587', 0),
(22, 1, 6, '<p>ساختمان داده و الگوریتم</p>', 4, '1644592610', 0),
(23, 1, 6, '<p>ساختمان داده reply</p>', 5, '1644592668', 22);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `tag` text NOT NULL,
  `cat` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `value` bigint(50) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `intro` varchar(255) NOT NULL,
  `create_date` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `content`, `image`, `tag`, `cat`, `slug`, `value`, `level`, `status`, `intro`, `create_date`, `update_date`) VALUES
(5, 'آموزش یونیتی', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(57,65,69);\">آنریل انجین 4 یک موتور بسیار قدرتمند در زمینه بازی سازی میباشد که رایگان است و توسط شرکت اپیک گیمز توسعه داده شده است و بسیاری از شرکت های بزرگ بازی سازی از آن استفاده میکنند.</span></p><p>نریل انجین به سبب رندر های با کیفیت و ریل تایمی ایجاد میکند بسیار مشهور و پرطرفدار است.</p><p>در این دوره ما به بررسی نحوه کار با این نرم &nbsp;موتور قدرتمند میپردازیم</p>', '9611-PHP.png', 'بازی سازی, یونیتی', 7, 'Unity', 700, 3, 1, '', 1620118041, 1623431165),
(6, 'ساختمان داده و الگوریتم', '<p>آقای ایلان ماسک میگن که ۲ قانون طلایی برای اینکه بتونیم زیاد یاد بگیریم و هیچ وقت چیزی از یادمون نره وجود داره:</p><p>&nbsp; &nbsp;۱- پایه ها و اساس رو خیلی خوب یاد بگیریم. چون موارد بعدی روی این ها سوار میشه و اگر پایه های یک میز بلغزه دیگه نمیتونیم به راحتی روش چیزی بزاریم. همش ترس این رو داریم که یه بار نیفته!</p><p>&nbsp;۲- دوم اینکه چیزایی که یاد میگیریم رو با چیزایی که از قبل بلد هستیم به اصطلاح link یا وصل کنیم. اینطوری مطلب جدید به حافظه ی بلندمدت میره و خیلی خیلی بعید هست که بخواد یادمون بره.&nbsp;</p><p>&nbsp;</p><p>&nbsp;حالا این رو گفتم که اهمیت پایه یک مفهومی که دارید یادمیگیرید رو بهتون تاکید کنم. اگر میخواین وارد دنیای کامپیوتر بشین و هر بخش از این دنیای بیکران رو ادامه بدید نه لزوما برنامه نویسی باید بتونید شناخت خوبی از ساختمان داده ها و الگوریتم ها داشته باشید.</p><p>زیاد هستن متاسفانه افرادی که در سطح متخصص فعالیت میکنن ولی همچنان روی اصول پایه مشکل دارن. &nbsp;پس:</p><p>&nbsp; &nbsp;&nbsp;<i><strong>تو این دوره یاد میگیریم که ساختمان داده های موردنیاز تو علوم کامپیوتر و برنامه نویسی چیا هستن و چه موقع باید از هرکدوم استفاده کنیم</strong></i></p><p><i><strong>&nbsp; &nbsp; و اینکه الگوریتم های مربوط &nbsp;و متناسب با مساله ای که میخوایم حل کنیم چی هست و چطوری باید کدنویسی بشه.</strong></i></p><p>&nbsp;</p><p>دوستانی که با پس زمینه مهندسی و کامپیوتر هستن از دانشگاه این بخش روی &nbsp;در قسمت ساختمان داده پاس میکنن ولی من نظر شخصیم اینه که زیاد به دانشگاه اعتقادی ندارم?</p><p>&nbsp;</p><p>در ضمن تفاوت این دوره با دوره های دیگه این هست که در هر بخش سوالات مهم و پرتکرار مصاحبه های شرکت مهم دنیا مثل گوگل - اپل - فیسبوک - آمازون و ... رو باهم بررسی میکنیم و کامل براتون اون رو توضیح میدم که قشنگ متوجه بشید و یک سری تمرین هم داریم.?</p>', '9611-PHP.png', 'الگوریتم , برنامه نویسی', 7, 'Alguritm', 700, 2, 1, 'https://up.20script.ir/files/6398-Data-746.mp4', 1621190572, 1621192946),
(10, 'پایتون آموزش', '<p>مروزه هوش مصنوعی به یکی از 5 علم برتر دنیا تبدیل شده و رد پای آن را میتوان در هر زمینه ای مشاهده کرد</p><p>شرکت های نرم افزاری، کمپانی های بازی سازی، شرکت های خصوصی که به دنبال افزایش فروش محصولات خود هستند و حتی دولت ها در زمینه های سیاسی خود از آمار و احتمالات در کنار هوش مصنوعی استفاده میکنند تا بتوانند در دنیای فناوری امروز که هر لحظه در حال پیشرفت می باشد ، خود را اثبات کرده و پایدار باقی بمانند</p><p>وظیفه ی هوش مصنوعی تصمیم گیری و انجام مواردی است که نیاز به هوش انسانی دارد و از این رو میتوانید آن را در پروژه های خود به طور گسترده مورد استفاده قرار دهید</p><p>در این دوره ی آموزشی قصد داریم با مفاهیم هوش مصنوعی آشنا شده و آن را در فرایندهای مختلف مورد استفاده قرار دهیم تا شما عزیزان بتوانید به صورت کاملا شخصی سازی شده ، از هوش مصنوعی در پروژه های خود استفاده کنین.</p><p>هدف ما یادگیری مباحث هوش مصنوعی ، یادگیری ماشین ( Machine Learning ) و مباحث تکمیلی یادگیری عمیق ( Deep Learning ) و شبکه های عصبی بوده و تمامی مباحث به صورت عملی به شما عزیزان تدریس خواهد شد</p><p>مخاطبین این دوره افرادی هستند که به مبحث هوش مصنوعی علاقه داشته و یا اینکه می خواهند از این گرایش در پروژه های خود استفاده کرده و میزان درآمد خود را افزایش دهند</p>', '9611-PHP.png', 'برنامه نویسی ویندوز , پایتون , آموزش پایتون', 5, 'Pythone', 450, 1, 0, 'https://up.20script.ir/files/6398-Data-746.mp4', 1621192491, 1621193257);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `z` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `src` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `z`, `sort`, `src`) VALUES
(1, 'برنامه نویسی وب', 0, 1, 'Web'),
(3, 'php', 1, 1, 'php'),
(4, 'الگوریتم و فلوچارت', 0, 2, 'Alguritm'),
(5, 'مبانی الگوریتم', 4, 1, 'Basic-Alguritm'),
(6, 'برنامه نویسی ویندوز', 0, 3, 'Windows-Programming'),
(7, 'پایتون', 6, 1, 'Pythone');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

DROP TABLE IF EXISTS `part`;
CREATE TABLE IF NOT EXISTS `part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `percents`
--

DROP TABLE IF EXISTS `percents`;
CREATE TABLE IF NOT EXISTS `percents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `perc` int(5) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `percents`
--

INSERT INTO `percents` (`id`, `title`, `code`, `perc`) VALUES
(1, 'عید قریان', 'ghorban1401', 60),
(2, 'جمعه ی سیاه', 'black_friday', 25),
(5, 'عید غدیر', 'ghadir_khom', 60);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `time` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `course_id`, `status`, `time`) VALUES
(6, 2, 10, 0, 1648949248),
(7, 2, 6, 0, 1648948248),
(12, 1, 10, 1, 1651627757),
(14, 3, 5, 0, NULL),
(15, 1, 5, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sender` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `main` int(11) DEFAULT NULL,
  `time` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `description`, `sender`, `reply`, `main`, `time`) VALUES
(5, 'متن تیکت شماره 1 ', '<p>متن تیکت شماره 1 متن تیکت شماره 1 م<span style=\"color:hsl(0, 75%, 60%);\">تن تیکت شماره 1 متن تیکت شماره 1 متن تیکت ش</span>ماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1&nbsp;</p>', 3, 0, 5, 1650174024),
(6, 'اصلاحیه', '<p>متن تیکت شماره 1 متن تیکت شماره 1 م<span style=\"color:hsl(0, 75%, 60%);\">تن تیکت شماره 1 متن تیکت شماره 1 متن تیکت ش</span>ماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متasdasdasdasdasdن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1 متن تیکت شماره 1&nbsp;</p>', 3, 5, 5, 1650174024),
(7, 'پاسخ پیگیری ادمین', '<p>متن تیکت شماره 1 متن تیکت شماره 1 م<span style=\"color:hsl(0, 75%, 60%);\">تن تیکت شماره 1 متن تیکت شماره 1سیسیسیسیسییسی متن تیکت ش</span>ماره 1 متن تیکت شماره 1 متن تیکت شماره تیکت شماره 1&nbsp;</p>', 1, 5, 5, 1650174024),
(8, '', '<p><span style=\"background-color:rgb(215,215,215);color:rgb(121,121,121);\">تن تیکت شماره 1 متن تیکت شماره 1 م</span><span style=\"background-color:rgb(215,215,215);color:rgb(230,76,76);\">تن تیکت شماره 1 متن تیکت شماره 1سیسیسیسیسییسی متن تیکت ش</span><span style=\"background-color:rgb(215,215,215);color:rgb(121,121,121);\">ماره 1 متن تیکت</span></p>', 1, 5, 5, 1653118873),
(9, '', '<p>تیکت ادمین</p>', 1, 5, 5, 1653118882),
(10, '', '<p>ممنون با پیگیری شما <strong>مشکل </strong>موجود رفع شد.</p>', 3, 5, 5, 1653120308),
(11, '', '<p>باتشکر از همراهی شما</p>', 1, 5, 5, 1653120467);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'admin', 'a@gmail.com', '1', 3, 1),
(2, 'Hossein', 'hossein@gmail.com', '2', 2, 1),
(3, 'mohammad', 'b@gmail', '1', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
