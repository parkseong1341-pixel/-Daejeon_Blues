<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/custom.css">', 0);
?>

<div>

	<blockquote><h3><?php echo $g5['title'] ?></h3></blockquote>

	<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
	<input type="hidden" name="wr_name" value="관리자">

	<?php
	$option = '';
	$option_hidden = '';
	if ($is_notice || $is_html || $is_secret || $is_mail) {
		$option = '';
		if ($is_notice) {

			$option .= '<div class="custom-control custom-checkbox custom-control-inline">'."\n".'<input type="checkbox" class="custom-control-input" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label class="custom-control-label" for="notice">공지</label></div>';
		}

		if ($is_html) {
			if ($is_dhtml_editor) {
				$option_hidden .= '<input type="hidden" value="html1" name="html">';
			} else {
				$option .= '<div class="custom-control custom-checkbox custom-control-inline">'."\n".'<input type="checkbox" class="custom-control-input" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label class="custom-control-label" for="html">HTML</label></div>';
			}
		}

		if ($is_secret) {
			if ($is_admin || $is_secret==1) {
				$option .= '<div class="custom-control custom-checkbox custom-control-inline">'."\n".'<input type="checkbox" class="custom-control-input" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label class="custom-control-label" for="secret">비밀글</label></div>';
			} else {
				$option_hidden .= '<input type="hidden" name="secret" value="secret">';
			}
		}

		if ($is_mail) {
			$option .= '<div class="custom-control custom-checkbox custom-control-inline">'."\n".'<input type="checkbox" class="custom-control-input" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label class="custom-control-label" for="mail">답변메일받기</label></div>';
		}
	}

	echo $option_hidden;
	?>


	<div class="form-group row">
		<div class="col-sm-10">
			<div id="autosave_wrapper">
				<div class="input-group">
					<input class="form-control" type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required placeholder="프로젝트이름">
					<?php if ($is_member) { // 임시 저장된 글 기능 ?>
					<script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
					<?php if($editor_content_js) echo $editor_content_js; ?>
					<div class="input-group-append">
						<button type="button" id="btn_autosave" class="btn btn-outline-secondary" style="width:140px">임시저장 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
					</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>

<div class="form-group row">
		<label class="col-sm-2 col-form-label"><?php echo $board['bo_8_subj'] ?></label>
		<div class="col-sm-10">
<?php
$item_list = explode(',', $board['bo_8']);
for ($i=0; $i<count($item_list); $i++) {
    $option_item = trim($item_list[$i]);
?>

    <input type="radio" name="wr_8" value="<?php echo $option_item ?>" <?php echo ($write['wr_8'] == $option_item) ? "checked" : "";?> required> <?php echo $option_item ?>

<?php } ?>
    </div>
</div>

<div class="form-group row">
		<label class="col-sm-2 col-form-label"><?php echo $board['bo_9_subj'] ?></label>
		<div class="col-sm-10">
<?php
$item_list = explode(',', $board['bo_9']);
for ($i=0; $i<count($item_list); $i++) {
    $option_item = trim($item_list[$i]);
?>
    <input type="radio" name="wr_9" value="<?php echo $option_item ?>" <?php echo ($write['wr_9'] == $option_item) ? "checked" : "";?> required> <?php echo $option_item ?>
<?php } ?>
    </div>
</div>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="row wow fadeInUp">

          <div class="col-lg-6">

                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="wr_1" value="<?php if ($w == 'u') { echo $write['wr_1'];} else {echo $member[mb_name];} ?>"  id="name" placeholder="<?php echo $board['bo_1_subj'] ?>을 입력하세요" required itemname="<?php echo $board['bo_1_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="wr_2" value="<?php if ($w == 'u') { echo $write['wr_2'];} else {echo $member[mb_email];} ?>"  id="email" placeholder="<?php echo $board['bo_2_subj'] ?>을 입력하세요" required itemname="<?php echo $board['bo_2_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="wr_3" value="<?php echo $wr_3 ?>" id="name" placeholder="<?php echo $board['bo_3_subj'] ?>을 입력하세요" required itemname="<?php echo $board['bo_3_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="wr_4" value="<?php echo $wr_4 ?>"  id="email" placeholder="<?php echo $board['bo_4_subj'] ?>를 입력하세요" required itemname="<?php echo $board['bo_4_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-4">
							<input type="text" class="form-control" name="wr_5" value="<?php echo $wr_5 ?>" maxlength="3" placeholder="<?php echo $board['bo_5_subj'] ?>" required itemname="<?php echo $board['bo_5_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-4">
							<input type="text" class="form-control" name="wr_6" value="<?php echo $wr_6 ?>" maxlength="4" placeholder="<?php echo $board['bo_6_subj'] ?>" required itemname="<?php echo $board['bo_6_subj'] ?>"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-4">
							<input type="text" class="form-control" name="wr_7" value="<?php echo $wr_7 ?>" maxlength="4" placeholder="<?php echo $board['bo_7_subj'] ?>" required itemname="<?php echo $board['bo_7_subj'] ?>"/>
                  <div class="validation"></div>
                </div>
               </div>

	<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
     <div class="form-group">

			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="<?php echo $upload_max_filesize ?> 이하만 업로드 가능" data-default="<?php echo ($w == 'u') ? $file[$i]['source'] : ''; ?>">
					<label class="custom-file-label" for="bf_file_<?php echo $i+1 ?>"><?php if($w == 'u' && $file[$i]['file']) echo $file[$i]['source']; else echo '파일을 선택해주세요.'; ?></label>
				</div>

				<?php if ($is_file_content) { ?>
				<input class="form-control" type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" placeholder="파일설명을 입력해주세요.">
				<?php } ?>
			</div>

			<?php if($w == 'u' && $file[$i]['file']) { ?>
			<div class="custom-control custom-checkbox custom-control-inline mt-1">
				<input type="checkbox" class="custom-control-input" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1">
				<label class="custom-control-label custom-checkbox" for="bf_file_del<?php echo $i ?>">파일 삭제</label>
			</div>
			<?php } ?>
		</div>

	<?php } ?>

          </div>

          <div class="col-lg-6">
                <div class="form-group">
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<small>이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</small>
			<?php } ?>
			<?php if(!$is_dhtml_editor) $editor_html = str_replace('<textarea id="wr_content" name="wr_content"', '<textarea id="wr_content" name="wr_content" class="form-control"', $editor_html); ?>
			<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<div class="d-flex justify-content-end"><small><span id="char_count"></span> 글자</small></div>
			<?php } ?>
                </div>

        </div>


      </div>
    </section><!-- #contact -->

<!----------------------------------------------------------------------------->

<p>

	<?php if ($is_use_captcha) { //자동등록방지  ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">보안</label>

		<div class="col-sm-10">
			<?php echo $captcha_html ?>
		</div>
	</div>
	<?php } ?>

	<div class="d-flex justify-content-end mb-4">
		<div class="btn-group xs-100">
			<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn btn-primary">
			<?php if ($is_admin) { ?>
			<a href="<?php echo get_pretty_url($bo_table); ?>" class="btn btn-outline-primary">문의목록</a>
			<?php } ?>
		</div>
	</div>

</p>

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

$('.custom-file-input').on('change', function() {
	var fileName = $(this).data("default");

	if(this.files[0].size > <?php echo $board['bo_upload_size']; ?>) {
		alert("선택한 파일의 용량이 <?php echo $upload_max_filesize ?> 를 초과하였습니다!");
		$(this).val('');
	}else{
		fileName = $(this).val().split('\\').pop();
	}

	if(fileName=="") fileName = "파일을 선택해주세요.";

	$(this).next('.custom-file-label').addClass("selected").html(fileName); 
});

</script>
