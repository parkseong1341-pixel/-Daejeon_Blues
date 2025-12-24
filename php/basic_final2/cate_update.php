<?php
	include_once("../../../common.php");
	include_once(G5_PATH."/head.sub.php");

	if (!$bo_table) alert("잘못된 접속입니다.");

	if ($cate_arr0) { $cate_ar0 =  $cate_arr0; } else {  $cate_ar0 = "";  }
	if ($cate_arr1) { $cate_ar1 =  "|".$cate_arr1; } else {  $cate_ar1 = "";  }
	if ($cate_arr2) { $cate_ar2 =  "|".$cate_arr2; } else {  $cate_ar2 = "";  }
	if ($cate_arr3) { $cate_ar3 =  "|".$cate_arr3; } else {  $cate_ar3 = "";  }
	if ($cate_arr4) { $cate_ar4 =  "|".$cate_arr4; } else {  $cate_ar4 = "";  }
	if ($cate_arr5) { $cate_ar5 =  "|".$cate_arr5; } else {  $cate_ar5 = "";  }
	if ($cate_arr6) { $cate_ar6 =  "|".$cate_arr6; } else {  $cate_ar6 = "";  }
	if ($cate_arr7) { $cate_ar7 =  "|".$cate_arr7; } else {  $cate_ar7 = "";  }
	if ($cate_arr8) { $cate_ar8 =  "|".$cate_arr8; } else {  $cate_ar8 = "";  }
	if ($cate_arr9) { $cate_ar9 =  "|".$cate_arr9; } else {  $cate_ar9 = "";  }
	if ($cate_arr10) { $cate_ar10 =  "|".$cate_arr10; } else {  $cate_ar10 = "";  }
	if ($cate_arr11) { $cate_ar11 =  "|".$cate_arr11; } else {  $cate_ar11 = "";  }
	if ($cate_arr12) { $cate_ar12 =  "|".$cate_arr12; } else {  $cate_ar12 = "";  }
	if ($cate_arr13) { $cate_ar13 =  "|".$cate_arr13; } else {  $cate_ar13 = "";  }
	if ($cate_arr14) { $cate_ar14 =  "|".$cate_arr14; } else {  $cate_ar14 = "";  }
	if ($cate_arr15) { $cate_ar15 =  "|".$cate_arr15; } else {  $cate_ar15 = "";  }
	if ($cate_arr16) { $cate_ar16 =  "|".$cate_arr16; } else {  $cate_ar16 = "";  }
	if ($cate_arr17) { $cate_ar17 =  "|".$cate_arr17; } else {  $cate_ar17 = "";  }
	if ($cate_arr18) { $cate_ar18 =  "|".$cate_arr18; } else {  $cate_ar18 = "";  }
	if ($cate_arr19) { $cate_ar19 =  "|".$cate_arr19; } else {  $cate_ar19 = "";  }
	if ($cate_arr20) { $cate_ar20 =  "|".$cate_arr20; } else {  $cate_ar20 = "";  }
	if ($cate_arr21) { $cate_ar21 =  "|".$cate_arr21; } else {  $cate_ar21 = "";  }
	if ($cate_arr22) { $cate_ar22 =  "|".$cate_arr22; } else {  $cate_ar22 = "";  }
	if ($cate_arr23) { $cate_ar23 =  "|".$cate_arr23; } else {  $cate_ar23 = "";  }
	if ($cate_arr24) { $cate_ar24 =  "|".$cate_arr24; } else {  $cate_ar24 = "";  }

	$bo_category_list = $cate_ar0.$cate_ar1.$cate_ar2.$cate_ar3.$cate_ar4.$cate_ar5.$cate_ar6.$cate_ar7.$cate_ar8.$cate_ar9.$cate_ar10.$cate_ar11.$cate_ar12.$cate_ar13.$cate_ar14.$cate_ar15.$cate_ar16.$cate_ar17.$cate_ar18.$cate_ar19.$cate_ar20.$cate_ar21.$cate_ar22.$cate_ar23.$cate_ar24;

	$sql = " update {$g5['board_table']} set bo_category_list  = '{$bo_category_list}' where bo_table  = '{$bo_table}' ";
	sql_query($sql);
?>

<script type="text/javascript">
	opener.location.reload();
</script>
<?php
	alert("카테고리 변경이 완료 되었습니다.");
	goto_url("./cate.php?bo_table={$bo_table}");
?>
