<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">
    <title>Document</title>
     

  <style>

  html, body{ overflow-x: hidden; font-size:14px !important;}
    
  *{margin: 0; padding: 0;box-sizing: border-box;}
  ul{list-style: none;}
  a{text-decoration: none;}
        
  /* --------------------------------------- 헤더 --------------------------------------- */




  /* 메뉴바 */
  #menu{width: 100%; height: 95px; position: fixed; top: 0; left: 0;position: fixed;background-color: #ffffff;border:none;z-index: 998;}
  #menu.on{border-bottom:1px solid #b18383;}
  #logo{position: absolute; top: 30%; left: 5%;transform:translateY(-50%);cursor: pointer;width: calc(9% + 105px);}
  #menu>ul{width: 70%; height: 100%; margin-left: 30%;}
  .menu-1{width:calc(18% - 10px); height: 100%; line-height: 95px;float: left; margin-left: 30px;position: relative;}
  #menu>ul>li>a{width: 100%; text-align: center;color:#444444;display: inline-block;font-size: 18px;font-family: 'Noto Serif KR', serif !important;}
  .menu-2{position:absolute; top: 94px; width: 100%;}
  .menu-2 li {background-color:#653900; height: 40px;line-height: 2.0;}
  .menu-2 li a:hover{font-weight: 600;}
  .menu-2 li a{text-align: center; color: #ffffff; margin-left:50%;transform: translateX(-50%);
    display: inline-block;line-height: 1.2;width: 180px}

  .line{width: 0; height: 2px; background-color: #ffffff;position: absolute; margin-left: 50%; 
    transform: translate(-50%, -200%);margin-bottom:12px;transition: all 0.3s ease;}

  #menu-1{position: absolute; right: 3%;top: 50%; transform: translateY(-50%);}
  #menu-1 li{float: left;line-height: 12px;}
  #menu-1 li:nth-child(1){border-right: 1px solid #b18383;}
  #menu-1 li img{width: 20px; position: absolute;top: -18%; transform: translate(-50%); left:0px;opacity: 0.7;
    transition: all 0.5s ease;}
  #menu-1 ul li a{color: #b18383;font-size: 12px;padding: 10px;}

  #menu li a:nth-child(1):hover{color: #653900; font-weight: 600;}
  #menu li a:nth-child(1):hover .store{opacity: 1;}
  #menu li a:nth-child(2):hover{color: #653900; font-weight: 600;}

  .ham {
      width: 65px;
      cursor: pointer;
      position: absolute;
      right:2%;
      top:50%;
      transform: translateY(-50%);
      display: none;
      z-index: 999;
    }

    .line01 {
      width: 40px;
      height: 2px;
      background-color: #69380d;
      display: block;
      margin: 8px;
      transition: all 0.3s ease-in-out;
    }

/* .line01:nth-of-type(1).on{transform:translateY(10px) rotate(45deg);}
.line01:nth-of-type(2).on{opacity: 0;}
.line01:nth-of-type(3).on{transform:translateY(-10px) rotate(-45deg);} 

.ham x모양으로 만드는 css
*/

/* 사이드메뉴 */
    #side-menu{width: 270px; height: 100%;background-color: #ffffff;position: fixed;right: -270px; top: 0px;z-index: 999;border-left:1px solid #999999; transition: all 0.5s ease;}
    #side-menu a{font-size: 13px; color: #666666;}
    #side-menu li{border-bottom: 1px solid #858585; width: 100%; height: auto;}
    #side-menu p{font-size: 16px; color: #ffffff; background-color: #653900;width: 100%;text-align: center;height: 50px;line-height: 50px;display: inline-block; position: relative;}
    #side-menu p img{position: absolute; left: 10px; top: 50%; transform: translateY(-50%);cursor: pointer;}
    .submenu-1{height: 41px;background-color: #fafafa;}
    .submenu-2{background-color: rgb(235, 225, 225)}
    .submenu-1>a{line-height: 41px;width: 100%; padding-left: 10px;display: inline-block;position: relative;}
    .submenu-1>a>img{position: absolute; top: 50%; transform: translateY(-50%);}
    .submenu-2{width: 100%;display: none;position: relative;z-index: 998;}
    .submenu-2 li a{width: 100%;text-align: left; line-height: 41px;padding-left: 10px;}
/* 사이드메뉴 */
    


/* 메뉴바 */

/* --------------------------------------- 헤더 --------------------------------------- */


  #upbox{width: 100%;}

 /* --------------------------------------- 푸터 --------------------------------------- */

  #footer{width: 100%; height: 250px; background-color: #49413a;}
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

  .footer-text04{display: block;margin-top: 10px}
  .footer-text04 li{font-size: 10px;line-height: 10px}
  .footer-text04 li:nth-of-type(1){border: none;}

  /* --------------------------------------- 푸터 --------------------------------------- */

  @media screen and (max-width:1081px){
    /* 우측 상단 사이드 메뉴바 */
  #menu>ul {display: none;}
  .ham{display: block;}
  #menu-1{display: none;}
   /* 우측 상단 사이드 메뉴바 */
  #nav{top: 600px;}
   #slide{height: 650px;}
  }


   @media screen and (max-width:900px){
    #slide{height: 600px;}
    #nav{top: 570px;}
   }
   
   @media screen and (max-width:740px){
    #slide{height: 550px;}
    #nav{top: 530px;}
   }


  /* --------------------------------------- 푸터 --------------------------------------- */

  @media screen and (max-width:1400px){
  .footer-textbox{width: 100%; height: 100%; margin-left: 0%;margin-top: 0px;}
  .footer-textbox ul{margin-top: 10px;}
  .footer-textbox ul li{margin-top: 10px;}
}
@media screen and (max-width:1081px){
  #footer{bottom:-30px}
}

@media screen and (max-width:534px){
  .footer-text01 li{font-size: 14px;line-height: 15px}
  .footer-text02 li{font-size: 14px;line-height: 15px}
  .footer-text03 li{font-size: 14px;line-height: 15px}
  .footer-textbox ul li span{font-size: 15px;}

}

/* --------------------------------------- 푸터 --------------------------------------- */

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

   /* 사이드 메뉴바 */
   $('.ham').click(function(){
    /* $('.line01').toggleClass('on'); */
  $('#side-menu').css('right','0px');
  });

  $('#side-menu p img').click(function(){
    $('#side-menu').css('right','-270px')
  });
   

$('.submenu-1 > a').click(function (e) {
  e.preventDefault(); // 링크 막기

  let submenu = $(this).siblings('.submenu-2'); // 현재 메뉴의 submenu-2
  let arrow = $(this).find('img');              // 현재 a 안의 img

  submenu.slideToggle(200, function () {
    if ($(this).is(':visible')) {
      arrow.attr('src', 'img/uparrow.png');
    } else {
      arrow.attr('src', 'img/downarrow.png');
    }
  });
});

/* 사이드 메뉴바 */


/* --------------------------------------- 헤더 --------------------------------------- */
  });
    </script>
</head>
<body>
     
<!------------------------- 헤더 ------------------------->

  <!-- 메뉴바 -->
  <div id="menu" style="font-family: 'Noto Serif KR', serif !important;">
    <a href="http://khh315.dothome.co.kr/"><img id="logo" src="img/logo.png"></a>
    <ul>
      <li class="menu-1"><a href="#">스토리</a>
        <div class="line"></div>
        <ul class="menu-2">
          <li><a href="http://khh315.dothome.co.kr/story_sub1.html">임직원 인사말</a></li>
          <li><a href="http://khh315.dothome.co.kr/story_sub2.html">브랜드스토리</a></li>
          <li><a href="http://khh315.dothome.co.kr/story_sub3.html">찾아오시는길</a></li>
        </ul>
      </li>
      <li class="menu-1"><a href="http://khh315.dothome.co.kr/obj_sub.html">제품소개</a>
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
        </ul>
      </div>
      
      <div class="ham">
        <span class="line01"></span>
        <span class="line01"></span>
        <span class="line01"></span>
      </div>
  </div>
  <!-- 메뉴바 -->

  <!-- 사이드메뉴 -->
  <div id="side-menu">
        <p><img src="img/close.png">서브메뉴</p>
        <ul>
      <li class="submenu-1"><a href="#">스토리<img src="img/downarrow.png"></a>
        <ul class="submenu-2">
          <li><a href="http://khh315.dothome.co.kr/story_sub1.html">임직원 인사말</a></li>
          <li><a href="http://khh315.dothome.co.kr/story_sub2.html">브랜드스토리</a></li>
          <li><a href="http://khh315.dothome.co.kr/story_sub3.html">찾아오시는길</a></li>
        </ul>
      </li>
      <li class="submenu-1"><a href="http://khh315.dothome.co.kr/obj_sub.html">제품소개<img src="img/downarrow.png"></a>
        <ul class="submenu-2">
          <li><a href="#">생막걸리</a></li>
          <li><a href="#">프리미엄찹쌀생막걸리</a></li>
          <li><a href="#">산소등류주 0<spna>2</spna> 황금곳간</a></li>
          <li><a href="#">선물세트</a></li>
        </ul>
      </li>
      <li class="submenu-1"><a href="#">가맹점<img src="img/downarrow.png"></a>
        <ul class="submenu-2">
          <li><a href="http://khh315.dothome.co.kr/g5/bbs/board.php?bo_table=free">거래처 매장안내</a></li>
          <li><a href="http://khh315.dothome.co.kr/g5/bbs/write.php?bo_table=form">가맹점문의</a></li>
        </ul>
      </li>
    </ul>
      </div>
  <!-- 사이드메뉴 -->
  
<!------------------------- 헤더 ------------------------->


<div id="upbox">
    <!-- 본문내용 -->
