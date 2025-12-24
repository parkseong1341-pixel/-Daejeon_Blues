<?php
include_once(__DIR__ . '/../../../common.php');
include_once(G5_PATH."/head.sub.php");

if (!$bo_table) alert("잘못된 접속입니다.");

@$cate_arr = explode("|", $board['bo_category_list']);
?>
<style type="text/css">
	.ed { width:100px; color:#222; } 
	.title {color:#222; font-weight:600; } 
</style>
<br>
<b style="color:green;padding-left:1%;">카테고리 관리</b><br>

<form name="book" method="post" onsubmit="return book_submit(this);" enctype="multipart/form-data">
<table width="98%" style="margin:0px auto;">
<tr>
	<td class="title">카테고리1</td>
	<td><input type="text" name="cate_arr0" value="<?=$cate_arr[0] ?? ''?>" class="ed"></td>
</tr>

<tr>
	<td class="title">카테고리2</td>
	<td><input type="text" name="cate_arr1" value="<?=$cate_arr[1] ?? ''?>" class="ed"></td>
</tr>

<tr>
	<td class="title">카테고리3</td>
	<td><input type="text" name="cate_arr2" value="<?=$cate_arr[2] ?? ''?>" class="ed"></td>
</tr>

<tr>
	<td class="title">카테고리4</td>
	<td><input type="text" name="cate_arr3" value="<?=$cate_arr[3] ?? ''?>" class="ed"></td>
</tr>

<tr>
	<td class="title">카테고리5</td>
	<td><input type="text" name="cate_arr4" value="<?=$cate_arr[4]?? ''?>" class="ed"></td>
</tr>


</table>

<br>
<center>
	<input type="submit" value="변경" class="button" onfocus="this.blur();" />
	<input type="button" value="취소" class="button" onclick="window.close()" />
</center>
</form>
<br>
<script type="text/javascript">
	function book_submit(f)
	{
		f.action = './cate_update.php?bo_table=<?=$bo_table?>';
	}
</script>
<?php
	include_once(G5_PATH."/tail.sub.php");
?>