<?php 
define('INDEX',true);
require("config/db_connection.php");
require("config/common.php");
require("config/functions.php");
require("source/config_user.php");
require("source/function_user.php");
switch($_GET['p']){
	case "home":
	default:
        $page_require = "source/center.php";
        break;
    case "gioithieu":
        $page_require = "source/gioithieu.php";
        break;
    case "thongbao":
        $page_require = "source/thongbao.php";
        break;
    case "tintucsinhhoat":
        $page_require = "source/tintucsinhhoat.php";
        break;
    case "dacsanbaclieu":
        $page_require = "source/dacsanbaclieu.php";
        break;
    case "lienlachoi":
        $page_require = "source/lienlachoi.php";
        break;
    case "truyenngan":
        $page_require = "source/truyenngan.php";
        break;
    case "tho":
        $page_require = "source/tho.php";
        break;
    case "nhac":
        $page_require = "source/nhac.php";
        break;
    case "truyenvuicuoi":
        $page_require = "source/truyenvuicuoi.php";
        break;
    case "thamkhaosuutam":
        $page_require = "source/thamkhaosuutam.php";
        break;
    case "tinbuon":
        $page_require = "source/tinbuon.php";
        break;
    case "tinvui":
        $page_require = "source/tinvui.php";
        break;
    case "dacsan":
        $page_require = "source/dacsan.php";
        break;
    case "suckhoedoisong":
        $page_require = "source/suckhoedoisong.php";
        break;
    case "hinhanhsinhhoat":
        $page_require = "source/hinhanhsinhhoat.php";
        break;
    case "hinhhe2023":
        $page_require = "source/hinhhe2023.php";
        break;
    case "hinhtet2024":
        $page_require = "source/hinhtet2024.php";
        break;
    case "hinhhe2024":
        $page_require = "source/hinhhe2024.php";
        break;
        
	case "data":
	$page_require = "source/data.php";
	break;
	case "images":
	$page_require = "source/images.php";
	break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Welcome to Hội Ái Hữu Bạc Liệu Tại Bắc CaLi :.</title>
<meta name="description"  />
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="change_banner.js"></script>
<script type="text/javascript" src="Scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	/*----- slideshow ---*/
/* imgshow banner*/	
setInterval('imageRotator()', 3000);
$('.dropdown').each(function () {
$(this).parent().eq(0).hover(function () {
$('.dropdown:eq(0)', this).show();
}, function () {
$('.dropdown:eq(0)', this).hide();
});
});	
});

</script>
</head>
<body>

<div id="site-wrapper">
	<div id="head">
        <div id="logo">
        	<div class="left"><img src="images/logo.png" /></div>
            <div id="imgShow" class="left" style="padding-top:5px; padding-left:50px;">
           
            	<ul id="imageShow">   		
                	<li class="current" ><img src="images/banner/banner_1.jpg" style="border: 2px solid #016401;" /></li>
             		<li> <img src="images/banner/banner_2.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_3.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_14.jpg" style="border: 2px solid #016401;" /></li>
			        <li> <img src="images/banner/banner_15.jpg" style="border: 2px solid #016401;" /></li>
             		<li> <img src="images/banner/banner_13.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_12.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_11.jpg" style="border: 2px solid #016401;" /></li>
             		<li> <img src="images/banner/banner_4.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_5.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_6.jpg" style="border: 2px solid #016401;" /></li>
             		<li> <img src="images/banner/banner_7.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_8.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_9.jpg" style="border: 2px solid #016401;" /></li>
                    <li> <img src="images/banner/banner_10.jpg" style="border: 2px solid #016401;" /></li>   
                </ul>
                <div class="clearer">&nbsp;</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="menu" >
        <ul>
            <li><a href="index.php?p=home">Trang Chủ</a></li>
            <li><a href="index.php?p=gioithieu">Giới Thiệu</a></li>
            <li><a href="index.php?p=thongbao">Thông Báo</a></li>
            <li><a href="index.php?p=tintucsinhhoat">Tin Tức Sinh Hoạt</a></li>
            <li><a href="index.php?p=dacsanbaclieu">Đặc Sản Bạc Liêu</a></li>
            <li><a href="index.php?p=lienlachoi">Liên Lạc Hội</a></li>     
        </ul>
        <div class="clear"></div>
        <div id="sub_menu"></div>
    </div>

    <div id="content_center">
        <div id="left" class="left">
            <?php require($left); ?></div>
        <div id="center" class="left">
            <?php require($page_require);?></div>
        <div id="left" class="left">
            <?php require($right);?></div> 
        <div class="clear"></div>
    </div>
    
    <div id="bottom">Copyright 2013 by Hội Ái Hữu Bạc Liêu Bắc Cali  </div>
</div>

</body>
</html>