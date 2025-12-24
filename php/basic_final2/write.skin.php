<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div id="BoardBox">
<!-- 게시물 작성/수정 시작 { -->
<form action="<?php echo $action_url ?>" autocomplete="off" enctype="multipart/form-data" id="fwrite" method="post" name="fwrite" onsubmit="return fwrite_submit(this);" style="width:<?php echo $width; ?>">
    <input name="uid" type="hidden" value="<?php echo get_uniqid(); ?>">
    <input name="w" type="hidden" value="<?php echo $w ?>">
    <input name="bo_table" type="hidden" value="<?php echo $bo_table ?>">
    <input name="wr_id" type="hidden" value="<?php echo $wr_id ?>">
    <input name="sca" type="hidden" value="<?php echo $sca ?>">
    <input name="sfl" type="hidden" value="<?php echo $sfl ?>">
    <input name="stx" type="hidden" value="<?php echo $stx ?>">
    <input name="spt" type="hidden" value="<?php echo $spt ?>">
    <input name="sst" type="hidden" value="<?php echo $sst ?>">
    <input name="sod" type="hidden" value="<?php echo $sod ?>">
    <input name="page" type="hidden" value="<?php echo $page ?>">

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

    <table border="0" cellpadding="0" cellspacing="0" class="AWbbs_input_table" width="100%">
        <tr>
            <td colspan="4" style="height: 42px; font-size: 14px; font-weight: bold;">
                <?php echo $g5['title'] ?>
            </td>
        </tr>

        <?php if ($is_category) { ?>

        <tr>
            <th>분류</th>
            <td colspan="3">
                <select name="ca_name" id="ca_name" required class="input_st1 required" style="width:14%;">
                    <option value="">분류선택</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>

        <?php } ?>

        <tr>
            <?php if ($is_name) { ?>

            <th width="15%">이름</th>
            <td width="35%">
                <input class="input w250 required" type="text" name="wr_name" value="<?php echo $name ?>" placeholder="이름"/>
            </td>

            <?php } ?>
            <?php if ($is_password) { ?>

            <th width="15%">비밀번호</th>
            <td width="35%">
                <input class="input w250 <?php echo $password_required ?>" name="wr_password" type="password" <?php echo $password_required ?> placeholder="비밀번호"/>
            </td>

            <?php } ?>
        </tr>

        <tr>
            <?php if ($is_email) { ?>

            <th width="15%">이메일</th>
            <td width="35%">
                <input class="input w250" type="text" name="wr_email" value="<?php echo $email ?>" placeholder="이메일"/>
            </td>

            <?php } ?>
            <?php if ($is_homepage) { ?>

            <th width="15%">홈페이지</th>
            <td width="35%">
                <input class="input w250" type="text" name="wr_homepage" value="<?php echo $homepage ?>" placeholder="홈페이지"/>
            </td>

            <?php } ?>

        </tr>

        <?php if ($option) { ?>

        <tr>
            <th>옵션</th>
            <td colspan="3">
                <ul class="bo_v_option">
                <?php echo $option ?>
                </ul>
            </td>
        </tr>

        <?php } ?>

        <tr>
            <th>제목</th>
            <td colspan="3" style="position: relative;">
                <input class="frm_input full_input required" name="wr_subject" type="text" value="<?php echo $subject ?>" required placeholder="제목"/>
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
            </td>
        </tr>

	<!-- 여분필드 자동 표시 부분 -->
		<?php $finds = $board['bo_1_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_1" value="<?php echo $wr_1 ?>" id="wr_1" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
		<?php $finds = $board['bo_2_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_2" value="<?php echo $wr_2 ?>" id="wr_2" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_3_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_3" value="<?php echo $wr_3 ?>" id="wr_3" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_4_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_4" value="<?php echo $wr_4 ?>" id="wr_4" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_5_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_5" value="<?php echo $wr_5 ?>" id="wr_5" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_6_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_6" value="<?php echo $wr_6 ?>" id="wr_6" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_7_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_7" value="<?php echo $wr_7 ?>" id="wr_7" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_8_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_8" value="<?php echo $wr_8 ?>" id="wr_8" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_9_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_9" value="<?php echo $wr_9 ?>" id="wr_9" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>
			<?php $finds = $board['bo_10_subj']; $finds = str_replace('!', '', $finds);if(!empty($finds)){ ?>
        <tr>
            <th><?php echo $finds ; ?></th>
            <td colspan="3"><input type="text" name="wr_10" value="<?php echo $wr_10 ?>" id="wr_10" style="height:28px" class="full_input" size="50" maxlength="100">
			</td>
        </tr>
		<?php } ?>


        <tr>
            <td align="center" colspan="4" style="padding:10px 0;">
                <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
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
            </td>
        </tr>

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>

        <tr>
            <th>링크 #<?php echo $i ?></th>
            <td colspan="3"><input style="width:90%" type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){ echo $write['wr_link'.$i]; } ?>" id="wr_link<?php echo $i ?>" class="input w250" /></td>
        </tr>

        <?php } ?>




        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>

        <tr>
            <th>파일 #<?php echo $i+1 ?></th>
            <td colspan="3">
                <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="input w250"/>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요." style="margin-top:5px;    height:36px;">
                <?php } ?>

                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <span class="file_del">
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                </span>
                <?php } ?>
            </td>
        </tr>

        <?php } ?>

        <?php if ($is_use_captcha) { //자동등록방지  ?>

        <tr>
            <th>자동등록방지</th>
            <td colspan="3">
                <?php echo $captcha_html ?>
            </td>
        </tr>

        <?php } ?>

    </table>

    <div style="margin:10px 0 20px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="left"></td>
                <td align="right">
                    <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
                    <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
                </td>
            </tr>
        </table>
    </div>
</form>
</div>

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
</script>
<!-- } 게시물 작성/수정 끝 -->