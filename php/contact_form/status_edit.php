
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../../../common.php');


$write_table = 'g5_write_'.$_POST['bo_table'];
$sql = " update ".$write_table." set wr_1 = '".$_POST['wr_1']."' where wr_id = '".$_POST['wr_id']."' ";
sql_query($sql);
$sql = "select wr_1 from ".$write_table." where wr_id = '".$_POST['wr_id']."' ";
$row = sql_fetch($sql);
 
if($row['wr_1'])
  echo $row['wr_1'];
else
 echo '';

?>