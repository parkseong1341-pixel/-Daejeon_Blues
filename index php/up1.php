<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     

  <style>

  html, body{ overflow-x: hidden; font-size:14px !important;}
    
  *{margin: 0; padding: 0;box-sizing: border-box;}
  ul{list-style: none;}
  a{text-decoration: none;}
        
  /* 메뉴바 */
  #menu{width: 100%; height: 95px;  top: 0; left: 0; position: fixed; background-color: #ffffff;border:none;z-index: 998;}
  #menu.on{border-bottom:1px solid #b18383;}
  #logo{position: absolute; top: 0; left: 5%;cursor: pointer;width: calc(6% + 105px);}
  #menu>ul{width: 70%; height: 100%; margin-left: 30%;}
  .menu-1{width:calc(18% - 10px); height: 100%; line-height: 95px;float: left; margin-left: 30px; position: relative;}
  #menu>ul>li>a{width: 100%; text-align: center;color:#444444;display: inline-block;font-size: 18px;}
  .menu-2{position:absolute; top: 94px; width: 100%;}
  .menu-2 li {background-color:#653900; height: 40px;line-height: 2.0;}
  .menu-2 li a:hover{font-weight: 600 ;}
  .menu-2 li a{text-align: center; color: #ffffff; margin-left:50%;transform: translateX(-50%);display: inline-block;line-height: 1.2;width: 180px}

  .line{width: 0; height: 2px; background-color: #ffffff; position: absolute; margin-left: 50%; transform: translate(-50%, -200%);margin-bottom:12px;transition: all 0.3s ease; z-index: 999;}

  #menu-1{position: absolute; right: 3%;top: 50%; transform: translateY(-50%);}
  #menu-1 li{float: left;height: 27px;}
  #menu-1 li:nth-child(1){border-right: 1px solid #b18383;}
  #menu-1 li img{width: 20px; position: absolute;top: 20%; transform: translate(-50%); left:0px;opacity: 0.7;transition: all 0.5s ease;}
  #menu-1 ul li a{color: #b18383;font-size: 12px; padding: 10px;}

  #menu li a:nth-child(1):hover{color: #653900; font-weight: 600 !important;;}
  #menu li a:nth-child(1):hover .store{opacity: 1;}
  #menu li a:nth-child(2):hover{color: #653900; font-weight: 600 !important;;}

  .ham {
      width: 65px;
      margin: auto;
      margin-top: 100px;
      cursor: pointer;
      position: absolute;
      right:2%;
      top:-80%;
      display: none;
    }

    .line01 {
      width: 40px;
      height: 2px;
      background-color: #69380d;
      display: block;
      margin: 8px;
      transition: all 0.3s ease-in-out;
    }

.line01:nth-of-type(1).on{transform:translateY(10px) rotate(45deg);}
.line01:nth-of-type(2).on{opacity: 0;}
.line01:nth-of-type(3).on{transform:translateY(-10px) rotate(-45deg);}
/* 메뉴바 */

/* --------------------------------------- 헤더 --------------------------------------- */


  #upbox{width: 100%; height: auto;}

  /* --------------------------------------- footer --------------------------------------- */
  #footer{width: 100%; height: 210px; background-color: #49413a; bottom:200px;z-index: 999;}
  .footer-textbox{margin-top: 50px; margin-left: 15%;width: 100%; height: 100%; padding-top: 50px;}
  .footer-textbox ul{width: 100%; height: 20px;}
  .footer-textbox ul li{float:left; border-left: 1px solid #afafaf;color: #ffffff;text-align: center; padding:0px 5px; border-left:1px solid #afafaf;}
  .footer-textbox ul li a{font-size: 16px; color: #ffffff;}
  .footer-textbox ul li span{font-size: 16px; color: #ffffff; font-weight: bold;}

  .footer-text01{display: block;}
  .footer-text01 li{font-size: 16px;line-height: 15px}
  .footer-text01 li:nth-of-type(1){border: none;}

  .footer-text02{display: block;margin-top: 20px;}
  .footer-text02 li{font-size: 16px;line-height: 15px}
  .footer-text02 li:nth-of-type(1){border: none;}

  .footer-text03{display: block;margin-top: 10px}
  .footer-text03 li{font-size: 10px;line-height: 10px}
  .footer-text03 li:nth-of-type(1){border: none;}

  /* --------------------------------------- footer --------------------------------------- */

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script src=https://ajax.googleapis.com/ajax/libs/jqueryui/1.14.1/jquery-ui.min.js></script>  
<script>

  
  $(function(){
/* --------------------------------------- 헤더 --------------------------------------- */

    /* 메뉴바 */
$('.menu-2').hide();

$('.menu-1').hover(function(){
  $(this).css({backgroundColor:'#653900'})
  $(this).find("a").css({color:'#ffffff'})
  $(this).find(".menu-2").css('display','block');
},function(){
  $(this).css({backgroundColor:'#ffffff'})
  $(this).find("a").css({color:'#444444'})
  $(this).find(".menu-2").css('display','none');
});

$('.ham').click(function(){
  $('.line01').toggleClass('on')
  });

  $('.menu-1').hover(function () {
        $(this).children('div').css('width','85%')
      }, function () {
        $(this).children('div').css('width','0px')
      });

$(window).scroll(function () {
  if ($(window).scrollTop() <= 50) {
          $('#menu').removeClass('on')

        } else if ($(window).scrollTop() >= 80) {
          $('#menu').addClass('on')
}
});
      /* 메뉴바 */

/* --------------------------------------- 헤더 --------------------------------------- */
  });
    </script>
</head>
<body>
     
<!------------------------- 헤더 ------------------------->
  <!-- 메뉴바 -->
  <div id="menu">
    <a href="http://khh315.dothome.co.kr/"><img id="logo" src="img/logo.png" width="204px"></a>
    <ul>
      <li class="menu-1"><a href="#">스토리</a>
        <div class="line"></div>
        <ul class="menu-2">
          <li><a href="#">임직원 인사말</a></li>
          <li><a href="#">브랜드스토리</a></li>
          <li><a href="#">찾아오시는길</a></li>
        </ul>
      </li>
      <li class="menu-1"><a href="#">제품소개</a>
        <div class="line"></div>
      </li>
      <li class="menu-1"><a href="#">가맹점</a>
       <div class="line"></div>
        <ul class="menu-2">
          <li><a href="http://khh315.dothome.co.kr/g5/bbs/board.php?bo_table=free">거래처 매장안내</a></li>
          <li><a href="http://khh315.dothome.co.kr/g5/bbs/write.php?bo_table=form">가맹점문의</a></li>
        </ul>
      </li>
    </ul>
      <div id="menu-1">
        <ul>
          <li><a href="#"><img src="img/store.png" class="store">스토어</a></li>
          <li><a href="#">고객센터</a></li>
      </div>
      <div class="ham">
        <span class="line01"></span>
        <span class="line01"></span>
        <span class="line01"></span>
      </div>
  </div>
  <!-- 메뉴바 -->
<!------------------------- 헤더 ------------------------->

<div id="upbox">
    <!-- 본문내용 -->
