<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<!-- 게시판 맨 위 제목 -->
<div class="bo_header">
    <h1>가맹문의</h1>
</div>

<section id="bo_w" style="width:80% !important; max-width:<?php echo $width; ?>; margin:0 auto !important;"> <!-- 09/07 넓이, 마진 수정 -->
	<div id="board_title"><h1 style="font-weight:800; font-size:36px; letter-spacing:-1px;"><?php echo $board['bo_subject']?></h1> <br> <p style="font-size:20px; font-weight:400; letter-spacing:-1px; color:#bbb; ">대전부르스주조와 함께 해주셔서 감사합니다</p></div>
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" >
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">

    <?php
    $option = '';
    $option_hidden = '';

    if ($is_notice || $is_html || $is_secret || $is_mail) { 
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
        }
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
            }
        }
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }
        if ($is_mail) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
        }

    }
    echo $option_hidden;
    ?>

    <?php if ($is_category) { ?>
    <div class="bo_w_select write_div">
        <label for="ca_name" class="sound_only">분류<strong>필수</strong></label>
        <select name="ca_name" id="ca_name" required>
            <option value="">분류를 선택하세요</option>
            <?php echo $category_option ?>
        </select>
    </div>
    <?php } ?>

    <div class="bo_w_info write_div">
        <div class="write_div_input" style="width:100%; height:100px; box-sizing:border-box; font-size:16px;
                                border-bottom:1px solid #ccc;  border-top:3px solid #583619;padding:20px 22px; overflow:hidden; ">
	    <?php if ($is_name) { ?>
            <h2 style="width:30%; margin-right:10px; height:60px; line-height:60px; font-size:20px; text-align:left; float: left;">성함</h2>
	        <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
	        <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" autocomplete="username" required class="frm_input half_input required" placeholder="이름" >
	    <?php } ?>
    </div>

	<div class="write_div_input" style="width:100%; height:100px; box-sizing:border-box; font-size:16px;
                                border-bottom:1px solid #ccc; padding:20px 22px; overflow:hidden;">
	   <?php 

       if (!isset($tel)) {
            $tel = '';
        }
       if (!isset($is_tel)) {
            $is_tel = true;;
            }       
       
       if ($is_tel) { ?>
        <!-- 전화번호 입력창을 한 곳으로 통합하고 id 중복 제거 -->
        <h2 style="width:30%; margin-right:10px; height:60px; line-height:60px; font-size:20px; text-align:left; float: left; ">전화번호</h2>
        <label for="wr_tel" class="sound_only">전화번호<strong>필수</strong></label>
        <input type="text" name="wr_tel" id="wr_tel" value="<?php echo $tel ?>" required class="frm_input half_input required" placeholder="전화번호" pattern="[0-9]{2,4}-[0-9]{3,4}-[0-9]{4}">
    <?php } ?>

    </div>
    

    <div class="write_div_input" style="width:100%; height:100px; box-sizing:border-box;  font-size:16px;
                                border-bottom:1px solid #ccc; padding:20px 22px; overflow:hidden;">
	    <?php if ($is_email) { ?>
     <h2 style="width:30%; margin-right:10px; height:60px; line-height:60px; font-size:20px; text-align:left; float: left;">상담일날짜</h2>
    <label for="event_date" class="sound_only">날짜<strong>필수</strong></label>
    <input type="date" name="event_date" id="event_date" class="frm_input half_input required" value="<?php echo date('Y-m-d'); ?>" required>
<?php } ?>

	</div>
	
	    <!-- <?php if ($is_homepage) { ?>
	        <label for="wr_homepage" class="sound_only">홈페이지</label>
	        <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input half_input" size="50" placeholder="홈페이지">
	    <?php } ?> -->
</div>
	
    <!-- <?php if ($option) { ?>
    <div class="write_div">
        <span class="sound_only">옵션</span>
        <ul class="bo_v_option">
        <?php echo $option ?>
        </ul>
    </div>
    <?php } ?> -->

    <div class="bo_w_tit write_div" style="width:100%; box-sizing:border-box; padding:0px 22px; overflow:hidden;">
        <h2 style="width:30%; margin-right:10px; height:60px; line-height:60px; font-size:20px; text-align:left; float: left;">문의사항</h2>
        <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
        
        <div id="autosave_wrapper" class="write_div" >
            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목" autocomplete="new-password">
            <?php if ($is_member) { // 임시 저장된 글 기능 ?>
            <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
            <?php if($editor_content_js) echo $editor_content_js; ?>
            <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
            <div id="autosave_pop">
                <strong>임시 저장된 글 목록</strong>
                <ul></ul>
                <div><button type="button" class="autosave_close">닫기</button></div>
            </div>
            <?php } ?>
        </div>
        
    </div>

    <div class="write_div" style="width:100%; box-sizing:border-box; padding:0 22px; overflow:hidden;">
        <label for="wr_content" class="sound_only" >내용<strong>필수</strong></label>
        <div class="wr_content"  <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
            <?php } ?>
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
            <?php } ?>
        </div>
        
    </div>

    <!-- <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
    <div class="bo_w_link write_div">
        <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){ echo $write['wr_link'.$i]; } ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50">
    </div>
    <?php } ?> -->

    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
    <div class="bo_w_flie write_div" style="width:100%; box-sizing:border-box; padding:0 22px; overflow:hidden;">
        <div class="file_wr write_div">
            <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
            <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
        </div>
        <?php if ($is_file_content) { ?>
        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
        <?php } ?>

        <?php if($w == 'u' && $file[$i]['file']) { ?>
        <span class="file_del">
            <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
        </span>
        <?php } ?>
        
    </div>
    <?php } ?>

    <div class="bo_pass" style="overflow:hidden;  padding-left: 22px;" >
    <div class="write_div" style="width:30%; text-align:center; overflow:hidden; float:left;">
    	<?php if ($is_password) { //비밀번호 ?>
            <h4 style="width:120px; height:40px; line-height:40px; font-size:12px; text-align:left; float: left;  overflow:hidden; ">본인확인 비밀번호</h4>
	        <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
	        <input type="password" name="wr_password" id="wr_password"  maxlength="6" placeholder="6글자" autocomplete="new-password" style="float: left;" <?php echo $password_required ?> class="frm_input half_input <?php echo $password_required ?>" placeholder="비밀번호">
	    <?php } ?>
    </div>


    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div" style="text-align:center; margin-left:4px; float: left; ">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>
    </div>


    <div class="btn_confirm write_div" style="clear: both; width:100%; box-sizing:border-box; padding:10px 22px;">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
        <button type="submit" id="btn_submit" style="background:rgb(88, 69, 44) !important;" accesskey="s" class="btn_submit btn">작성완료</button>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }

    <?php
// 현재 게시판 ID 확인
if ($bo_table === 'form') { // <-- 실제 가맹문의 bo_table 값으로 변경
    // 글 작성 후 목록으로 돌아올 때인지 확인
    if (isset($_GET['success']) && $_GET['success'] === '1') {
        echo "<script>
            alert('문의가 정상적으로 완료되었습니다.');
            window.location.href = 'http://khh315.dothome.co.kr/g5'; // 메인 페이지나 원하는 경로
        </script>";
    }
}
?>
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->