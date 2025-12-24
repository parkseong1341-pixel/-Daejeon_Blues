<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
@font-face {
    font-family: 'Shilla';
    src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2206-02@1.0/Shilla_CultureM-Medium.woff2') format('woff2');
    font-weight: 500;
    font-display: swap;
}

@font-face {
    font-family: 'Shilla';
    src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2206-02@1.0/Shilla_CultureB-Bold.woff2') format('woff2');
    font-weight: 700;
    font-display: swap;
}
@font-face{
    font-family:'JSArirangHON';
    src: url('font/JSArirangHON.ttf') format('truetype');
}


 /* 반응형 */

 @media screen and (max-width:1200px){
            #map{clear: both; width: 80% !important; margin-left: 0 !important; margin-top: 20px !important;}
            #map-text{clear: both; width: 100% !important; margin-left: 0; margin-top: 20px !important;}
        }
 @media screen and (max-width:1000px){
           #bo_v_img{width: 480px;}
           #bo_v_img img {max-width: 100%;}
        }
 @media screen and (max-width:767px){
            .bo_header{height:100px;}
            .bo_header h1{font-size:30px !important; line-height:100px;}
            /* #bo_v_top td{text-align:left !important;} */
            #bo_v_top button{border:none;}
            #map{width: 480px !important;}
            #bo_v_con{font-size:12px !important; width: 100%;}
            .strongtr{font-size:15px !important;}
            #map-text h3{font-size:18px !important;}
            .AWbbs_view_table{min-width:450px !important; width: 300px !important;}
            .btn_submit{width: 80px; font-size: 10px !important;}
        }

    .kakao-infowindow{font-family: JS Arirang HON !important; text-align:center;}
  </style>
</head>





<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시판 맨 위 제목 -->
<div class="bo_header">
    <h1>거래처 매장안내</h1>
</div>

   


<!-- 게시물 읽기 시작 { -->
<div id="BoardBox">
    <table border="0" cellpadding="0" cellspacing="0" class="AWbbs_view_table border" width="100%">
        <caption style="height: 10px;"></caption>
        <colgroup>
            <col width="14%">
            <col width="20%">
            <col width="13%">
            <col width="20%">
            <col width="13%">
            <col width="20%">
        </colgroup>
        <tbody class="tbody">
        
        
            <tr>
                <th colspan="7" style="border-bottom:1px solid #ccc">
                    <?php if ($category_name) { ?>
                    <span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span>
                    <?php } ?>
                    <strong class="strongtr" style="font-size:20px" padding="10px"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력?></strong>
                </th>
            </tr>

            <style>
                .bo_v_cate {
                    display: inline-block;
                    line-height: 40px;
                    height: 40px;
                    background: #b49d8aff !important;
                    color: #fcfcfc !important;
                    padding: 0 12px;
                    border-radius: 3px;
                    margin-right: 10px;
                }
            </style>
       

		<!-- 여분필드 자동 표시 부분
		<?php $finds = $board['bo_1_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="1" align="left">
                    <?php echo $view['wr_1'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_2_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_2'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_3_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_3'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_4_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_4'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_5_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_5'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_6_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_6'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_7_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_7'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_8_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_8'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_9_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_9'] ; ?>
                </td>
            </tr>
		 <?php } ?>
		<?php $finds = $board['bo_10_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
			<tr>
                <th style="height:30px"><?php echo $finds ; ?></th>
                <td colspan="5" align="left">
                    <?php echo $view['wr_10'] ; ?>
                </td>
            </tr>
		 <?php } ?> -->





            <tr>
                <td colspan="6" style="padding:15px;">

                    <?php
                    // 파일 출력
                    $v_img_count = count($view['file']);
                    if($v_img_count) {
                        echo "<div id=\"bo_v_img\">\n";

                        foreach($view['file'] as $view_file) {
                            echo get_file_thumbnail($view_file);
                        }

                        echo "</div>\n";
                    }
                    ?>

                                   <!-- 주소가 있을 경우 지도 표시 -->
        <?php if ($view['wr_1']) { ?>
        <div id="map-text" style="margin-top: 50px !important;">
        <h3 style="font-size:24px;">위치 정보</h3>
        <p style="color:#bbb"><?php echo $view['wr_1']; ?></p>
        </div>
     <div id="map" style="width:38%;height:380px;margin:30px 0; "></div>

     <!-- 카카오맵 API -->
     <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f0d5df9cb475281da86a77b7004bc22b&libraries=services"></script>
     <script>
     window.onload = function() {
        var mapContainer = document.getElementById('map'),
            mapOption = { 
                center: new kakao.maps.LatLng(37.5665, 126.9780),
                level: 3
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); 
        var geocoder = new kakao.maps.services.Geocoder();

        geocoder.addressSearch("<?php echo $view['wr_1']; ?>", function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

               var imageSrc = 'http://khh315.dothome.co.kr/img/marker2.png'; // 마커이미지의 주소입니다    
                    imageSize = new kakao.maps.Size(50, 75); // 마커이미지의 크기입니다
                    imageOption = {offset: new kakao.maps.Point(25, 75)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.
                    
                // 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
                var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
                    markerPosition = new kakao.maps.LatLng(37.5665, 126.9780); // 마커가 표시될 위치입니다

                // 마커를 생성합니다
                var marker = new kakao.maps.Marker({
                    position: coords, 
                    image: markerImage // 마커이미지 설정 
                });

                // 마커가 지도 위에 표시되도록 설정합니다
                marker.setMap(map);  

                var infowindow = new kakao.maps.InfoWindow({
                    content: '<div class="kakao-infowindow" style="width:150px; height:auto; background: rgba(88, 69, 44, 0.95); color:#fff; padding:8px; font-size:15px;  overflow:hidden; white-space:nowrap; text-overflow:ellipsis;"><?php echo $view['wr_subject']; ?></div>'
                });
                infowindow.open(map, marker);

                map.setCenter(coords);
            } else {
                console.log("주소 검색 실패:", status);
            }
        });

        
// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
var mapTypeControl = new kakao.maps.MapTypeControl();

// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
var zoomControl = new kakao.maps.ZoomControl();
map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

        
        }
        </script> 
        </div>

                    <!-- 본문 내용 시작 { -->
    <div id="bo_v_con" style="font-size:16px;"><?php echo get_view_thumbnail($view['content']); ?>
                
                    
                
                    
                    <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
                    <!-- } 본문 내용 끝 -->

 
 </div>
  <!-- 게시물 상단 버튼 시작 { -->
<div id="bo_v_top" style="margin: 50px !important;" width="100% !important;">
    <table border-bottom="1px solid #ccc" cellpadding="0" cellspacing="0" width="100% !important;">
        <tr width="100% !important;">
            <td align="left">

                <?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>

                <ul class="more_opt is_view_btn">
                    <?php if ($update_href) { ?>

                    <li>
                        <a href="<?php echo $update_href ?>">수정</a>
                    </li>
                    <?php } ?>

                    <?php if ($delete_href) { ?>


                    <li>
                        <a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;">삭제</a>
                    </li>
                    <?php } ?>


<!--                     <?php if ($copy_href) { ?>

                    <li>
                        <a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사</a>
                    </li>
                    <?php } ?> -->


<!--                     <?php if ($move_href) { ?>

                    <li>
                        <a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동</a>
                    </li>
                    <?php } ?> -->


<!--                     <?php if ($search_href) { ?>

                    <li>
                        <a href="<?php echo $search_href ?>">검색</a>
                    </li>
                    <?php } ?> -->
                </ul>

                <?php } ?>

            </td>



            <td align="right" style="text-align: right" width="100% !important;">
                <button type="button" class="btn_b01 btn" onclick="document.location.href='<?php echo $list_href ?>'">
                    목록
                </button>


                <!-- <?php if ($reply_href) { ?>
                <button type="button" class="btn_b01 btn" onclick="document.location.href='<?php echo $reply_href ?>'">
                    답변
                </button>
                <?php } ?> -->
                
                <?php if ($write_href) { ?>
                <button type="button" class="btn_b01 btn" onclick="document.location.href='<?php echo $write_href ?>'">
                    글쓰기
                </button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<!-- } 게시물 하단 버튼 끝 -->



<?php } ?>

                    <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>


                    <!--  추천 비추천 시작 { -->
                    <?php if ( $good_href || $nogood_href) { ?>
                    <div id="bo_v_act">
                        <?php if ($good_href) { ?>
                        <span class="bo_v_act_gng">
                            <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="bo_v_good"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></a>
                            <b id="bo_v_act_good"></b>
                        </span>
                        <?php } ?>
                        <?php if ($nogood_href) { ?>
                        <span class="bo_v_act_gng">
                            <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="bo_v_nogood"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                            <b id="bo_v_act_nogood"></b>
                        </span>
                        <?php } ?>
                    </div>

                    <?php } else {
                        if($board['bo_use_good'] || $board['bo_use_nogood']) {
                    ?>

                    <div id="bo_v_act">
                        <?php if($board['bo_use_good']) { ?><span class="bo_v_good"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
                        <?php if($board['bo_use_nogood']) { ?><span class="bo_v_nogood"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- }  추천 비추천 끝 -->

                </td>
            </tr>

            <?php
            $cnt = 0;
            if ($view['file']['count']) {
                for ($i=0; $i<count($view['file']); $i++) {
                    if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                        $cnt++;
                }
            }
            ?>

            <?php if($cnt) { ?>
            <!-- 첨부파일 시작 { -->
            <?php
            // 가변 파일
            for ($i=0; $i<count($view['file']); $i++) {
                $no = $i + 1;
                if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
            ?>

            <tr>
                <th height="40">첨부파일 <?php echo $no; ?></th>
                <td align="right" colspan="5">
                    <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                        <strong><?php echo $view['file'][$i]['source'] ?></strong> <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                    </a>
                    &nbsp;
                    <span class="bo_v_file_cnt">
                        <?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?>
                    </span>
                </td>
            </tr>

            <?php
                }
            }
            ?>
            <!-- } 첨부파일 끝 -->
            <?php } ?>

            <?php if(isset($view['link']) && array_filter($view['link'])) { ?>

            <?php
            // 링크
            $cnt = 0;
            for ($i=1; $i<=count($view['link']); $i++) {
                if ($view['link'][$i]) {
                    $cnt++;
                    $link = cut_str($view['link'][$i], 70);
            ?>

            <!-- 관련링크 시작 { -->

            <tr>
                <th height="40">링크 <?php echo $i;?></th>
                <td align="right" colspan="5">
                    <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                        <strong><?php echo $link ?></strong>
                    </a>
                    <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
                </td>
            </tr>

            <?php
                }
            }
            ?>
            <!-- } 관련링크 끝 -->
            <?php } ?>

        </tbody>
    </table>
</div>



<?php
// 코멘트 입출력
include_once(G5_BBS_PATH.'/view_comment.php');
?>

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<?php if ($prev_href || $next_href) { ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:80px auto;" class="AWbbs_view_table">

<?php if ($prev_href) { ?>

    <tr style="background-color: #fcfcfc;">
        <th width="10%" style="border:1px solid #fff; color: #fff; background-color: #b49d8aff; text-align:center;  height:50px !important; ">이전글</th>
        <td style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding-left:10px;  height:50px !important;">
            <a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a>
            <span class="nb_date">
                <?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?>
            </span>
        </td>
    </tr>

    <?php } ?>
    <?php if ($next_href) { ?>

    <tr style="background-color: #fcfcfc;">
        <th width="10%" style="border:1px solid #fff; color: #fff; background-color: #b49d8aff; text-align:center;  height:50px !important; ">다음글</th>
        <td style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; margin-top:1px; padding-left:10px;  height:50px !important;">
            <a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>
            <span class="nb_date">
                <?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?>
            </span>
        </td>
    </tr>

    <?php } ?>

</table>

<?php } ?>
<!-- 게시판 읽기 끝 -->

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}

</script>

<!-- } 게시글 읽기 끝 -->



