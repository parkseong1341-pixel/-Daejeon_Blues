<?php
if (!defined('_GNUBOARD_')) exit; // 보안 체크

// 글 작성이 끝나면 무조건 메인으로 이동
echo "<script>
    alert('문의가 정상적으로 완료되었습니다.');
    window.location.href = 'http://khh315.dothome.co.kr/g5';
</script>";
exit;
?>