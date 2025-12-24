<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

    /* 반응형 */
    @media screen and (max-width: 787px) {
      table.AWbbs_f_search_tb td.search-option {
        display: none !important;
       }
       .bo_tit{overflow: hidden; white-space: nowrap; text-overflow: ellipsis;}
       .bo_header{height:100px;}
        .bo_header h1{font-size:30px !important; line-height:100px;}
    }
  </style>
</head>


<style>
.tbl_head01 td {
height:30px;
padding:8px 3px;
}

.tbl_head01 table thead th {
height:30px;
padding:8px 5px;
}

.verline{
border-right: solid 1px;
border-right-color: #EEEEEE;
text-align:center;
}
</style>

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 7;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>


<!-- 게시판 맨 위 제목 -->
<div class="bo_header">
    <h1 style="font-family: JS Arirang HON;">거래처 매장안내</h1>
</div>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

    
    <!-- 카테고리 -->
    <?php if ($is_category) { ?>
        <nav id="bo_cate">
            <h2 class="sound_only">분류</h2>
            <ul id="bo_cate_ul">
                <?php echo $category_option ?>
            </ul>
        </nav>
    <?php } ?>
    <!-- 카테고리 -->


    <!-- 게시판 검색 시작 { -->
    <div class="AWbbs_f_search" style="width:100% !important">
        <!-- 게시판 검색 시작 { -->
         <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">

                <table width="0%"  cellpadding="0" cellspacing="0" style="margin:0 auto; border=:0" class="AWbbs_f_search_tb">
                <tr>
                    <td class="search-option">
                        <select name="sfl" id="sfl">
                            <?php echo get_board_sfl_select_options($sfl); ?>
                        </select>
                    </td>
                    <td><input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required placeholder=" 검색어를 입력해주세요"/></td>
                    <td><button type="submit" value="검색" class="sch_btn" style="background:#fff; border:none;"><i style="font-size:1.4em;padding:3px 10px;" class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button></td>
                </tr>
           
            </table> 
        </form>
    </div>
    <!-- } 게시판 검색 끝 -->

    
    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top">
        <!-- <div id="bo_list_total" style="text-align:left; font-size:14px; font-weight:bold; overflow:hidden;">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div> -->
<!-- 카테고리 관리자 -->
        <ul class="btn_bo_user">
              <?php if ($admin_href) { ?>
				<script type="text/JavaScript"> 
					function func_open(sca){  
						url = "<?=$board_skin_url;?>/cate.php?bo_table=<?=$bo_table?>&sca="+sca;
						window.open(url,"cate_mana","width=340,height=500,toolbars=0,location=0,directories=0, status=0,top=100,left=105,menubar=0,scrollbars=yes, resizable=yes");
						return;
					}
				</script>
				<li>
					<a OnClick="func_open(0);" class="btn_admin btn" title="카테고리관리">
						<i class="fa fa-circle-o fa-spin fa-fw"></i>
						<span class="sound_only">카테고리관리</span>
					</a>
				</li>
<!-- 카테고리 관리자 끝 -->

			<?php } ?>
        	<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
            <li>
            	<button type="button" class="btn_bo_sch btn_b01 btn" title="게시판 검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">게시판 검색</span></button>
            </li>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
        	<?php if ($is_admin == 'super' || $is_auth) {  ?>

        	<?php }  ?>
        </ul>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    




    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <?php if ($is_checkbox) { ?>
            <th style="background:#a58875;color:#fff" scope="col" class="all_chk chk_box">
            	<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
                <label for="chkall">
                	<span></span>
                	<b class="sound_only">현재 페이지 게시물  전체선택</b>
				</label>
            </th>
            <?php } ?>

            <th style="background:#a58875;color:#fff" scope="col">번호</th>
            <th style="background:#a58875;color:#fff" scope="col">제목</th>

		<!-- 여분필드 자동 표시 부분 -->
		<!-- <?php $finds = $board['bo_1_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?> -->
		<?php $finds = $board['bo_2_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_3_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_4_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_5_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_6_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_7_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_8_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_9_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>
		<?php $finds = $board['bo_10_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
		<th style="background:#006E9E;color:#fff" scope="col"><?php echo $finds ; ?></th>
		<?php } ?>


			<th scope="col" style="background:#a58875;"><font style="color:#fff">글쓴이</font></th>
			<th scope="col" style="background:#a58875;"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?><font style="color:#fff">조회</font></a></th> 
            <?php if ($is_good) { ?><th style="background:#a58875;" scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?><font style="color:#fff">추천 </font> </a></th><?php } ?>
            <?php if ($is_nogood) { ?><th style="background:#a58875;" scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?><font style="color:#fff">비추천</font> </a></th><?php } ?>
            <th scope="col" style="background:#a58875;"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?><font style="color:#fff">날짜</font></a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
        	if ($i%2==0) $lt_class = "even";
        	else $lt_class = "";
		?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?> <?php echo $lt_class ?>">
            <?php if ($is_checkbox) { ?>
            <td class="td_chk chk_box">
				<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="selec_chk">
            	<label for="chk_wr_id_<?php echo $i ?>">
            		<span></span>
            		<b class="sound_only"><?php echo $list[$i]['subject'] ?></b>
            	</label>
            </td>
            <?php } ?>
            <td class="td_num2">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong class="notice_icon">공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>

            <td class="td_subject" style="border-right: solid 1px;border-right-color: #EEEEEE;padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">
                <?php
                if ($is_category && $list[$i]['ca_name']) {
				?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link" style="background: #724121; color: #fff;"><?php echo $list[$i]['ca_name'] ?></a>   <!--  백그라운드 색 변경 -->
                <?php } ?>
                <div class="bo_tit">
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <?php echo $list[$i]['icon_reply'] ?>
                        <?php
                            if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                         ?>
                        <?php echo $list[$i]['subject'] ?>
                    </a>
                    <?php
                     if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
                    // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                    if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                    if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                    if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                    ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt"><?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                </div>
            </td>

			<!-- 여분필드 자동 표시 부분 -->
			<!-- <?php $finds = $board['bo_1_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>
				<td class="verline"><?php echo $list[$i]['wr_1'] ?></td>
			<?php } ?> -->
			<?php $finds = $board['bo_2_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>
				<td class="verline"><?php echo $list[$i]['wr_2'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_3_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_3'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_4_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_4'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_5_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_5'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_6_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_6'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_7_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_7'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_8_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_8'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_9_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_9'] ?></td>
			<?php } ?>
			<?php $finds = $board['bo_10_subj']; $finds2 = substr($finds, 0, 1); $finds = str_replace('!', '', $finds);if($finds2 == "!" && !empty($finds)){ ?>	
				<td class="verline"><?php echo $list[$i]['wr_10'] ?></td>
			<?php } ?>


            <td class="td_name sv_use" style="text-align:center"><?php echo $list[$i]['name'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
            <td class="td_datetime"><?php echo $list[$i]['datetime2'] ?></td>

        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>
	<!-- 페이지 -->
        <?php echo $write_pages; ?>
	<!-- 페이지 -->
	
    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <!-- <ul class="btn_bo_user">
        	<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
            <!-- <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?> -->
        </ul>	
        <?php } ?>
    </div>
    <?php } ?>




<!-- 게시판 버튼 시작 { -->
<div style="margin:10px 0 20px;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>

            <?php if ($is_admin == 'super' || $is_auth) { ?>

            <td align="left">

            <?php if ($is_checkbox) { ?>

                <button type="submit" name="btn_submit" class="btn_inc" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button>
                <button type="submit" name="btn_submit" class="btn_inc" value="선택복사" onclick="document.pressed=this.value">선택복사</button>
                <button type="submit" name="btn_submit" class="btn_inc" value="선택이동" onclick="document.pressed=this.value">선택이동</button>

            <?php } ?>

            </td>

            <?php }  ?>
            <?php if ($list_href || $is_checkbox || $write_href) { ?>

            <td align="right">

                <?php if ($list_href || $write_href) { ?>

                <?php if ($admin_href) { ?>
                <button type="button" class="btn_inc admin" onclick="javascript:location.href='<?php echo $admin_href ?>'" title="관리자">관리자</button>
                <?php } ?>

                <?php if ($rss_href) { ?>
                <button type="button" class="btn_inc rss" onclick="javascript:location.href='<?php echo $rss_href ?>'" title="RSS">RSS</button>
                <?php } ?>

                <?php if ($write_href) { ?>
                <button type="button" class="btn_inc write" style="background: #fdfdfd; color: #573519; border:1px solid #ccc; width: 80px; padding: 5px; " 
                onclick="javascript:location.href='<?php echo $write_href ?>'" title="글쓰기">글쓰기</button>
                <?php } ?>

                <?php } ?>

            </td>

            <?php } ?>

        </tr>
    </table>
</div>
<!-- } 게시판 버튼 끝 -->




    </form>

    <!-- 게시판 검색 시작 { -->
    <div class="bo_sch_wrap">
        <fieldset class="bo_sch">
            <h3>검색</h3>
            <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <select name="sfl" id="sfl">
                <?php echo get_board_sfl_select_options($sfl); ?>
            </select>
            <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            <div class="sch_bar">
                <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder=" 검색어를 입력해주세요">
                <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
            </div>
            <button type="button" class="bo_sch_cls" title="닫기"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">닫기</span></button>
            </form>
        </fieldset>
        <div class="bo_sch_bg"></div>
    </div>
    <script>
    jQuery(function($){
        // 게시판 검색
        $(".btn_bo_sch").on("click", function() {
            $(".bo_sch_wrap").toggle();
        })
        $('.bo_sch_bg, .bo_sch_cls').click(function(){
            $('.bo_sch_wrap').hide();
        });
    });
    </script>
    <!-- } 게시판 검색 끝 --> 
</div>





<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = g5_bbs_url+"/board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}

// 게시판 리스트 관리자 옵션
jQuery(function($){
    $(".btn_more_opt.is_list_btn").on("click", function(e) {
        e.stopPropagation();
        $(".more_opt.is_list_btn").toggle();
    });
    $(document).on("click", function (e) {
        if(!$(e.target).closest('.is_list_btn').length) {
            $(".more_opt.is_list_btn").hide();
        }
    });
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
